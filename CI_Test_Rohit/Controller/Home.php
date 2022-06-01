<?php
class Home extends CI_Controller{

    function __construct()
    {
        parent :: __construct();
        $this->load->model("Usermod");

    }
    
    function index()
    {
        $pagedata = array("pagename"=>"user/home", "title"=>"Home Page");
        $this->load->view("user/layout",$pagedata);

    }
    function about()
    {
        $pagedata = array("pagename"=>"user/about", "title"=>"About Page");
        $this->load->view("user/layout", $pagedata);
    }
    function contact()
    {
        $pagedata = array("pagename"=>"user/contact", "title"=>"Contact Page");
        $this->load->view("user/layout", $pagedata);
    }
    function Signup()
    {
        $pagedata = array("pagename"=>"user/signup", "title"=>"Signup Page");
        $this->load->view("user/layout", $pagedata);
    }
    function Login()
    {
        $pagedata = array("pagename"=>"user/login", "title"=>"Login Page");
        $this->load->view("user/layout", $pagedata);
    }
    function save()
        {
            $config['upload_path'] = 'assets/user_images/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 2048;
    
            $config['encrypt_name'] = true;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload() == true) {
    
                $data = $this->input->post();
                unset($data['re_pass']);
                $data['password']=sha1($data['password']);
                $data['hobby'] = implode(",", $data['hobby']);
                $data['user_image'] = $this->upload->data('file_name');
                $this->Usermod->add($data);
                redirect("user/login");
            } else {
    
                $arr = $this->upload->display_errors();
                // print_r($arr);
            }



            


        }
      function auth()
      {
          $e = $this->input->post("email");
          $p = $this->input->post("password");
        //   print_r(array($e,$p));
        //   die;
        // $this->load->model("Usermod");
       $result = $this->Usermod->select_by_email($e);
       if($result->num_rows()==1)
       {
           $data = $result->row_array();
           if($data['password']==sha1($p))
           {
               $this->session->set_userdata("id",$data['id']);
               $this->session->set_userdata("fullname",$data['fullname']);
               $this->session->set_userdata('is_user_logged_in',true);
               redirect("Profile");
           }
           else
           {
            $this->session->set_flashdata("Msg","This Password is Incorrect");
            redirect("Home/login");
           }
       }
       else
       {
           $this->session->set_flashdata("Msg","This Username & Password is Incorrect");
           redirect("Home/login");
       }       
      }
}

?>