<?php
class Profile extends CI_Controller{

    function __construct()
    {
        parent ::__construct();
        $this->backdoor();
        
        
    }
    function index()
    {
        $this->load->model("Usermod");
        $result = $this->Usermod->select_by_id($this->session->userdata("id"));
        $data = $result->row_array();
        // print_r($data);
        // die;

        $pagedata = array("pagename"=>"user/profile","title"=>"Profile Page","data"=>$data);
        $this->load->view("user/layout",$pagedata);
    }
    function backdoor()
    {
        if(! $this->session->userdata("is_user_logged_in"))
        {
            redirect("Home/login");
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect("Home/login");
    }
    function Edit_Profile()
    {
        $this->load->model("Usermod");
        $result = $this->Usermod->select_by_id($this->session->userdata("id"));
        $data = $result->row_array();
        $pagedata = array("pagename"=>"user/edit_profile","title"=>"Edit Profile Page","data"=>$data);
        $this->load->view("user/layout",$pagedata);
    }
    function update()
    {
        $data = $this->input->post();
        // print_r($data);die;
        $data['hobby']=implode(",",$data['hobby']);
        $this->load->model("Usermod");
        $this->Usermod->update($this->session->userdata("id"),$data);
        redirect("Profile");
    }
    function change_password()
    {
        $pagedata = array("pagename"=>"user/change_password", "title"=>"Password Update Page");
        $this->load->view("user/layout",$pagedata);        
    }
    function update_password()
    {
         $a = $this->input->post("curr_pass");
         $b = $this->input->post("new_pass");
         $c = $this->input->post("conf_new_pass");
         
         $this->load->model("Usermod");
         $result = $this->Usermod->select_by_id($this->session->userdata("id"));
         $data = $result->row_array();
         if($data['password']==sha1($a))
         {
            if($b==$c)
            {
                  $arr = array("password"=>sha1($b));
                  $this->load->model("Usermod");
                  $this->Usermod->update($this->session->userdata("id"),$arr);
                  redirect("Profile");
            }
            else
            {
                $this->session->set_flashdata("Msg","New & Conf New Password is Incorrect");
                redirect("Profile/change_password");
            }
         }
         else{
             $this->session->set_flashdata("Msg","Current Password is Incorrect");
             redirect("Profile/change_password");
         }
    }


}

?>