<?php
class Validasi extends CI_Model
{
    public function validasi_admin()
    {
        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            echo '<script>alert("Anda tidak berhak mengakses halaman ini")</script>';
            redirect('/', 'refresh');
        }
    }

    public function validasi_user()
    {
        $role = $this->session->userdata('role');
        if ($role != 'user') {
            echo '<script>alert("Anda tidak berhak mengakses halaman ini")</script>';
            redirect('/', 'refresh');
        }
    }
}
