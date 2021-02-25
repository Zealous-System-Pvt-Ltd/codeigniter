<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_designation_model extends CI_Model {

    public function getAllDesignations() {
        $data = $this->db->get('user_designation');
        return $data->result();
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('user_designation');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert($data) {
        $user_designation_data = array('designation_name' => $data['designation'], 'created_by' => $this->session->userdata('userdata')->id);
        $this->db->insert('user_designation', $user_designation_data);
        return $this->db->insert_id();
    }

    public function update($data) {
        $designation = array(
            'designation_name' => $data['designation'],
            'updated_by' => $this->session->userdata('userdata')->id,
            'updated_on' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $data['id']);
        $this->db->update('user_designation', $designation);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_designation');
        return $this->db->affected_rows();
    }

    public function total_rows() {
        $data = $this->db->get('user_designation');
        return $data->num_rows();
    }

    public function validateDesignationDelete($user_designation_id) {
        $this->db->where('user_designation_id', $user_designation_id);
        $query = $this->db->get('employee');
        return $query->num_rows();
    }

}
