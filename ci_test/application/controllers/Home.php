<?php
class Home extends CI_Controller {

    function __construct()
    {
        parent :: __construct();
        $this->load->model("usermod");
    }

	function index()
	{
        $pagedata = array(
            "pagename" => "user/home",
            "title" => "Home Page"
        );
        $this->load->view("layout", $pagedata);
	}
    function about()
	{
        $pagedata = array(
            "pagename" => "user/about",
            "title" => "About Page"
        );
        $this->load->view("layout", $pagedata);
	}
    function contact()
	{
        $pagedata = array(
            "pagename" => "user/contact",
            "title" => "Contact Page"
        );
        $this->load->view("layout", $pagedata);
	}
    function signup()
	{
        if($this->input->post("submit"))
        {
            $data = $this->input->post();
            unset($data['re_pass']);
            unset($data['submit']);
            $data['password'] = sha1($data['password']);

            $this->usermod->save($data);
            redirect("home/login");
        }



        $pagedata = array(
            "pagename" => "user/signup",
            "title" => "Signup Page"
        );
        $this->load->view("layout", $pagedata);
	}
    function login()
	{
        if($this->input->post("submit"))
        {
            $e = $this->input->post("email");
            $p = $this->input->post("password");
            $result=$this->usermod->select_by_user_email($e);
            if($result->num_rows()==1)
            {
                $data = $result->row_array();
                if($data['password']==sha1($p))
                {
                    $this->session->set_userdata("is_logged_in", true);
                    $this->session->set_userdata("full_name", $data['full_name']);
                    $this->session->set_userdata("id", $data['id']);
                    redirect("user");
                    
                }else{

                    $this->session->set_flashdata("msg", "This Password Incorrect");
                    redirect("home/login");
                }
            }
            else{
                $this->session->set_flashdata("msg", "This Email and Password Incorrect");
                redirect("home/login");
            }
            
        }

        $pagedata = array(
            "pagename" => "user/login",
            "title" => "Login Page"
        );
        $this->load->view("layout", $pagedata);
	}
}
