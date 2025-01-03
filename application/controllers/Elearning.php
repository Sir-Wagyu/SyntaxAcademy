<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Elearning extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kursus_model');
        $this->load->model('User_model');
    }
    public function index()
    {
        $data['user'] = $this->User_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['kursus'] = $this->Kursus_model->get_all_kursus();
        $data['kursus'] = $this->Kursus_model->countMateri();
        $data['konten'] = $this->load->view('main_view/elearning_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->User_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['kursus'] = $this->Kursus_model->getKursusById($id);
        $data['listMateri'] = $this->Kursus_model->listMateri($id);
        $data['firstMateri'] = !empty($data['listMateri']) ? $data['listMateri'][0] : null;
        $data['konten'] = $this->load->view('main_view/detailElearning_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }


    public function detail_materi($kursus_id, $materi_id)
    {
        $data['user'] = $this->User_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['kursus'] = $this->Kursus_model->getKursusById($kursus_id);
        $data['materi'] = $this->Kursus_model->getMateriById($materi_id);
        $data['listMateri'] = $this->Kursus_model->listMateri($kursus_id);
        $data['konten'] = $this->load->view('main_view/materi_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }
}
