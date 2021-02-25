<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    /* Landing Page */

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['title'] = "Profile Setting";
        $this->template->views('profile', $data);
    }

    /* Update User Profile */

    public function update() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
        $id = $this->userdata->id;
        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|png';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('profileimage')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data_profile = $this->upload->data();
                $data['profileimage'] = $data_profile['file_name'];
            }
            $result = $this->User_model->update($data, $id);
            if ($result > 0) {
                $this->updateUserProfile();
                $this->session->set_flashdata('msg', success_message('Profile updated successfully.'));
                redirect('User_profile');
            } else {
                $this->session->set_flashdata('msg', error_message('Something went wrong while updating profile.'));
                redirect('User_profile');
            }
        } else {
            $this->session->set_flashdata('msg', error_message(validation_errors()));
            redirect('User_profile');
        }
    }

    /* Update User Password */

    public function update_password() {
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        $id = $this->userdata->id;
        if ($this->form_validation->run() == TRUE) {
            if (md5($this->input->post('old_password')) == $this->userdata->password) {
                if ($this->input->post('new_password') != $this->input->post('confirm_password')) {
                    $this->session->set_flashdata('msg', error_message('New Password and Confirm Password must be same.'));
                    redirect('User_profile');
                } else {
                    $data = ['password' => md5($this->input->post('new_password'))];
                    $result = $this->User_model->update($data, $id);
                    if ($result > 0) {
                        $this->updateUserProfile();
                        $this->session->set_flashdata('msg', success_message('Password updated successfully'));
                        redirect('User_profile');
                    } else {
                        $this->session->set_flashdata('msg', error_message('Password failed to change'));
                        redirect('User_profile');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', error_message('Wrong Password'));
                redirect('User_profile');
            }
        } else {
            $this->session->set_flashdata('msg', error_message(validation_errors()));
            redirect('User_profile');
        }
    }

}
