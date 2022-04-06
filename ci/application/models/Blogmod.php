<?php

class Blogmod extends CI_Model{

    function __construct()
    {
        parent :: __construct();
        $this->load->database();
    }

    function insert_demo($data){
        $this->db->insert("demo", $data);
    }

    function add($data)
    {
        // print_r($data);die;
        $this->db->insert("blog", $data);    
    }

    

    function select_by_id($id)
    {
        $this->db->where("id", $id);
        $result = $this->db->get("blog");
        // SELECT * FROM user WHERE id ='$id'
        return $result;
    }

    function select_by_user_id($id)
    {
        $this->db->where("user_id", $id);
        $result = $this->db->get("blog");
        // SELECT * FROM user WHERE id ='$id'
        return $result;
    }


    function select_all()
    {
        return $this->db->get("blog");
        
    }

    function select_all_join_user()
    {
        return $this->db->query("SELECT * FROM blog LEFT JOIN user ON blog.user_id = user.id ORDER BY blog.id DESC");
    }


    function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("blog", $data);
    }

    function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("blog");
    }
}

?>