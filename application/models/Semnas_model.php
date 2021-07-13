
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Semnas_model extends CI_Model
{
    private $_table = "pf_semnas_data";

    public $user_id;
    public $institution; 

    public function rules()
    {
        return [];
    }

    public function countRow(){
        $query = $this->db->query('
            SELECT * FROM pf_semnas_data 
            join pf_users on pf_users.user_id = pf_semnas_data.user_id
        ');
        return $query->num_rows();
    }

    public function getAll()
    {
        $this->db->select('*'); 
        $this->db->from('pf_semnas_data');
        $this->db->join('pf_users','pf_users.user_id = pf_semnas_data.user_id'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    { 
        $this->db->from('pf_semnas_data as semnas');
        $this->db->join('pf_users','pf_users.user_id = semnas.user_id'); 
        $this->db->where(["semnas.user_id" => $id]);
        $query = $this->db->get()->row();
        return  $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->institution = $post["institution"]; 
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->institution = $post["institution"]; 
        return $this->db->update($this->_table, $this, array('user_id' => $post['user_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("user_id" => $id));
    }
}