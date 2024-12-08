<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function prosesLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $sql = "select * from users where email = ?";
        $query = $this->db->query($sql, array($email));

        if (empty($email) || empty($password)) {
            $this->session->set_flashdata('pesanLogin', 'Email dan Password tidak boleh kosong.');
            redirect('auth/login', 'refresh');
        }

        if ($query->num_rows() > 0) {
            $data = $query->row();

            if ($data->password == $password) {
                $array = array(
                    'id_user' => $data->id_user,
                    'nama' => $data->nama,
                    'email' => $data->email,
                    'role' => $data->role,
                );
                $this->session->set_userdata($array);
                if ($data->role == 'admin') {
                    redirect('Dashboard', 'refresh');
                } else {
                    redirect('/', 'refresh');
                }
            } else {

                $this->session->set_flashdata('pesanLogin', 'Passwordnya salah nih. coba lagi ya!');
                redirect('auth/login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('pesanLogin', 'Emailnya belum terdaftar nih. Register dulu ya!');
            redirect('auth/login', 'refresh');
        }
    }

    public function login()
    {
        $this->load->view('login_view.php');
    }


    public function register()
    {
        $this->load->view('register_view.php');
    }

    public function prosesRegister()
    {

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = 'user';

        if (empty($email) || empty($password) || empty($nama)) {
            $this->session->set_flashdata('pesanRegister', 'Masukin data diri kamu dulu ya!');
            redirect('/auth/register', 'refresh');
        }


        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        );

        $sql = "select * from users where email = ?";
        $query = $this->db->query($sql, array($email));

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('pesanRegister', 'email sudah terdaftar');
            redirect('auth/register', 'refresh');
        } else {
            $sql = "insert into users (nama, email, password, role) values (?,?,?,?)";
            $this->db->query($sql, $data);
            $this->session->set_flashdata('pesanRegister', 'berhasil daftar');
            redirect('auth/register', 'refresh');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }
}
