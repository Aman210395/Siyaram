<?php
class User extends CI_Controller{

    function __construct()
    {
        parent :: __construct();
        $this->load->helper("url");
    }
    function index(){
        $pagedata = array("pagename"=>"user/home", "title"=>"Home Page");
        $this->load->view("user/layout", $pagedata);
    }
    function about(){
        $pagedata = array("pagename"=>"user/about", "title"=>"About Page");
        $this->load->view("user/layout", $pagedata);
    }
    function contact(){
        $pagedata = array("pagename"=>"user/contact", "title"=>"Contact Page");
        $this->load->view("user/layout", $pagedata);
    }
    function signup(){
        $pagedata = array("pagename"=>"user/signup", "title"=>"Signup Page");
        $this->load->view("user/layout", $pagedata);
    }

    function save(){
        $arr = $this->input->post();
        unset($arr['re_pass']);
        $arr['password']=sha1($arr['password']);
        $this->load->model("Usermod");
        $this->Usermod->add($arr);
        redirect("user");
    }
    
}

?>