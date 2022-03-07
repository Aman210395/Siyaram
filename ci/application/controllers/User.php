<?php
class User extends CI_Controller{

    function __construct()
    {
        parent :: __construct();
        $this->load->helper("url");
        $this->load->library("session");
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
    function login(){
        
        $pagedata = array("pagename"=>"user/login", "title"=>"Login Page");
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
    function auth(){
        $this->benchmark->mark('code_start');
        $e = $this->input->post("email");
        $p = $this->input->post("password");
        $this->load->model("Usermod");
        $result = $this->Usermod->select_by_email($e);

        if($result->num_rows()==1)
        {
            $data = $result->row_array();
            if($data['password'] == sha1($p))
            {
                $this->session->set_userdata("is_user_logged_in", true);
                $this->session->set_userdata("id", $data['id']);
                $this->session->set_userdata("fullname", $data['fullname']);
                redirect("profile");
                
            }else{
                $this->session->set_flashdata("msg", "This Password is Incorrect");
                redirect("user/login");
            }
        }
        else{
            $this->session->set_flashdata("msg", "This Username and Password is Incorrect");
            redirect("user/login");
        }

    }

    
}

?>