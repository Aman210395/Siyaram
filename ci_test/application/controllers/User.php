<?php
class User extends MY_Controller {

    function __construct()
    {
        parent :: __construct();
        $this->load->model("usermod");
       
    }


    
    function logout(){
        $this->session->sess_destroy();
        redirect("home/login");
    }

	function index()
	{
        $pagedata = array(
            "pagename" => "user/profile",
            "title" => "Profile Page"
        );
        $this->load->view("layout", $pagedata);
	}
    
}
