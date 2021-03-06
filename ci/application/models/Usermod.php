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

    function select_by_id($id)
    {
        $this->db->where("id", $id);
        $result = $this->db->get("user");
        // SELECT * FROM user WHERE id ='$id'
        return $result;
    }


    function select_all()
    {
        return $this->db->get("user");
        
    }


    function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("user", $data);
    }
}

?>