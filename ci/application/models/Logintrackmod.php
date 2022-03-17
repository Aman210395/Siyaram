<?php

class Logintrackmod extends CI_Model{

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    function add($data)
    {
        // print_r($data);die;
        $this->db->insert("login_track", $data);    
    }

    
    function last_login($id){
        return $this->db->query("SELECT * FROM login_track WHERE user_id=$id ORDER BY create_at DESC LIMIT 1, 1");
    }

    function select_by_id($id)
    {
        $this->db->where("id", $id);
        $result = $this->db->get("login_track");
        // SELECT * FROM user WHERE id ='$id'
        return $result;
    }

    function select_by_user_id($id)
    {
        $this->db->where("user_id", $id);
        $result = $this->db->get("login_track");
        // SELECT * FROM user WHERE id ='$id'
        return $result;
    }


    function select_all()
    {
        return $this->db->get("login_track");
        
    }

   

    function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("login_track", $data);
    }

    function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("login_track");
    }
}

?>