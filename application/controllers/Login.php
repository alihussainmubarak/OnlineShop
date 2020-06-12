<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $data['title'] = 'Login';

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/banner', $data);
            $this->load->view('login/index', $data);
            $this->load->view('templates/footer');
        } else {

            $username = $this->input->post('username');
            $password = sha1($this->input->post('password'));

            $query = $this->login_model->get_login($username, $password);

            if ($query->num_rows() > 0) {
                $data  = $query->row_array();
                $id = $data['id'];
                $name = $data['name'];
                $email = $data['email'];
                $username = $data['username'];
                $date = $data['date'];

                $session_data = array(
                    'user_id'  => $id,
                    'name' => $name,
                    'email' => $email,
                    'username'     => $username,
                    'date' => $date,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                $this->session->set_flashdata('success_login', 'Success login');
                redirect('shop');
                
            } else {
                $this->session->set_flashdata('invalid_login', 'Invalid login');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('logout', 'Logged out');
        redirect('login');
    }
}
