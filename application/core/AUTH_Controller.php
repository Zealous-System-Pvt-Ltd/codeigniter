<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->userdata = $this->session->userdata('userdata');
        $this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));
        if ($this->session->userdata('validate') == '') {
            redirect('Authentication');
        }
    }

    public function updateUserProfile() {
        if ($this->userdata != '') {
            $data = $this->User_model->select($this->userdata->id);
            $this->session->set_userdata('userdata', $data);
            $this->userdata = $this->session->userdata('userdata');
        }
    }

}

/* Location: ./application/core/AUTH_Controller.php */