<?php

class Ajax extends CI_Controller {

    function __Construct()
    {
        parent::__construct();
        $this->load->model('ajaxmod');
        $this->backdoor();
    }

    function index()
    {
        $pagedata = array("pagename" => "ajax/signup");
        $this->load->view("layout", $pagedata);
    }

    function backdoor()
    {
        if (!$this->session->userdata('is_admin_logged_in')) {
            redirect('user');
        }
    }

    function save()
    {
        $config['upload_path'] = 'assets/student_images/';
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['max_size'] = 2048;

        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload() == true) {

            $data = $this->input->post();
            $data['student_image'] = $this->upload->data('file_name');
            $data['created_date'] = date('Y-m-d H:i:s');
            $this->ajaxmod->save($data);
            // redirect("user/login");
        } else {

            $arr = $this->upload->display_errors();
            print_r($arr);
        }
    }
}

?>