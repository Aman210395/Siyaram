<?php

class Profile extends CI_Controller{

    function __construct()
    {
        parent :: __construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->backdoor();
    }
    function index(){
        $pagedata = array("pagename"=>"user/profile", "title"=>"User Profile Page");
        $this->load->view("user/layout", $pagedata);
        $this->benchmark->mark('code_end');
    }


    function backdoor(){
        if(! $this->session->userdata("is_user_logged_in")){
            redirect("user/login");
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect("user/login");
    }
}

?>