<?php
class Admin extends CI_Controller{
    function __construct()
    {
        parent :: __construct(); 
        $this->load->model("adminmod");   
    }
    function index()
    {
        $this->load->view("admin/login");
    }
    function auth()
    {
        $u = $this->input->post("username");
        $p = $this->input->post("password");

        $result = $this->adminmod->select_by_email($u);
        if($result -> num_rows()==1)
        {
            $data = $result->row_array();
            if($data['password']==sha1($p))
            {
                $this->session->set_userdata("is_admin_logged_in", true);
                redirect("adminpanel");
            }
            else{
                $this->session->set_flashdata("msg", "This Password is Incorrect");
                redirect("admin");
            }
        }
        else{
            $this->session->set_flashdata("msg", "This Username and Password is Incorrect");
            redirect("admin");
        }
    }
}

?>