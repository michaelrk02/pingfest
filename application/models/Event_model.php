
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    private $_table = "pf_events";

    public $event_id;
    public $name;
    public $price;
    public $available;
    public $locked; 
    public $announcements; 

    public function rules()
    {
        return [];
    }
 

    public function getAll()
    { 
        $this->db->select('pf_events.*'); 
        $this->db->from('pf_events'); 
        $query = $this->db->get();
        return $query->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["event_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->event_id = $post["event_id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->available = $post["available"];
        $this->locked = $post["locked"]; 
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post(); 
        $this->event_id = $post["event_id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        if(isset($post["available"])){
            $this->available = $post["available"];
        }else{
            $this->available = 0;
        }
        if(isset($post["locked"])){
            $this->locked = $post["locked"];
        }else{
            $this->locked = 0;
        } 
        $this->announcements = $post["announcements"]; 
        return $this->db->update($this->_table, $this, array('event_id' => $post['event_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("event_id" => $id));
    }
}