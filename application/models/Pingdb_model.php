<?php
defined('BASEPATH') OR exit;

class Pingdb_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_sso_app($app_id) {
        return $this->db->select('*')->from('sso_apps')->where('app_id', $app_id)->get()->row_array(0);
    }

    public function get_event($event_id, $columns = '*') {
        return $this->db->select($columns)->from('events')->where('event_id', $event_id)->get()->row_array(0);
    }

    public function get_user($user_id, $columns = '*') {
        return $this->db->select($columns)->from('users')->where('user_id', $user_id)->get()->row_array(0);
    }

    public function get_battle_data($user_id, $columns = '*') {
        return $this->db->select($columns)->from('battle_data')->where('user_id', $user_id)->get()->row_array(0);
    }

    public function get_semnas_data($user_id, $columns = '*') {
        return $this->db->select($columns)->from('semnas_data')->where('user_id', $user_id)->get()->row_array(0);
    }

}

