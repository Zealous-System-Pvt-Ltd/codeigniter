<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Authentication_model');
    }

    /* Landing Page */

    public function index() {
        $session = $this->session->userdata('validate');
        if ($session == '') {
            $this->load->view('login');
        } else {
            redirect('User_designation');
        }
    }

    /* User Login Attempt */

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $data = $this->Authentication_model->login($username, $password);
            if ($data == false) {
                $this->session->set_flashdata('error_msg', 'Username and/or Password is not valid.');
                redirect('Authentication');
            } else {
                $session = [
                    'userdata' => $data,
                    'validate' => TRUE
                ];
                $this->session->set_userdata($session);
                redirect('User_designation');
            }
        } else {
            $this->session->set_flashdata('error_msg', validation_errors());
            redirect('Authentication');
        }
    }

    /* User Logout */

    public function logout() {
        $this->session->sess_destroy();
        redirect('Authentication');
    }

}
