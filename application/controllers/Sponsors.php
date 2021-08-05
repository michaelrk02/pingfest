<?php
defined('BASEPATH') OR exit;

class Sponsors extends CI_Controller {

    public function join() {
        $this->load->view('templates/header', ['title' => 'Sponsor Us']);
        $this->load->view('sponsors/join');
        $this->load->view('templates/footer');
    }

}

