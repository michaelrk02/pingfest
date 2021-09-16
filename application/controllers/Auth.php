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

        $this->pingfest->antispam_init('auth_registration', 60);

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
            'min_length' => '{field} minimal 8 karakter',
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
            $this->load->view('auth/TOS_modal');
            $this->load->view('auth/registration');
            $this->load->view('templates/footer');
        } else {
            $this->pingfest->antispam_handle('auth_registration');
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

        $this->pingfest->antispam_init('auth_forgot', 60);

        if( $this->session->userdata('forgot_flash') ){
            $this->session->unset_userdata('forgot_flash');
            $data = [
                'title' => 'Lupa Password',
                'msg_type' => 'success',
                'msg_content' => 'Silahkan cek email anda untuk mengubah password! (cek kotak Spam apabila mail tidak ditemukan)',
                'isAddingLink' => FALSE
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('auth/message', $data);
            $this->load->view('templates/footer');
        } else {
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
                    $this->pingfest->antispam_handle('auth_forgot');
                    $session_data = [
                        'forgot_flash' => TRUE
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
        if( empty($extract) ){ 
            if( $data['isLoggedIn'] == TRUE ){ //token salah, logged in
                redirect(site_url('profile/index'));
            } else { //token salah, logged out
                $data['msg_type'] = 'danger';
                $data['msg_content'] = 'Token tidak valid atau kadaluwarsa';
                $data['isAddingLink'] = TRUE;
                $data['msg_link'] = site_url('auth/index');
                $data['msg_link_content'] = 'Kembali ke halaman Login';

                $this->load->view('templates/header', $data);
                $this->load->view('auth/message', $data);
                $this->load->view('templates/footer');
            }
        } else { 
            if( $data['isLoggedIn'] == TRUE ){ //token bener, logged in
                $data['msg_type'] = 'danger';
                $data['msg_content'] = 'Harap logout terlebih dahulu untuk melanjutkan proses Ubah Password!';
                $data['isAddingLink'] = TRUE;
                $data['msg_link'] = site_url('profile/index');
                $data['msg_link_content'] = 'Menuju Profil';

                $this->load->view('templates/header', $data);
                $this->load->view('auth/message', $data);
                $this->load->view('templates/footer');
            } else { //token bener, logged out
                $data['id'] = $extract['user_id'];
                $data['isValidToken'] = TRUE;

                $this->form_validation->set_rules('password', 'Password', 'required|matches[password2]|min_length[8]|max_length[72]', [
                    'required' => '{field} harus diisi', 
                    'matches' => '{field} tidak sama',
                    'min_length' => '{field} minimal 8 karakter',
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

