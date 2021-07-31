<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        $this->load->database();

        $this->load->library('pingfest');
        $this->load->library('Jwt');
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Login'
        ];

        $this->form_validation->set_rules('uname', 'Username', 'required', [
            'required' => '{field} harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => '{field} harus diisi'
        ]);
        
        if( $this->form_validation->run() == FALSE) {
            $sso = $this->pingfest->sso_handle();

            if( !empty($this->session->userdata('user_id')) ){
                redirect(site_url('profile/index'));
            }

            $this->load->view('templates/header', $data);
            $this->load->view('auth/login', ['sso' => $sso, 'form_url_param' => (isset($sso) ? $sso['url_param'] : '')]);
            $this->load->view('templates/footer');
        } else {
            if( !empty($this->session->userdata('user_id')) ){
                redirect(site_url('profile/index'));
            }

            $this->Auth_model->login();
        }
        
    }


    public function registration()
    {
        if( !empty($this->session->userdata('user_id')) ){
            redirect(site_url('profile/index'));
        } 

        $data = [
            'title' => 'Halaman Registrasi'
        ];

        $this->form_validation->set_rules('uname', 'Username', 'required|is_unique[users.user_id]|alpha_dash|max_length[50]', [
            'is_unique' => '{field} sudah digunakan', 
            'required' => '{field} harus diisi',
            'alpha_dash' => '{field} harus berupa alfanumerik, underscore, dan dash' ,
            'max_length' => '{field} terlalu panjang'
        ]);
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|max_length[100]', [
            'required' => '{field} harus diisi',
            'max_length' => '{field} terlalu panjang'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password2]|min_length[8]|max_length[72]', [
            'required' => '{field} harus diisi', 
            'matches' => '{field} tidak sama',
            'min_length' => '{field} terlalu pendek',
            'max_length' => '{field} terlalu panjang'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password]', [
            'required' => '{field} harus diisi',
            'matches' => '{field} tidak sama'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[254]', [
            'required' => '{field} harus diisi',
            'valid_email' => '{field} harus valid',
            'max_length' => '{field} terlalu panjang'
        ]);
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|max_length[20]', [
            'required' => '{field} harus diisi',
            'max_length' => '{field} terlalu panjang'
        ]);

        if( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/footer');
        } else {
            $this->Auth_model->addUserData();
            $session_data = [
                'auth_msg' => '<div class="alert alert-success" role="alert">Akun berhasil dibuat! Silahkan login</div>'
            ];
            $this->session->set_userdata($session_data);
            redirect(site_url('auth/index'));
        }
        
        
    }

    public function forgot()
    {
        if( !empty($this->session->userdata('user_id')) ){
            redirect(site_url('profile/index'));
        } 

        $data = [
            'title' => 'Lupa Password'
        ];

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => '{field} harus diisi',
            'valid_email' => '{field} harus valid'
        ]);

        if( $this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('auth/forgot');
            $this->load->view('templates/footer');
        } else {
            //user dah input email
            if( $this->Auth_model->isExistingEmail() ){
                $session_data = [
                    'forgot_msg' => '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk mengubah password! (cek kotak Spam apabila mail tidak ditemukan)</div>'
                ];
                $this->session->set_userdata($session_data);
                $tokens = $this->Auth_model->generateForgotToken();
                $this->Auth_model->sendTokenEmail($tokens);
            } else {
                $session_data = [
                    'forgot_msg' => '<div class="alert alert-danger" role="alert">Email tidak ditemukan!</div>'
                ];
                $this->session->set_userdata($session_data);
            }
            redirect(site_url('auth/forgot/'));

        }
    }

    public function forgot_handle()
    {
        if( !empty($this->session->userdata('user_id')) ){
            $data = [
                'isLoggedIn' => TRUE
            ];
        } else {
            $data = [
                'isLoggedIn' => FALSE
            ]; 
        }

        $token = $this->input->get('token'); //kalo tokennya NULL
        if( empty($token) ){
            redirect(site_url('auth'));
        }

        $data['title'] = 'Ubah Password';
        $data['url_param'] = "?token=" . $token;

        $extract = $this->Auth_model->extractForgotToken( $token );
        if( empty($extract) ){ //tokennya salah
            if( $data['isLoggedIn'] == TRUE ){
                redirect(site_url('profile/index'));
            }
            $data['id'] = NULL;
            $data['isValidToken'] = FALSE;

            $this->load->view('templates/header', $data);
            $this->load->view('auth/forgot_handle', $data);
            $this->load->view('templates/footer');
        } else { //tokennya bener
            $data['id'] = $extract['user_id'];
            $data['isValidToken'] = TRUE;

            $this->form_validation->set_rules('password', 'Password', 'required|matches[password2]|min_length[8]|max_length[72]', [
                'required' => '{field} harus diisi', 
                'matches' => '{field} tidak sama',
                'min_length' => '{field} terlalu pendek',
                'max_length' => '{field} terlalu panjang'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|matches[password]', [
                'required' => '{field} harus diisi',
                'matches' => '{field} tidak sama'
            ]);
    
            if( $this->form_validation->run() == FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('auth/forgot_handle', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Auth_model->changePassword( $token );
            }
        }
        
        //token work
        

    }

    
        
        

    public function logout()
    {
        if( !empty($this->session->userdata('user_id')) ){
            $this->session->unset_userdata('user_id');
        }
        redirect(site_url('auth/index'));
    }
}

?>

