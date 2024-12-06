<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kursus_model extends CI_Model
{
    public function get_all_kursus()
    {
        $query = $this->db->get('kursus');
        return $query->result();
    }

    public function getKursusById($id_kursus)
    {
        $query = $this->db->get_where('kursus', array('id_kursus' => $id_kursus));
        return $query->row();
    }

    public function delete_kursus($id_kursus)
    {
        $this->db->where('kursus_id_kursus', $id_kursus);
        $this->db->delete('materi');

        // Hapus data di tabel kursus
        $this->db->where('id_kursus', $id_kursus);
        $this->db->delete('kursus');
    }

    public function update_kursus($id_kursus, $data)
    {
        $this->db->where('id_kursus', $id_kursus);
        $this->db->update('kursus', $data);
    }
}
