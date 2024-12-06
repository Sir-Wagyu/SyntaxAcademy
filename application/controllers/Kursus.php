<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kursus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->load->model('kursus_model');
        $this->load->model('materi_model');
        $this->validasi->validasi_admin();
    }

    function index()
    {
        $data['form'] = $this->load->view('admin_view/kursusForm_view', '', true);
        $data['kursus'] = $this->kursus_model->get_all_kursus();

        $data['tabel'] = $this->load->view('admin_view/kursusTabel_view', $data, true);
        $this->load->view('admin_view/admin_view', $data);
    }

    function simpanKursus()
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

        $this->db->insert('kursus', $data);
        $this->session->set_flashdata('notification', 'Data Kursus telah tersimpan');
        redirect('kursus', 'refresh');
    }

    function hapusKursus($id_kursus)
    {
        // debugging
        // echo "ID Kursus yang akan dihapus: $id_kursus";
        // exit;

        $this->kursus_model->delete_kursus($id_kursus);
        $this->session->set_flashdata('notification', 'Data Kursus telah terhapus');
        redirect('kursus', 'refresh');
    }

    function updateKursus($id_kursus) {}
}
