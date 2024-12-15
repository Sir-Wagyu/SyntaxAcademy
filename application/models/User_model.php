<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
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
}
