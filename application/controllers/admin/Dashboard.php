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
        $this->load->model("Event_participant_model");
        $this->load->model("User_model");
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
			// $countBettle = $this->Bettle_model->countRow(); 
			// $countMusic = $this->Music_model->countRow(); 
			// $countPaper = $this->Paper_model->countRow(); 
			// $countSemnas = $this->Semnas_model->countRow(); 
			$countBettle = $this->Event_participant_model->countTableRow('battle'); 
			$countMusic = $this->Event_participant_model->countTableRow('music'); 
			$countPaper = $this->Event_participant_model->countTableRow('paper'); 
			$countSemnas = $this->Event_participant_model->countTableRow('semnas'); 
			$countParticipant = $this->Event_participant_model->countRow(1); 
			$countBelumParticipant = $this->Event_participant_model->countRow(0); 
			$countAkun = $this->User_model->countRow(); 

			$sumBettle = $this->Event_participant_model->sumPrice('battle'); 
			$sumMusic = $this->Event_participant_model->sumPrice('music'); 
			$sumPaper = $this->Event_participant_model->sumPrice('paper'); 
			$sumSemnas = $this->Event_participant_model->sumPrice('semnas'); 
			$sumSemua = $this->Event_participant_model->sumPriceAll(); 

			$this->load->view('/Admin/templates/start');
			$this->load->view('/Admin/templates/header');
			$this->load->view('/Admin/templates/sidebar');
			$this->load->view('/Admin/dashboard',[
				'countBettle' => $countBettle,
				'countMusic' => $countMusic,
				'countPaper' => $countPaper,
				'countSemnas' => $countSemnas,
				'countParticipant' => $countParticipant,
				'sumBettle' => $sumBettle,
				'sumMusic' => $sumMusic,
				'sumPaper' => $sumPaper,
				'sumSemnas' => $sumSemnas,
				'sumSemua' => $sumSemua,
				'countBelumParticipant' => $countBelumParticipant,
				'countAkun' => $countAkun,
			]);
			$this->load->view('/Admin/templates/footer');
			$this->load->view('/Admin/templates/dashboardjs');
			$this->load->view('/Admin/templates/end');
		}else{
			redirect(site_url('admin/login/index'));
		}
	}
}
