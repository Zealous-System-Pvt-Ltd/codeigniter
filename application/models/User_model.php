<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function update($data, $id) {
        $this->db->where("id", $id);
        $this->db->update("user", $data);
        return $this->db->affected_rows();
    }

    public function select($id = '') {
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        $data = $this->db->get('user');
        return $data->row();
    }

}
