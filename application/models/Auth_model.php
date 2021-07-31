<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_model 
{

    public function addUserData()
    {
        $data = [
            'user_id' => $this->input->post('uname'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'hash' => md5( $this->input->ip_address())
        ];

        $this->db->insert('users', $data); 
    }

    public function login()
    {
        $uname = $this->input->post('uname', true);
        $password = $this->input->post('password');

        $user = $this->db->get_where('pf_users', ['user_id' => $uname])->row_array(); //updated table
        if( $user != NULL ){
            //Username bener
            if(password_verify($password, $user['password'])){
                //password bener
                $session_data = [
                    'user_id' => $user['user_id']
                ];
                $this->session->set_userdata($session_data);
            } else {
                $session_data = [
                    'auth_msg' => '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>'
                ];
                $this->session->set_userdata($session_data);
            }
        } else {
            $session_data = [
                'auth_msg' => '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>'
            ];
            $this->session->set_userdata($session_data);
        }

        $sso = $this->pingfest->sso_handle();

        if (isset($_SESSION['user_id'])) {
            redirect(site_url('profile/index'));
        } else {
            $url_param = isset($sso['url_param']) ? $sso['url_param'] : '';
            redirect(site_url('auth/index').$url_param);
        }
    }

    public function isExistingEmail()
    {
        $email = $this->input->post('email');
        $user = $this->db->get_where('pf_users', ['email' => $email])->row_array();

        if( $user != NULL ){
            //email ada
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function generateForgotToken()
    {
        $this->load->library('Jwt');

        $email = $this->input->post('email');

        $total = $this->db->get_where('pf_users', ['email' => $email])->num_rows();
        for( $x=0; $x < $total; $x++){
            $user = $this->db->get_where('pf_users', ['email' => $email])->row_array($x);
            $id = $user['user_id'];
            $password = $user['password'];
            $data = [
                'user_id' => $id
            ];
            $token = $this->jwt->create($data, 86400, PF_SECRET_KEY . $password);
            $token_array[ $id ] = $token;
        }

        return $token_array;
    }

    public function extractForgotToken( $token )
    {
        $this->load->library('Jwt');

        $data = $this->jwt->get_data($token);
        if( empty($data) ){
            return NULL;
        }
        $uname = $data['user_id'];

        $user = $this->db->get_where('pf_users', ['user_id' => $uname])->row_array();
        $password = $user['password'];

        $extract = $this->jwt->extract( $token, PF_SECRET_KEY . $password);
        return $extract;

    }

    public function sendTokenEmail($tokens)
    {
        $this->load->library('pingfest');

        if( !is_array($tokens) ){
            return false;
        }

        $message = $this->load->view('templates/email_forgot', ['tokens' => $tokens], TRUE);

        $this->pingfest->send_email($this->input->post('email'), 'Ubah Password Akun PINGFEST', $message);
    }

    public function changePassword( $token )
    {
        $uname = $this->input->post('uname');

        $user = $this->db->get_where('pf_users', ['user_id' => $uname])->row_array();
        $old_pw = $user['password']; //hash pw lama

        if( password_verify($this->input->post('password'), $old_pw) ){ //pw baru sama kaya yg sebelumnya
            $session_data = [
                'forgothandle_msg' => '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>'
            ];
            $this->session->set_userdata($session_data);
            redirect(site_url('auth/forgot_handle') . "?token=" . urlencode($token) ); 
        } else { //pw baru beda sama yg lama
            $data = [
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
            ];
    
            $this->db->where('user_id', $uname);
            $this->db->update('pf_users', $data);

            $user = $this->db->get_where('pf_users', ['user_id' => $uname])->row_array();
            if( $user['password'] == $data['password'] ){ // berhasil update pw di db
                $session_data = [
                    'auth_msg' => '<div class="alert alert-success" role="alert">Password berhasil diubah! Silahkan login</div>'
                ];
                $this->session->set_userdata($session_data);
                redirect(site_url('auth/index'));
            } else { //gagal update pw di db
                $session_data = [
                    'forgothandle_msg' => '<div class="alert alert-danger" role="alert">Password gagal diubah!</div>'
                ];
                $this->session->set_userdata($session_data);
                redirect(site_url('auth/forgot_handle') . "?token=" . urlencode($token) );
            }

        }

        
    }



}

?>
