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
}

?>