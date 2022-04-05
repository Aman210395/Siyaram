<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{

    function __construct()
    {
        parent :: __construct();
        $this->load->helper('captcha');
        $this->load->helper("url");
        $this->load->library("session");
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
    function new_signup(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("fullname", "Full Name", "required");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_rules("re_pass", "Re-Password", "required|matches[password]");

        if($this->form_validation->run()==false)
        {
            $pagedata = array("pagename"=>"user/new_signup", "title"=>"DEMO");
            $this->load->view("user/layout", $pagedata);
        }else{
            echo "yes";
        }


        
    }
    function contact(){
        $this->load->helper("date");
        $pagedata = array("pagename"=>"user/contact", "title"=>"Contact Page");
        $this->load->view("user/layout", $pagedata);
    }


    function my_captcha(){
        
        
        $vals = array(
            
            'img_path'      => './assets/cap_img/',
            'img_url'       => base_url('assets/cap_img'),
            
            'img_width'     => 200,
            'img_height'    => 100,
            
            'word_length'   => 6,
            
            'colors'        => array(
                'background' => array(171, 194, 177),
                'border' => array(10, 51, 11),
                'text' => array(0, 0, 0),
                'grid' => array(216, 201, 201)
            )
            );
    
        $cap = create_captcha($vals);
        echo $cap['word'];
        // echo "****************************";
        

        //echo $this->session->userdata("mystr");
        // die;
        //echo $cap['image'];die;
      
        $pagedata = array("pagename"=>"user/my_captcha", "title"=>"Contact Page", "cap"=>$cap);
        $this->load->view("user/layout", $pagedata);
    }

    function demo(){
        print_r($this->session->all_userdata());
    }

    function my_submit(){
        
        
        $x = $this->input->post("captcha_txt");
        $y = $this->input->post("captcha_str");
        if($x == $y){
            echo "yes";
        }else{
            $this->session->set_flashdata("captcha_err", "The CAPTCHA is incorrect");
            redirect("user/my_captcha");
        }
    }



    function signup(){
        $vals = array(
            
            'img_path'      => './assets/cap_img/',
            'img_url'       => base_url('assets/cap_img'),
            
            'img_width'     => 200,
            'img_height'    => 100,
            
            'word_length'   => 6,
            
            'colors'        => array(
                'background' => array(171, 194, 177),
                'border' => array(10, 51, 11),
                'text' => array(0, 0, 0),
                'grid' => array(216, 201, 201)
            )
            );
    
        $cap = create_captcha($vals);
        $this->session->unset_userdata("abc");
        $this->session->set_userdata("abc", $cap['word']);
        $pagedata = array("pagename"=>"user/signup", "title"=>"Signup Page", "cap"=>$cap);
        $this->load->view("user/layout", $pagedata);
    }
    function login(){
        
        $pagedata = array("pagename"=>"user/login", "title"=>"Login Page");
        $this->load->view("user/layout", $pagedata);
    }

    function save(){

        print_r($this->input->post());
        print_r($this->session->all_userdata());
        die;








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