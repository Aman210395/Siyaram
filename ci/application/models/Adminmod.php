<?php
class Adminmod extends CI_Model{
    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    function add($data)
    {
        // print_r($data);die;
        $this->db->insert("admin", $data);    
    }

    function select_by_email($e)
    {
        // SELECT * FROM user
        $this->db->where("username", $e);
        $result = $this->db->get("admin");
        // SELECT * FROM user WHERE email ='$e'
        return $result;

    }

    


    function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("admin", $data);
    }
}

?>