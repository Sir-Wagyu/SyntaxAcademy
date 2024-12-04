<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->load->model('kursus_model');
        $this->validasi->validasi_admin();
    }

    function index()
    {
        $data['kursus'] = $this->kursus_model->get_all_kursus();
        $data['form'] = $this->load->view('admin_view/materiForm_view', $data, true);
        $data['tabel'] = $this->load->view('admin_view/materiTabel_view', '', true);
        $this->load->view('admin_view/admin_view', $data);
    }

    function simpanMateri()
    {
        $judul = $this->input->post('judul_materi');
        $video_url = $this->input->post('video_url');
        $konten = $this->input->post('konten');

        $data = array(
            'judul_materi' => $judul,
            'video_url' => $video_url,
            'konten' => $konten,
        );

        $this->db->insert('materi', $data);
        $this->session->set_flashdata('notification', 'Data Materi telah tersimpan');
        redirect('materi', 'refresh');
    }
}
