<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function getAllEmployee() {
        $this->db->select('emp.id AS id,emp.name as emp_name,emp.mobile_number,ud.designation_name,g.name as gender');
        $this->db->from('employee as emp');
        $this->db->join('user_designation as ud', 'emp.user_designation_id=ud.id', 'inner');
        $this->db->join('gender as g', 'emp.gender_id=g.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id) {
        $this->db->select('emp.id AS id,emp.name as emp_name,emp.mobile_number,ud.designation_name,g.name as gender,emp.gender_id,emp.user_designation_id');
        $this->db->from('employee as emp');
        $this->db->join('user_designation as ud', 'emp.user_designation_id=ud.id', 'inner');
        $this->db->join('gender as g', 'emp.gender_id=g.id', 'inner');
        $this->db->where('emp.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update($data) {
        $employee = array(
            'name' => $data['name'],
            'mobile_number' => $data['mobile_number'],
            'gender_id' => $data['gender_id'],
            'user_designation_id' => $data['user_designation_id'],
            'updated_by' => $this->session->userdata('userdata')->id,
            'updated_on' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $data['id']);
        $this->db->update('employee', $employee);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('employee');
        return $this->db->affected_rows();
    }

    public function insert($data) {
        $this->db->insert('employee', $data);
        return $this->db->affected_rows();
    }

    public function total_rows() {
        $data = $this->db->get('employee');
        return $data->num_rows();
    }

}
