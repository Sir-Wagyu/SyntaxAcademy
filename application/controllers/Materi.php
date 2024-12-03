<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->validasi->validasi_admin();
    }

    function index()
    {
        $data['form'] = $this->load->view('admin_view/materiForm_view', '', true);
        $data['tabel'] = $this->load->view('admin_view/materiTabel_view', '', true);
        $this->load->view('admin_view/admin_view', $data);
    }

    function simpanMateri()
    {
        $judul = $this->input->post('judul');
        $image_url = $this->input->post('image_url');
        $level = $this->input->post('level');
        $description = $this->input->post('deskripsi');

        $data = array(
            'image_url' => $image_url,
            'judul' => $judul,
            'description' => $description,
            'level' => $level,
        );

        $this->db->insert('materi', $data);
        $this->session->set_flashdata('notification', 'Data Materi telah tersimpan');
        redirect('Dashboard/materi', 'refresh');
    }

    function readMateri()
    {
        $data['materi'] = $this->db->get_all_materi();
        $this->load->view('admin_view/materi_view', $data);
    }
}
