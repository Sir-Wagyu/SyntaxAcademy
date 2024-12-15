<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['users'] = $this->user_model->getAllUsers();
        $data['konten'] = $this->load->view('admin_view/usersTable_view', $data, true);
        $this->load->view('admin_view/admin_view', $data);
    }
}
