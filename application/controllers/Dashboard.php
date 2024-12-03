<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->validasi->validasi_admin();
    }
    public function index()
    {
        $data['konten'] = $this->load->view('admin_view/dashboard', '', true);
        $this->load->view('admin_view/admin_view', $data);
    }

    public function kursus()
    {
        $data['form'] = $this->load->view('admin_view/kursusForm_view', '', true);
        $data['tabel'] = $this->load->view('admin_view/kursusTabel_view', '', true);
        $this->load->view('admin_view/admin_view', $data);
    }
}
