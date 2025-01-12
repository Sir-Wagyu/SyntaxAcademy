<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // minor bug -> status subscription tidak realtime -> buatin method model user buat ngeselect tb user + statusnya si tb user_subscription 
    public function prosesLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validasi input kosong
        if (empty($email) || empty($password)) {
            $this->session->set_flashdata('pesanLogin', 'Email dan Password tidak boleh kosong.');
            redirect('auth/login', 'refresh');
        }

        // Query untuk mengambil data user berdasarkan email
        $sql = "SELECT * FROM users WHERE email = ?";
        $query = $this->db->query($sql, array($email));

        if ($query->num_rows() > 0) {
            $data = $query->row();

            // Cek password
            if ($data->password == $password) { // **Password cocok langsung dibandingkan**

                // Query untuk mengambil data subscription user
                $sqlSubscription = "SELECT id_userSubscriptions, status, tanggal_selesai FROM user_subscriptions WHERE users_id_user = ?";
                $querySubscription = $this->db->query($sqlSubscription, array($data->id_user));

                if ($querySubscription->num_rows() > 0) {
                    $subscriptionData = $querySubscription->row();

                    // Cek apakah subscription sudah expired
                    $current_date = date('Y-m-d');
                    if ($subscriptionData->tanggal_selesai < $current_date && $subscriptionData->status == 'aktif') {
                        // Update status ke expired
                        $this->db->set('status', 'expired');
                        $this->db->where('id_userSubscriptions', $subscriptionData->id_userSubscriptions);
                        $this->db->update('user_subscriptions');

                        // Update data status subscription
                        $subscriptionData->status = 'expired';
                    }

                    // Set session data
                    $array = array(
                        'id_user' => $data->id_user,
                        'id_userSubscriptions' => $subscriptionData->id_userSubscriptions,
                        'nama' => $data->nama,
                        'email' => $data->email,
                        'role' => $data->role,
                        'status' => $subscriptionData->status, // Status diperbarui (expired/aktif)
                        'foto_profile' => $data->foto_profile
                    );
                    $this->session->set_userdata($array);

                    // Redirect berdasarkan role
                    if ($data->role == 'admin') {
                        redirect('Dashboard', 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                } else {
                    // Jika user tidak memiliki subscription
                    $this->session->set_flashdata('pesanLogin', 'Kamu belum memiliki subscription aktif. Silakan berlangganan.');
                    redirect('auth/login', 'refresh');
                }
            } else {
                // Password salah
                $this->session->set_flashdata('pesanLogin', 'Passwordnya salah nih. Coba lagi ya!');
                redirect('auth/login', 'refresh');
            }
        } else {
            // Email tidak terdaftar
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
        $nama_belakang = $this->input->post('nama_belakang');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = 'user';

        if (empty($email) || empty($password) || empty($nama) || empty($nama_belakang)) {
            $this->session->set_flashdata('pesanRegister', 'Masukin data diri kamu dulu ya!');
            redirect('/auth/register', 'refresh');
        }


        $data = array(
            'nama' => $nama,
            'nama_belakang' => $nama_belakang,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        );

        $sql = "select * from users where email = ?";
        $query = $this->db->query($sql, array($email));

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('pesanRegister', 'email sudah terdaftar');
            redirect('auth/register', 'refresh');
        } else {
            $sql = "insert into users (nama,nama_belakang, email, password, role, created_at) values (?,?,?,?,?,?)";
            $this->db->query($sql, $data);


            $userId = $this->db->insert_id();
            $subscriptionData = array(
                'users_id_user' => $userId,
                'status' => 'free',
                'tanggal_selesai' => null,
                'tanggal_mulai' => null,
            );
            $sqlSubscription = "insert into  user_subscriptions (users_id_user, status, tanggal_selesai, tanggal_mulai) values (?,?,?,?)";
            $this->db->query($sqlSubscription, $subscriptionData);


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
