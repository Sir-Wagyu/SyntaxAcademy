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
        $data['user'] = $this->user_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['konten'] = $this->load->view('userProfile/userProfile_view', $data, true);
        $this->load->view('userProfile/profile_view', $data);
    }

    public function ganti_password()
    {
        $data['user'] = $this->user_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['konten'] = $this->load->view('userProfile/gantiPassword_view', $data, true);
        $this->load->view('userProfile/profile_view', $data);
    }

    public function riwayat_transaksi()
    {
        $user = $this->session->userdata();
        $data['user'] = $this->user_model->getAllUserStatusById($user['id_user']);
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

        $config['upload_path'] = './uploads/profile_pictures/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = "profile_" . $user['id_user'];
        $this->load->library('upload', $config);

        $data = [
            'nama' => $this->input->post('nama'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'email' => $this->input->post('email'),
            'nomor_whatsapp' => $this->input->post('nomor_whatsapp'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        ];

        if (!empty($_FILES['foto_profil']['name'])) {
            $oldPhoto = $this->user_model->getUserPhoto($user['id_user']);
            if (!empty($oldPhoto->foto_profile)) {
                $oldPhotoPath = './uploads/profile_pictures/' . $oldPhoto->foto_profile;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            if ($this->upload->do_upload('foto_profil')) {
                $uploadData = $this->upload->data();
                $data['foto_profile'] = $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('notification', 'Gagal mengunggah foto profil.');
                redirect('profile');
            }
        }

        $this->user_model->updateUser($user['id_user'], $data);
        $this->session->set_flashdata('notification', 'Perubahan anda berhasil disimpan.');
        redirect('profile');
    }

    public function deleteFotoProfile()
    {
        $user = $this->session->userdata();
        $oldPhoto = $this->user_model->getUserPhoto($user['id_user']);
        $oldPhotoPath = './uploads/profile_pictures/' . $oldPhoto->foto_profile;
        if (file_exists($oldPhotoPath)) {
            unlink($oldPhotoPath);
        }
        $data = [
            'foto_profile' => null
        ];
        $this->user_model->updateUser($user['id_user'], $data);
        $this->session->set_flashdata('notification', 'Foto profil berhasil dihapus.');
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
