<?php
class Usermod extends CI_Model{

    function add($data)
    {
        if($this->db->insert("user",$data)==true)
        {
           $res = 1;
           return $res;
        }
        else{
           $feed = 0;
           return $feed;
        }
        
    }
    function select_by_email($e)
    {
        $this->db->where("email",$e);
        $res =  $this->db->get("user");
        return $res;
    }
    function select_all_except_admin($b)
    {
         $this->db->where("role",$b);
         $result = $this->db->get("user");
         return $result;
    }
    function delete_by_id($did)
    {
        $this->db->where("id",$did);
        $this->db->delete("user");
    }
    function select_by_id($eid)
    {
        $this->db->where("id",$eid);
        $data = $this->db->get("user");
        return $data;
    }
    function update_by_id($uid,$data)
    {
        $this->db->where("id",$uid);
        $this->db->update("user",$data);
    }
    function select_for_user($uid)
    {
        $this->db->where("id",$uid);
        $data = $this->db->get('user');
        // print_r($data);die;
        return $data;
    }
    function get_pass($curr_pass)
    {
        $this->db->where("password",$curr_pass);
        $data = $this->db->get('user');
        return $data;
    }
    function update_pass($uid,$data)
    {
        $this->db->where("id",$uid);
        $this->db->update("user",$data);
    }
    function user_eprof()
    {
        $this->load->view("user/edit_prof");
        
    }
    function change($id)
    {
        $this->db->where("id",$id);
        $data = $this->db->get("user");
        return $data;
    }
    function update_status($id,$a)
    {
        $this->db->where("id",$id);
        $this->db->update("user",$a);
    }
}


?>