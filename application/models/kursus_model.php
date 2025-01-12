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

    public function countMateri()
    {
        $this->db->select('k.id_kursus, k.judul, k.image_url, k.level, COUNT(m.id_materi) AS jumlah_materi');
        $this->db->from('kursus k');
        $this->db->join('materi m', 'k.id_kursus = m.kursus_id_kursus', 'left');
        $this->db->group_by('k.id_kursus, k.judul');
        $query = $this->db->get();
        return $query->result();
    }

    public function listMateri($id_kursus)
    {
        $this->db->select('m.id_materi, m.judul, m.video_url, m.konten');
        $this->db->from('materi m');
        $this->db->where('m.kursus_id_kursus', $id_kursus);
        $query = $this->db->get();
        return $query->result();
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

    public function getMateriById($id_materi)
    {
        $this->db->select('id_materi, judul, video_url, konten');
        $this->db->from('materi');
        $this->db->where('id_materi', $id_materi);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_kursus_by_level($levels)
    {
        $this->db->select('k.id_kursus, k.judul, k.image_url, k.level, COUNT(m.id_materi) AS jumlah_materi');
        $this->db->from('kursus k');
        $this->db->join('materi m', 'k.id_kursus = m.kursus_id_kursus', 'left');

        // Tambahkan filter level jika ada
        if (!empty($levels)) {
            $levelsArray = explode(',', $levels); // Jika level dalam bentuk string, pisahkan dengan koma
            $this->db->where_in('k.level', $levelsArray);
        }

        // Group by untuk menghindari duplikasi data
        $this->db->group_by('k.id_kursus, k.judul, k.image_url, k.level');

        $query = $this->db->get();
        return $query->result();
    }

    public function search_kursus($keyword)
    {
        $this->db->select('k.id_kursus, k.judul, k.image_url, k.level, COUNT(m.id_materi) AS jumlah_materi');
        $this->db->from('kursus k');
        $this->db->join('materi m', 'k.id_kursus = m.kursus_id_kursus', 'left');

        if (!empty($keyword)) {
            $this->db->like('k.judul', $keyword);
        }

        $this->db->group_by('k.id_kursus, k.judul, k.image_url, k.level');

        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalKursusAndMateri()
    {
        $query = "
        select 
        count(k.id_kursus) as total_kursus,
        count(m.id_materi) as total_materi
        from kursus k
        left join materi m
        on id_kursus = kursus_id_kursus;";

        return $this->db->query($query)->row();
    }
}
