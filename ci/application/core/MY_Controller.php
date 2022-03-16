<?php

class MY_Controller extends CI_Controller{

    function backdoor(){
        if(! $this->session->userdata("is_user_logged_in")){
            redirect("user/login");
        }
    }


    
}

?>