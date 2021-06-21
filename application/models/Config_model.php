
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model
{
    private $_table = "pf_config";

    public $key;
    public $value; 

    public function rules()
    {
        return [];
    }

    public function cekLogin($where)
    {
        return $this->db->get_where($this->_table, $where);
    }
}