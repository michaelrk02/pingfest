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

    public function login(){
        $uname = $this->input->post('uname', true);
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['user_id' => $uname])->row_array();
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

}

?>
