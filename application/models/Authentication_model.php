<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_model extends CI_Model {

    public function login($username, $password) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $data = $this->db->get();
        return ($data->num_rows() == 1) ? $data->row() : FALSE;
    }

}
