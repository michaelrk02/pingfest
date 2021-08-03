<?php
defined('BASEPATH') OR exit;

class Profile_users_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get($id, $columns = '*') {
        return $this->db->select($columns)->from('users')->where('user_id', $id)->get()->row_array(0);
    }

    public function set($id, $data) {
        return $this->db->where('user_id', $id)->update('users', $data);
    }

}

