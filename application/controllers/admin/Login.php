<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Config_model");
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{ 
		$this->load->view('/Admin/login/index'); 
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$whereUsername = array(
			'key' => 'admin_username',
			'value' => $username
			);
		$wherePassword = array(
			'key' => 'admin_password',
			// 'value' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 5])
			);
		$cekUsername = $this->Config_model->cekLogin($whereUsername)->num_rows();
		$cekPassword = $this->Config_model->cekLogin($wherePassword)->row(); 
		if($cekUsername > 0 && password_verify($password, $cekPassword->value)){

			$data_session = array(
				'username_admin' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(site_url("admin/dashboard"));
		}else{
			redirect(site_url('admin/login/index'));
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('admin/login/index'));
	}
}
