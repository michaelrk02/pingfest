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

    public function battle_add($identity) {
        return $this->db->insert('battle_data', $identity);
    }

    public function battle_get($user_id, $columns = '*') {
        return $this->db->select($columns)->from('battle_data')->where('user_id', $user_id)->get()->row_array(0);
    }

    public function battle_set($user_id, $identity) {
        return $this->db->where('user_id', $user_id)->update('battle_data', $identity);
    }

    public function battle_verify_team($user_id, $team_name) {
        $identity = $this->battle_get($user_id, 'team_name');
        if (isset($identity)) {
            if ($team_name !== $identity['team_name']) {
                return $this->db->select('user_id')->from('battle_data')->where('user_id !=', $user_id)->where('team_name', $team_name)->get()->row_array(0) === NULL;
            }
            return TRUE;
        }
        return FALSE;
    }

    public function music_add($identity) {
        if (isset($identity['members'])) {
            $identity['members'] = $this->json_serialize($identity['members']);
        }
        return $this->db->insert('music_data', $identity);
    }

    public function music_get($user_id, $columns = '*') {
        $identity = $this->db->select($columns)->from('music_data')->where('user_id', $user_id)->get()->row_array(0);
        if (isset($identity['members'])) {
            $identity['members'] = $this->json_deserialize($identity['members']);
        }
        return $identity;
    }

    public function music_set($user_id, $identity) {
        if (isset($identity['members'])) {
            $identity['members'] = $this->json_serialize($identity['members']);
        }
        return $this->db->where('user_id', $user_id)->update('music_data', $identity);
    }

    public function paper_add($identity) {
        if (isset($identity['members'])) {
            $identity['members'] = $this->json_serialize($identity['members']);
        }
        return $this->db->insert('paper_data', $identity);
    }

    public function paper_get($user_id, $columns = '*') {
        $identity = $this->db->select($columns)->from('paper_data')->where('user_id', $user_id)->get()->row_array(0);
        if (isset($identity['members'])) {
            $identity['members'] = $this->json_deserialize($identity['members']);
        }
        return $identity;
    }

    public function paper_set($user_id, $identity) {
        if (isset($identity['members'])) {
            $identity['members'] = $this->json_serialize($identity['members']);
            var_dump($identity['members']);
        }
        return $this->db->where('user_id', $user_id)->update('paper_data', $identity);
    }

    public function semnas_add($identity) {
        return $this->db->insert('semnas_data', $identity);
    }

    public function semnas_get($user_id, $columns = '*') {
        return $this->db->select($columns)->from('semnas_data')->where('user_id', $user_id)->get()->row_array(0);
    }

    public function semnas_set($user_id, $identity) {
        return $this->db->where('user_id', $user_id)->update('semnas_data', $identity);
    }

    private function json_serialize($arr) {
        if (!is_array($arr)) {
            $arr = [];
        }
        return @json_encode(['data' => $arr]);
    }

    private function json_deserialize($json) {
        $data = @json_decode($json, TRUE);
        return isset($data) && isset($data['data']) && is_array($data['data']) ? $data['data'] : NULL;
    }

}

