<?php

class Usermod extends CI_Model{

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    function add($data)
    {
        // print_r($data);die;
        $this->db->insert("user", $data);    
    }

    function select_by_email($e)
    {
        // SELECT * FROM user
        $this->db->where("email", $e);
        $result = $this->db->get("user");
        // SELECT * FROM user WHERE email ='$e'
        return $result;

    }
}

?>