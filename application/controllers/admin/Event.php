<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Event_model");
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
			$data["events"] = $this->Event_model->getAll(); 
			$this->load->view('/Admin/templates/start');
			$this->load->view('/Admin/templates/header');
			$this->load->view('/Admin/templates/sidebar');
			$this->load->view('/Admin/event/index', $data);
			$this->load->view('/Admin/templates/footer');
			$this->load->view('/Admin/templates/datatablejs');
			$this->load->view('/Admin/event/tamplatejs');
			$this->load->view('/Admin/templates/end');
		}else{
			redirect(site_url('admin/login/index'));
		}
	}

	public function edit($id)
	{
		if(!empty($this->session->userdata("username_admin"))){
			$data = $this->Event_model->getById($id); 
			if(empty($data)){
				$this->session->set_flashdata('msg', 'Data tidak ditemukan');
				redirect(site_url('admin/event/index'));
			}
			$this->load->view('/Admin/templates/start');
			$this->load->view('/Admin/templates/header');
			$this->load->view('/Admin/templates/sidebar');
			$this->load->view('/Admin/event/edit', [
				'data' => $data
			]);
			$this->load->view('/Admin/templates/footer');
			$this->load->view('/Admin/templates/datatablejs');
			$this->load->view('/Admin/event/tamplatejs');
			$this->load->view('/Admin/templates/end');
		}else{
			redirect(site_url('admin/login/index'));
		}
	}

	public function update($id){ 
		$data = $this->Event_model->getById($id); 
		if(empty($data)){
			$this->session->set_flashdata('msg', 'Data tidak ditemukan');
			redirect(site_url('admin/event/index'));
		}

		$this->Event_model->update(); 
		$this->session->set_flashdata('msg', 'Berhasil diubah');
		redirect(site_url('admin/event/index'));
	}

	public function available(){
		$this->Event_model->update();  
		redirect(site_url('admin/event/index'));
	}


	public function locked(){
		$this->Event_model->update();  
		redirect(site_url('admin/event/index')); 
	}
}
