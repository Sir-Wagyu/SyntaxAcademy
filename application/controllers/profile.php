<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validasi');
        $this->load->model('user_model');
        $this->validasi->validasi_user();
    }

    public function index()
    {
        $user = $this->session->userdata();
        $data['user'] = $this->user_model->getUserById($user['id_user']);
        $data['konten'] = $this->load->view('userProfile/userProfile_view', $data, true);
        $this->load->view('userProfile/profile_view', $data);
    }

    public function ganti_password()
    {
        $data['konten'] = $this->load->view('userProfile/gantiPassword_view', '', true);
        $this->load->view('userProfile/profile_view', $data);
    }

    public function riwayat_transaksi()
    {
        $user = $this->session->userdata();
        $data['transaksi'] = $this->user_model->getTransactionByUserId($user['id_user']);
        $data['konten'] = $this->load->view('userProfile/riwayatTransaksi_view', $data, true);
        $this->load->view('userProfile/profile_view', $data);
    }

    public function detail_transaksi($id_transaksi)
    {
        $data['transaksi'] = $this->user_model->getTransactionById($id_transaksi);
        $this->load->view('userProfile/detailInvoice_view', $data);
    }

    public function editProfile()
    {
        $user = $this->session->userdata();
        $data = [
            'nama' => $this->input->post('nama'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'email' => $this->input->post('email'),
            'nomor_whatsapp' => $this->input->post('nomor_whatsapp'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        ];
        $this->user_model->updateUser($user['id_user'], $data);
        $this->session->set_flashdata('notification', 'Perubahan anda berhasil disimpan.');
        redirect('profile');
    }

    public function gantiPassword()
    {
        $user = $this->session->userdata();
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $userProfile = $this->user_model->getUserById($user['id_user']);

        if ($password_lama != $userProfile->password) {
            $this->session->set_flashdata('notification', 'Password lama yang anda masukkan salah.');
            redirect('profile/ganti_password');
        } else {
            $data = [
                'password' => $password_baru
            ];
            $this->user_model->updateUser($user['id_user'], $data);
            $this->session->set_flashdata('notification', 'Password baru anda telah tersimpan.');
            redirect('profile/ganti_password');
        }
        redirect('profile/ganti_password');
    }

    public function DownloadInvoice($id_transaksi) {}
}
