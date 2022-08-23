<?php
class Profile extends CI_Controller{

    function __construct()
    {
        parent ::__construct();
        $this->backdoor();
    }

    function index()
    {
        $a = ['role'=>'user'];
        $b = implode("",$a);
        $this->load->model("Usermod");
        $result = $this->Usermod->select_all_except_admin($b);
        $data = $result->result_array();
        // print_r($data);
        // die;

        $pagedata = array("data"=>$data);
        $this->load->view("user/profile",$pagedata);
    }
    function profile()
    {
        $this->load->model("Usermod");
        $result = $this->Usermod->select_for_user($this->session->userdata("uid"));
        $data = $result->row_array();
        // print_r($data);die;
        $pagedata = array("data"=>$data);
        $this->load->view("user/user_profile",$pagedata);
    }
    function logout()
    {
        
            $this->session->sess_destroy();
            redirect("Home/login");
        
    }
    function user_logout()
    {
        
            $this->session->sess_destroy();
            redirect("Home/login");
        
    }
    
    function backdoor()
    {
        if(! $this->session->userdata("is_admin_logged_in") && ! $this->session->userdata("is_user_logged_in"))
        {
            redirect("Home/login");
        }
    }
    
    function delete()
    {
        $id = $this->input->get();
        // echo $id;
        // print_r($id);
        $did = implode("",$id);
        $this->load->model("Usermod");
        $this->Usermod->delete_by_id($did);
        redirect("Profile");
    }
    function edit()
    {
        $id = $this->input->get();
        $eid = implode("",$id);  
        // print_r($eid);die;
        $this->load->model("Usermod");
        $res = $this->Usermod->select_by_id($eid);
        $resp = $res->row_array();
        $pagedata = array("data"=>$resp);
        $this->load->view("user/edit_user",$pagedata);
    }
    function update()
    {
        $data = $this->input->post();
        // print_r($data);die;
        // $hobby = implode(",",$data['hobby']);
        $data['hobby']=implode(",",$data['hobby']);
        // print_r($hobby);die;
        $uid = $data['id'];         
        $this->load->model("Usermod");
        $res = $this->Usermod->update_by_id($uid,$data);
        redirect("Profile");
        
    }
    function edit_pass()
    {
        $this->load->view("user/change_pass");
    }

    function update_password()
    {
        $password = $this->input->post("password");
        $new_pass =  $this->input->post("new_pass");
        $conf_pass = $this->input->post("conf_pass");

       
      $this->load->model("Usermod");
      $resp = $this->Usermod->get_pass($password);
      $data = $resp->row_array();
    //   print_r($data);
    
    if(!empty($password && $new_pass && $conf_pass))
    {
        if($data['password'] == $password)
        {
             if($new_pass == $conf_pass)
             {
                 $pagedata = array("password"=>$new_pass);
                 $this->load->model("Usermod");
                 $this->Usermod->update_pass($this->session->userdata("uid"),$pagedata);
                 redirect("Profile/profile");
             }
             else
             {
                $this->session->set_flashdata("Msg","New & Confirm Password is not Matched");
                redirect("Profile/edit_pass");
             }
        }
        else
        {
            $this->session->set_flashdata("Msg","Current Password is not Correct");
            redirect("Profile/edit_pass");
        }
    }
    else{
        $this->session->set_flashdata("Msg","All Fields are Required");
        redirect("Profile/edit_pass");
    }
}

   function change_status()
   {
      $id = $this->input->get("id");
    //   print_r($id);
      $this->load->model("Usermod");
      $ans = $this->Usermod->change("$id");
      $answer = $ans->row_array();
    //   print_r($answer);
      if($answer['status']==1) 
      {
         $a = ['status'=>'0'];
         $this->load->model("Usermod");
         $this->Usermod->update_status($id,$a);
         redirect("Profile");
      }  
      else{
         $a = ['status'=>'1'];
         $this->load->model("Usermod");
         $this->Usermod->update_status($id,$a);
         redirect("Profile");
      }
      
   }
   
}



?>