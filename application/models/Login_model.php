<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function get_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('user');
        return $query;
    }
}
