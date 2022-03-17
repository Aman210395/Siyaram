<?php
class User extends CI_Controller{

    function __construct()
    {
        parent :: __construct();
        // $this->load->helper("url");
        // $this->load->library("session");
    }
   
    function index(){
        $this->load->model("blogmod");
        $result = $this->blogmod->select_all_join_user();

        $pagedata = array("pagename"=>"user/home", "title"=>"Home Page", "result"=>$result);
        $this->load->view("user/layout", $pagedata);
    }
    function about(){
        $pagedata = array("pagename"=>"user/about", "title"=>"About Page");
        $this->load->view("user/layout", $pagedata);
    }
    function contact(){
        $this->load->helper("date");
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

        $config["upload_path"]="assets/user_images/";
        $config["allowed_types"] = "jpg|jpeg|png|gif|bmp";
        $config["max_size"]=2048;

        $config['encrypt_name']=true;

        $this->load->library("upload", $config);

        if($this->upload->do_upload()==true)
        {
            // print_r($this->upload->data());
            // die;
            $arr = $this->input->post();
            unset($arr['re_pass']);
            $arr['password']=sha1($arr['password']);
            $arr['user_image']=$this->upload->data("file_name");

            $this->load->model("Usermod");
            $this->Usermod->add($arr);
            redirect("user");
        }
        else{
           $err = $this->upload->display_errors();
           $this->session->set_flashdata("err", $err);
           redirect("user/signup");
        }



        /*



        
        */
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
                $this->load->model("logintrackmod");
                $login_arr = array("user_id"=>$data['id']);

                $this->logintrackmod->add($login_arr);

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