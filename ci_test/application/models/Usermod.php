<?php
class Usermod extends CI_Model {

    function __construct()
    {
        $this->tableName = "user";
        
        parent :: __construct();

    }

    function save($data)
    {
        $this->db->insert($this->tableName, $data);
    }

    function select_by_user_email($e)
    {
        $this->db->where("email", $e);
        return $this->db->get($this->tableName);
    }

	
}
