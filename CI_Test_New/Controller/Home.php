<?php
class Home extends CI_Controller{

    function index()
    {
            $this->load->view("user/signup");
    }
           

    function save()
    {

        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|exact_length[8]');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('hobby[]', 'hobby', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('user/signup');
        }
        else
        {
            $data = $this->input->post();
            $data['hobby'] = implode(",",$data['hobby']);
            $this->load->model("Usermod");
            $this->Usermod->add($data);
            redirect("Home/login");
        }             
    }
    function login()
    {
        $this->load->view("user/login");
    }
    function auth()
    {
      $e = $this->input->post('email');
      $p = $this->input->post('password');

      if(!empty($e && $p))
    {
        $this->load->model("Usermod");
        $data = $this->Usermod->select_by_email($e);

        if($data->num_rows()==1)
        {
            $result = $data->row_array();
            // print_r($result);die;
            if($result['password']==$p && $result['role']=="Admin")
            {
                $this->session->set_userdata("aid",$result['id']);
                $this->session->set_userdata("name",$result['fullname']);
                $this->session->set_userdata("is_admin_logged_in",true);
                redirect("Profile");
            }
            elseif($result['password']==$p && $result['role']=="User")
            {
                if($result['status']==1)
                {
                $this->session->set_userdata("uid",$result['id']);
                $this->session->set_userdata("name",$result['fullname']);
                $this->session->set_userdata("is_user_logged_in",true);
                redirect("Profile/profile");
                }
                else
                {
                    $this->session->set_flashdata("Msg","You are Disabled!Contact to Our Team");
                    redirect("Home/login");
                }
            }
            else
            {
                $this->session->set_flashdata("Msg","This Password is Incorrect");
                redirect("Home/login");
            }
        }
        else
        {
            $this->session->set_flashdata("Msg","This Email doesn't Exsist");
            redirect("Home/login");
        }
    }
    else
      {
          $this->session->set_flashdata("Msg","All Fields are Required");
          redirect("Home/login");
      }
   }
}


?>


