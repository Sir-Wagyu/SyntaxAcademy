<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {
        $data['user'] = $this->User_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['konten'] = $this->load->view('main_view/contact_view', '', true);
        $this->load->view('main_view/main_view', $data);
    }
}
