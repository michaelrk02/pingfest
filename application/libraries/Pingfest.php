<?php
defined('BASEPATH') OR exit;

class Pingfest {

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();

        $this->ci->load->library('storage');
    }

    public function view_battle_idcard($user_id) {
        $this->ci->storage->access('idcard/battle/'.$user_id, 10);
    }

    public function view_paper_idcard($user_id) {
        $this->ci->storage->access('idcard/paper/'.$user_id, 10);
    }

    public function view_paper_submission($user_id) {
        $this->ci->storage->access('submission/paper/'.$user_id, 10);
    }

}

