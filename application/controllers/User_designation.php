<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_designation extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_designation_model');
    }

    /* Landing Page */

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['designationData'] = $this->User_designation_model->getAllDesignations();
        $data['title'] = "Manage User Designation";
        $data['show_modal'] = show_modal('modals/modal_user_designation', 'user-designation', $data);
        $this->template->views('designation/home', $data);
    }

    /* Render Designation List */

    public function listData() {
        if ($this->input->is_ajax_request()) {
            $data['designationData'] = $this->User_designation_model->getAllDesignations();
            $this->load->view('designation/list_data', $data);
        } else
            exit('No direct script access allowed');
    }

    /* Create Designation */

    public function create() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('designation', 'designation', 'trim|required');
            $data = $this->input->post();
            if ($this->form_validation->run() == TRUE) {
                $result = $this->User_designation_model->insert($data);
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = success_message('Designation added successfully.', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = error_message('Something went wrong while adding designation.', '20px');
                }
            } else {
                $out['status'] = 'form';
                $out['msg'] = error_message(validation_errors());
            }
            echo json_encode($out);
        } else
            exit('No direct script access allowed');
    }

    /* Show Designation */

    public function updateView() {
        if ($this->input->is_ajax_request()) {
            $data['userdata'] = $this->userdata;
            $id = trim($this->input->post('id'));
            $data['designationData'] = $this->User_designation_model->getById($id);
            echo show_modal('modals/modal_update_designation', 'update-designation', $data);
        } else
            exit('No direct script access allowed');
    }

    /* Update Designation */

    public function update() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('designation', 'designation', 'trim|required');
            $data = $this->input->post();
            if ($this->form_validation->run() == TRUE) {
                $result = $this->User_designation_model->update($data);
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = success_message('Designation updated successfully. ', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = success_message('Something went wrong while updating designation.', '20px');
                }
            } else {
                $out['status'] = 'form';
                $out['msg'] = error_message(validation_errors());
            }
            echo json_encode($out);
        } else
            exit('No direct script access allowed');
    }

    /* Delete Designation */

    public function delete() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $validate = $this->User_designation_model->validateDesignationDelete($id);
            if ($validate > 0) {
                echo error_message('User designation can not be deleted as is already associated with employee.', '20px');
            } else {
                $result = $this->User_designation_model->delete($id);
                if ($result > 0) {
                    echo success_message('Designation deleted successfully.', '20px');
                } else {
                    echo error_message('Something went wrong while deleting designation.', '20px');
                }
            }
        } else
            exit('No direct script access allowed');
    }

}
