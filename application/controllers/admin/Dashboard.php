<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Bettle_model");
        $this->load->model("Music_model");
        $this->load->model("Paper_model");
        $this->load->model("Semnas_model");
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
		$countBettle = $this->Bettle_model->countRow(); 
		$countMusic = $this->Music_model->countRow(); 
		$countPaper = $this->Paper_model->countRow(); 
		$countSemnas = $this->Semnas_model->countRow(); 
		$this->load->view('/Admin/templates/start');
		$this->load->view('/Admin/templates/header');
		$this->load->view('/Admin/templates/sidebar');
		$this->load->view('/Admin/dashboard',[
			'countBettle' => $countBettle,
			'countMusic' => $countMusic,
			'countPaper' => $countPaper,
			'countSemnas' => $countSemnas
		]);
		$this->load->view('/Admin/templates/footer');
		$this->load->view('/Admin/templates/dashboardjs');
		$this->load->view('/Admin/templates/end');
	}
}
