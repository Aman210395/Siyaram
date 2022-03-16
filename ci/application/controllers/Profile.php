<?php

class Profile extends MY_Controller{

    function __construct()
    {
        parent :: __construct();
        // $this->load->library("session");
        // $this->load->helper("url");
        $this->load->model("usermod");
        $this->backdoor();
    }
    function index(){

        $result=$this->usermod->select_by_id($this->session->userdata("id"));
        $data = $result->row_array();


        $pagedata = array("pagename"=>"user/profile", "title"=>"User Profile Page", "data"=>$data);
        $this->load->view("user/layout", $pagedata);
        $this->benchmark->mark('code_end');
    }


    

    function logout(){
        $this->session->sess_destroy();
        redirect("user/login");
    }

    function edit_profile(){
        $result=$this->usermod->select_by_id($this->session->userdata("id"));
        $data = $result->row_array();


        $pagedata = array("pagename"=>"user/edit_profile", "title"=>"User Edit Profile Page", "data"=>$data);
        $this->load->view("user/layout", $pagedata);
        
    }


    function update(){
        $data = $this->input->post();
        $this->usermod->update($this->session->userdata("id"), $data);
        redirect("profile/");
    }
    function change_password(){
        $pagedata = array("pagename"=>"user/change_password", "title"=>"Change Password");
        $this->load->view("user/layout", $pagedata);
    }


    function update_password(){
        $a = $this->input->post("cur_pass");
        $b = $this->input->post("new_pass");
        $c = $this->input->post("conf_pass");
        $result=$this->usermod->select_by_id($this->session->userdata("id"));
        $data = $result->row_array();

        if($data['password'] == sha1($a))
        {
            if($b == $c)
            {
                $arr = array("password" => sha1($b));
                $this->usermod->update($this->session->userdata("id"), $arr);
                redirect("profile");
            }
            else{
                $this->session->set_flashdata("msg", "New Password and Confirm New Password not Matched");
                redirect("profile/change_password");
            }
        }
        else{
            $this->session->set_flashdata("msg", "Current Password is Incorrect");
            redirect("profile/change_password");
        }

    }
}

?>