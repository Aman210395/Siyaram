<?php
class Usermod extends CI_Model{
    function __construct()
    {
        parent :: __construct();
        // $this->load->database();
    }
    function add($data){
        //  print_r($data);
        $this->db->insert("user", $data);  
       redirect("Home/login");

    }
    function select_by_email($e)
    {
        $this->db->where("email",$e);
        $result = $this->db->get("user");
        // print_r($result);
        return $result;
        

    }
    function select_by_id($id)
    {
        $this->db->where("id", $id);
        $result = $this->db->get("user");
        // print_r($result);
        return $result;
        

    }
    function update($id,$data)
    {
        $this->db->where("id",$id);
        $this->db->update("user",$data);

    }
}

?>