<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('User_designation_model');
    }

    /* Landing Page */

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['employeeData'] = $this->Employee_model->getAllEmployee();
        $data['designationData'] = $this->User_designation_model->getAllDesignations();
        $data['title'] = "Manage Employee";
        $data['add_employee_modal'] = show_modal('modals/add_employee_modal', 'add-employee', $data);
        $this->template->views('employee/home', $data);
    }

    /* Render Employee List */

    public function employeeList() {
        if ($this->input->is_ajax_request()) {
            $data['employeeData'] = $this->Employee_model->getAllEmployee();
            $this->load->view('employee/list_data', $data);
        } else
            exit('No direct script access allowed');
    }

    /* Create Employee */

    public function create() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|max_length[10]');
            $this->form_validation->set_rules('gender_id', 'Gender', 'trim|required');
            $this->form_validation->set_rules('user_designation_id', 'Designation', 'trim|required');
            $data = $this->input->post();
            if ($this->form_validation->run() == TRUE) {
                $data['created_by'] = $this->session->userdata('userdata')->id;
                $result = $this->Employee_model->insert($data);
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = success_message('Employee added successfully.', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = error_message('Something went wrong while adding Employee.', '20px');
                }
            } else {
                $out['status'] = 'form';
                $out['msg'] = error_message(validation_errors());
            }
            echo json_encode($out);
        } else
            exit('No direct script access allowed');
    }

    /* Show Employee */

    public function updateView() {
        if ($this->input->is_ajax_request()) {
            $id = trim($this->input->post('id'));
            $data['employeeData'] = $this->Employee_model->getById($id);
            $data['designationData'] = $this->User_designation_model->getAllDesignations();
            $data['userdata'] = $this->userdata;
            echo show_modal('modals/modal_update_employee', 'update-employee', $data);
        } else
            exit('No direct script access allowed');
    }

    /* Update Employee */

    public function update() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|max_length[10]');
            $this->form_validation->set_rules('gender_id', 'Gender', 'trim|required');
            $this->form_validation->set_rules('user_designation_id', 'Designation', 'trim|required');
            $data = $this->input->post();
            if ($this->form_validation->run() == TRUE) {
                $result = $this->Employee_model->update($data);
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = success_message('Employee updated successfully.', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = success_message('Something went wrong while updating Employee.', '20px');
                }
            } else {
                $out['status'] = 'form';
                $out['msg'] = error_message(validation_errors());
            }
            echo json_encode($out);
        } else
            exit('No direct script access allowed');
    }

    /* Delete Employee */

    public function delete() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $result = $this->Employee_model->delete($id);
            if ($result > 0) {
                echo success_message('Employee deleted successfully.', '20px');
            } else {
                echo error_message('Something went wrong while deleting employee.', '20px');
            }
        } else
            exit('No direct script access allowed');
    }

}
