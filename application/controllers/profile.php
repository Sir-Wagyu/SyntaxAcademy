<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['konten'] = $this->load->view('userProfile/userProfile_view', '', true);
        $this->load->view('userProfile/profile_view', $data);
    }

    public function ganti_password()
    {
        $data['konten'] = $this->load->view('userProfile/gantiPassword_view', '', true);
        $this->load->view('userProfile/profile_view', $data);
    }

    public function riwayat_transaksi()
    {
        $data['konten'] = $this->load->view('userProfile/riwayatTransaksi_view', '', true);
        $this->load->view('userProfile/profile_view', $data);
    }
}
