<?php

class Signup_model extends CI_Model
{
    public function get_signup($hash_password)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $hash_password
        );

        $this->db->insert('user', $data);
    }

    public function get_profile()
    {
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
