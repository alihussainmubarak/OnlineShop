<?php

class Signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('signup_model');
    }

    public function index()
    {

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $data['title'] = 'Signup';

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/banner', $data);
            $this->load->view('signup/index', $data);
            $this->load->view('templates/footer');
        } else {
            $hash_password = sha1($this->input->post('password'));
            $this->signup_model->get_signup($hash_password);

            $this->session->set_flashdata('signed_up', 'Signed up success');
            redirect('login');
        }
    }

    public function profile()
    {

        $data['user'] = $this->signup_model->get_profile();

        $data['title'] = 'Profile';

        $this->load->view('templates/header');
        $this->load->view('templates/banner', $data);
        $this->load->view('signup/profile', $data);
        $this->load->view('templates/footer');
    }

    public function delete_user($id)
    {
        $this->signup_model->delete($id);
        redirect('login');
    }
}
