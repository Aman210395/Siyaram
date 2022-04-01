<?php
class Studentmodal extends CI_Model {

    function __construct()
    {
        $this->tableName = "student";
        
        parent :: __construct();

    }

    function save($data)
    {
        $this->db->insert($this->tableName, $data);
    }
    function get_all()
    {
        return $this->db->query("SELECT *, city.name AS cname, ".$this->tableName.".name AS sname, ".$this->tableName.".id AS sid FROM ".$this->tableName." LEFT JOIN city ON ".$this->tableName.".city=city.id");
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
