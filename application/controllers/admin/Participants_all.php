<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participants_All extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Event_participant_model");
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
		if(!empty($this->session->userdata("username_admin"))){
			$data["participants"] = $this->Event_participant_model->getAll(); 
			$this->load->view('/Admin/templates/start');
			$this->load->view('/Admin/templates/header');
			$this->load->view('/Admin/templates/sidebar');
			$this->load->view('/Admin/participants_all/index',$data);
			$this->load->view('/Admin/templates/footer');
			$this->load->view('/Admin/participants_semnas/tamplatejs');
			$this->load->view('/Admin/templates/end');
		}else{
			redirect(base_url('Admin/login/index'));
		}
	}
}
