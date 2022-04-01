<?php
class MY_Controller extends CI_Controller{

    function __construct()
    {
        parent :: __construct();
        $this->backdoor();
    }

    function backdoor(){
        if(! $this->session->userdata("is_logged_in")){
            redirect("home/login");
        }
    }
}

?>