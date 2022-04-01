<?php
class Student extends MY_Controller {

    function __construct()
    {
        parent :: __construct();
        $this->load->model("Studentmodal");
        $this->load->model("Citymodal");
        
    }


        

	function index()
	{
        $result=$this->Studentmodal->get_all();
        $pagedata = array(
            "pagename" => "student/list",
            "title" => "Student List",
            "result"=>$result
        );
        $this->load->view("layout", $pagedata);
	}

    function delete($id){
        $this->Studentmodal->delete($id);
        redirect('student');
    }


	function add()
	{
        $result_city = $this->Citymodal->get_all();

        if($this->input->post("submit")){
            $data = $this->input->post();
            unset($data['submit']);
            $this->Studentmodal->save($data);
            redirect("student/");
        }

      $pagedata = array(
            "pagename" => "student/add",
            "title" => "Student Add Page",
            "result_city"=>$result_city
        );
        $this->load->view("layout", $pagedata);
	}
	function update($id)
	{
        $result = $this->Studentmodal->get_by_id($id);

        if($this->input->post("submit")){
            $data = $this->input->post();
            unset($data['submit']);
            $this->Studentmodal->update($id, $data);
            redirect("student/");
        }


        $result = $result->row_array();

        $result_city = $this->Citymodal->get_all();
        $pagedata = array(
            "pagename" => "student/update",
            "title" => "Student Update", 
            "result"=>$result,
            "result_city"=>$result_city
        );
        $this->load->view("layout", $pagedata);
	}
    
}
