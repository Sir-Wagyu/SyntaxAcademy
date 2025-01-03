<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $id_userLogin = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getAllUserStatusById($id_userLogin);
        $data['konten'] = $this->load->view('main_view/home_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }
}
