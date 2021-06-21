
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_participant_model extends CI_Model
{
    private $_table = "pf_event_participants";

    public $user_id;
    public $event_id;
    public $status;
    public $timestamp;
    public $invoice;
    public $unique;
    public $total;

    public function rules()
    {
        return [];
    }

    public function countRow(){
        $query = $this->db->query('
            SELECT * FROM pf_event_participants 
            join pf_users on pf_users.user_id = pf_event_participants.user_id 
            join pf_events on pf_events.event_id = pf_event_participants.event_id
        '); 
        return $query->num_rows();
    }

    public function getAll()
    { 
        $this->db->select('
            pf_event_participants.timestamp,pf_users.user_id,pf_users.name as name_user,pf_users.email,pf_users.phone,pf_events.name as name_event
        '); 
        $this->db->from('pf_event_participants');
        $this->db->join('pf_users','pf_users.user_id = pf_event_participants.user_id'); 
        $this->db->join('pf_events','pf_events.event_id = pf_event_participants.event_id'); 
        $query = $this->db->get();
        return $query->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->team_name = $post["team_name"];
        $this->school = $post["school"];
        $this->leader = $post["leader"];
        $this->member_1 = $post["member_1"];
        $this->member_2 = $post["member_2"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->team_name = $post["team_name"];
        $this->school = $post["school"];
        $this->leader = $post["leader"];
        $this->member_1 = $post["member_1"];
        $this->member_2 = $post["member_2"];
        return $this->db->update($this->_table, $this, array('user_id' => $post['user_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("user_id" => $id));
    }
}