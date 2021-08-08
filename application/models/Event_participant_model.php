
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

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Config_model");
    }

    public function rules()
    {
        return [];
    }

    public function countRow($status){
        $query = $this->db->query('
            SELECT * FROM pf_event_participants 
            join pf_users on pf_users.user_id = pf_event_participants.user_id 
            join pf_events on pf_events.event_id = pf_event_participants.event_id
            where pf_event_participants.status = "'.$status.'"
        '); 
        return $query->num_rows();
    }

    public function countTableRow($id){
        $query = $this->db->query('
            SELECT * FROM pf_event_participants 
            join pf_users on pf_users.user_id = pf_event_participants.user_id 
            join pf_events on pf_events.event_id = pf_event_participants.event_id
            where pf_event_participants.event_id = "'.$id.'" and  pf_event_participants.status = 1
        '); 
        return $query->num_rows();
    }

    public function sumPrice($id){
        $this->db->select_sum('invoice'); 
        $query = $this->db->get_where($this->_table, ["event_id" => $id,'status' => 1])->row(); 
        return $query;
    }   

    public function sumPriceAll(){
        $this->db->select_sum('invoice');  
        $query = $this->db->get_where($this->_table, ['status' => 1])->row(); 
        return $query;
    }   

    public function getAll()
    { 
        $whereExpire = array(
            'key' => 'invoice_expire' 
        );
        $invoiceExpire = $this->Config_model->cekLogin($whereExpire)->row();
        $this->db->select('
            pf_event_participants.timestamp, 
            pf_event_participants.status,
            pf_event_participants.event_id,
            pf_event_participants.invoice,
            pf_event_participants.unique,
            pf_event_participants.total,
            pf_users.user_id,pf_users.name as name_user,
            pf_users.email,
            pf_users.phone,
            pf_events.name as name_event,
            ('.time().'> timestamp + '.$invoiceExpire->value.') AS expired
        '); 
        $this->db->from('pf_event_participants');
        $this->db->join('pf_users','pf_users.user_id = pf_event_participants.user_id'); 
        $this->db->join('pf_events','pf_events.event_id = pf_event_participants.event_id'); 
        $query = $this->db->get();
        return $query->result();
    }

     public function updatePayment()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->event_id = $post["event_id"]; 
        $this->status = $post["status"]; 
        $this->timestamp = $post["timestamp"]; 
        $this->invoice = $post["invoice"]; 
        $this->unique = $post["unique"]; 
        $this->total = $post["total"]; 
        return $this->db->update(
            $this->_table, 
            $this, 
            array(
                'user_id' => $post['user_id'],
                'event_id' => $post['event_id']
            )
        );
    }


    public function decline()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->event_id = $post["event_id"]; 
        return $this->db->delete(
            $this->_table, 
            array(
                'user_id' => $post['user_id'],
                'event_id' => $post['event_id']
            )
        );
    }
}