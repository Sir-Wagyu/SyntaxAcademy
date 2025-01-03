<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAllUserStatusById($id)
    {
        $query = "
            SELECT 
                u.id_user,
                u.nama,
                u.nama_belakang,
                u.email,
                u.nomor_whatsapp,
                u.tanggal_lahir,
                u.jenis_kelamin, 
                u.foto_profile,
                u.role,
                us.tanggal_mulai,
                us.tanggal_selesai,
                us.status
            FROM users u
            JOIN user_subscriptions us
            ON u.id_user = us.users_id_user
            where u.id_user = ?;
        ";

        return $this->db->query($query, $id)->row();
    }
    public function getAllUsers()
    {
        $query = "
            SELECT 
            u.id_user,
            u.nama,
            u.email,
            u.role,
            us.tanggal_mulai,
            us.tanggal_selesai,
            us.status
            FROM users u
            JOIN user_subscriptions us
            ON u.id_user = us.users_id_user;
        ";

        return $this->db->query($query)->result();
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id_user = ?";

        return $this->db->query($query, $id)->row();
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('users', $data);
    }

    public function getUserPhoto($id)
    {
        $query = "SELECT foto_profile FROM users WHERE id_user = ?";

        return $this->db->query($query, $id)->row();
    }

    public function getTransactionByUserId($id)
    {
        $query = "
            SELECT 
                p.order_id, 
                p.users_id_user, 
                s.namaPaket, 
                p.status_code, 
                p.gross_amount, 
                p.transaction_time, 
                p.payment_type, 
                p.bank, 
                p.va_number, 
                p.pdf_url 
            FROM 
                pembayaran p 
            JOIN 
                subscriptions s 
            ON 
                p.subscriptions_id_langganan = s.id_langganan
            where
                p.users_id_user = ?;
        ";

        return $this->db->query($query, $id)->result();
    }


    public function getTransactionById($id)
    {
        $query = "
            SELECT 
                p.order_id, 
                p.users_id_user, 
                s.namaPaket, 
                p.status_code, 
                p.gross_amount, 
                p.transaction_time, 
                p.payment_type, 
                p.bank, 
                p.va_number, 
                p.pdf_url 
            FROM 
                pembayaran p 
            JOIN 
                subscriptions s 
            ON 
                p.subscriptions_id_langganan = s.id_langganan
            where
                p.order_id = ?;
        ";

        return $this->db->query($query, $id)->row();
    }
}
