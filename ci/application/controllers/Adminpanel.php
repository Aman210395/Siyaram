<?php
class Adminpanel extends CI_Controller{
    function __construct()
    {
        parent :: __construct(); 
        $this->load->model("usermod");   
        $this->backdoor();
    }
    function backdoor()
    {
        if(! $this->session->userdata("is_admin_logged_in"))
        {
            redirect("user");
        }
    }
    function index()
    {
        $pagedata = array("pagename" => "admin/dash", "title"=>"Admin Panel");
        $this->load->view("admin/layout", $pagedata);
    }
    function users()
    {
        $result = $this->usermod->select_all();
        $pagedata = array("pagename" => "admin/users", "title"=>"Admin Panel : List User", "result"=>$result);
        $this->load->view("admin/layout", $pagedata);
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect("user");
    }
    function changestatus($a, $b)
    {
        // if($b==1)
        // {
        //     $arr = array("status"=>0);
        // }else{
            
        //     $arr = array("status"=>1);
        // }
        $arr["status"] = $b==1 ? 0 : 1;

        $this->usermod->update($a, $arr);
        redirect("adminpanel/users");
         // echo $a == 1 ? "hello" : "welcome";
    }
}

?>