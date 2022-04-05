<?php

class Ajax extends CI_Controller{

    function demo(){
        $this->load->model("blogmod");
        $result = $this->blogmod->select_all();
        $arr=array();
        foreach($result->result_array() as $data)
        {   
            $arr[]=$data;
        }
        echo json_encode($arr);

    }
}

?>