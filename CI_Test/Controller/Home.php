<?php
class Home extends CI_Controller{

    function index()
    {
        $pagedata = array("pagename"=>"user/home","title"=>"Home Page");
        $this->load->view("user/layout",$pagedata);
    }
    function signup()
    {
        $pagedata = array("pagename"=>"user/signup","title"=>"Signup Page");
        $this->load->view("user/layout",$pagedata);
    }
    function save()
    {
        $data = $this->input->post();
        unset($data['re_pass']);
        // $data['password'] = sha1($password);
        $data['password']=sha1($data['password']);
        $data['hobby']=implode(",", $data['hobby']);
        $this->load->model("Usermod");
        $this->Usermod->add($data);

    }
    function login()
    {
        $pagedata = array("pagename"=>"user/login","title"=>"Login Page");
        $this->load->view("user/layout",$pagedata);

    }
    function auth()
    {
        $e = $this->input->post("email");
        $p = $this->input->post("password");
        // print_r(array($e,$p));die;
        $this->load->model("Usermod");
        $result = $this->Usermod->select_by_email($e);

        if($result->num_rows()==1)
        {
           $data = $result->row_array();
           if($data['password']==sha1($p))
           {
               $this->session->set_userdata("is_user_logged_in",true);
               $this->session->set_userdata("id",$data['id']);
               $this->session->set_userdata("Name",$data['fullname']);
               redirect("Profile");
           }
           else
           {
            $this->session->set_flashdata("Msg","This Password is Incorrect");
            redirect("Home/login");
           }
        }
        else{
           
             $this->session->set_flashdata("Msg","This Username & Password is Incorrect");
             redirect("Home/login");
        }
    }
}

?>