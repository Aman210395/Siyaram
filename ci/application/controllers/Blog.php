<?php

class Blog extends MY_Controller{

    function __construct()
    {
        parent :: __construct();
        // $this->load->library("session");
        // $this->load->helper("url");
        $this->load->model("blogmod");
        $this->backdoor();
    }
    function index(){

        $result = $this->blogmod->select_by_user_id($this->session->userdata("id"));

        $pagedata = array("pagename"=>"user/my_blog", "title"=>"My Blog", "result"=>$result);
        $this->load->view("user/layout", $pagedata);
    }


    


    function add(){
        $config["allowed_types"]="jpg|png|jpeg|gif";
        $config["max_size"]=2048;
        $config["upload_path"]="assets/blog_img/";
        $config["encrypt_name"]=true;

        $this->load->library("upload", $config);
        if($this->upload->do_upload()==true)
        {
            $arr = $this->input->post();
            $arr['image']=$this->upload->data("file_name");
            $arr['user_id']=$this->session->userdata("id");
            $this->blogmod->add($arr);
            redirect("blog");
        }
        else{
            $msg = $this->upload->display_errors();
            $this->session->set_flashdata("err", $msg);
            // die;
            redirect("blog");
        }
        



    }

    
}

?>
