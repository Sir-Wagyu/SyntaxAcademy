<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->load->model('kursus_model');
        $this->load->model('materi_model');
        $this->validasi->validasi_admin();
    }
    public function index()
    {
        $data['konten'] = $this->load->view('admin_view/dashboard', '', true);
        $this->load->view('admin_view/admin_view', $data);
    }

    // ganti pake ini kalo mau routingnya lebih rapi
    // public function kursus()
    // {
    //     $data['form'] = $this->load->view('admin_view/kursusForm_view', '', true);
    //     $data['kursus'] = $this->kursus_model->get_all_kursus();

    //     $data['tabel'] = $this->load->view('admin_view/kursusTabel_view', $data, true);
    //     $this->load->view('admin_view/admin_view', $data);
    // }

    // public function materi()
    // {
    //     $data['materi'] = $this->materi_model->get_all_materi();
    //     $data['kursus'] = $this->kursus_model->get_all_kursus();
    //     $data['form'] = $this->load->view('admin_view/materiForm_view', $data, true);
    //     $data['tabel'] = $this->load->view('admin_view/materiTabel_view', '', true);

    //     $this->load->view('admin_view/admin_view', $data);
    // }
}
