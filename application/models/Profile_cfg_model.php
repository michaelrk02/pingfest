<?php
defined('BASEPATH') OR exit;

class Profile_cfg_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get($key) {
        $entry = $this->db->select('value')->from('config')->where('key', $key)->get()->row_array(0);
        return isset($entry) ? $entry['value'] : NULL;
    }

}

