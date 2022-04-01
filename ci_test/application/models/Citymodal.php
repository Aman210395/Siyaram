<?php
class Citymodal extends CI_Model {

    function __construct()
    {
        $this->tableName = "city";
        
        parent :: __construct();

    }

    function save($data)
    {
        $this->db->insert($this->tableName, $data);
    }
    function get_all()
    {
        return $this->db->get($this->tableName);
        // $this->db->query("SELECT * FROM ".$this->tableName);
    }
    function get_by_id($id)
    {
        $this->db->where("id", $id);
        return $this->db->get($this->tableName);
        
    }
    function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->tableName, $data);
    }
    function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete($this->tableName);
    }

    

	
}
