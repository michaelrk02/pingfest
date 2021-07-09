<?php
defined('BASEPATH') OR exit;

class Profile_events_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get($id, $columns = '*') {
        return $this->db->select($columns)->from('events')->where('event_id', $id)->get()->row_array(0);
    }

    public function list_events() {
        $data = $this->db->select('*')->from('events')->get()->result_array();
        return isset($data) ? $data : [];
    }

    public function participant_add($data) {
        return $this->db->insert('event_participants', $data);
    }

    public function participant_get($user_id, $event_id, $columns = '*') {
        return $this->db->select($columns)->from('event_participants')->where(['user_id' => $user_id, 'event_id' => $event_id])->get()->row_array(0);
    }

    public function participant_get_list($user_id, $columns = '*') {
        return $this->db->select($columns)->from('event_participants')->where('user_id', $user_id)->get()->result_array();
    }

    public function participant_set($user_id, $event_id, $data) {
        return $this->db->where(['user_id' => $user_id, 'event_id' => $event_id])->update('event_participants', $data);
    }

    public function participant_remove($user_id, $event_id) {
        return $this->db->where(['user_id' => $user_id, 'event_id' => $event_id])->delete('event_participants') !== FALSE;
    }

}

