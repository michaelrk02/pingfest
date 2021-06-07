
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Music_model extends CI_Model
{
    private $_table = "pf_music_data";

    public $user_id;
    public $group_name;
    public $leader;
    public $member_1;
    public $member_2;
    public $song_name;
    public $link;

    public function rules()
    {
        return [];
    }

    public function countRow(){
        $query = $this->db->query('SELECT * FROM pf_music_data');
        return $query->num_rows();
    }

    public function getAll()
    {
        $this->db->select('*'); 
        $this->db->from('pf_music_data');
        $this->db->join('pf_users','pf_users.user_id = pf_music_data.user_id'); 
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
        $this->group_name = $post["group_name"];
        $this->leader = $post["leader"];
        $this->member_1 = $post["member_1"];
        $this->member_2 = $post["member_2"];
        $this->song_name = $post["song_name"];
        $this->link = $post["link"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post["user_id"];
        $this->group_name = $post["group_name"];
        $this->leader = $post["leader"];
        $this->member_1 = $post["member_1"];
        $this->member_2 = $post["member_2"];
        $this->song_name = $post["song_name"];
        $this->link = $post["link"];
        return $this->db->update($this->_table, $this, array('user_id' => $post['user_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("user_id" => $id));
    }
}