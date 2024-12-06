<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Materi_model extends CI_Model
{
    public function get_all_materi()
    {
        $query = "
        SELECT
        materi.id_materi as id_materi,
        kursus.judul as kursus,
        materi.video_url,
        materi.kursus_id_kursus,
        materi.judul as judul,
        materi.konten as konten
        FROM
        materi
        join
        kursus
        on
        materi.kursus_id_kursus = id_kursus;
        ";

        return $this->db->query($query)->result();
    }

    public function getMateriByID($id_materi)
    {
        $query = "
        SELECT
        materi.id_materi as id_materi,
        kursus.judul as kursus,
        materi.video_url,
        materi.kursus_id_kursus,
        materi.judul as judul,
        materi.konten as konten
        FROM
        materi
        join
        kursus
        on
        materi.kursus_id_kursus = id_kursus
        where
        materi.id_materi = $id_materi;
        ";

        return $this->db->query($query)->row();
    }


    public function delete_materi($id_materi)
    {
        $this->db->where('id_materi', $id_materi);
        $this->db->delete('materi');
    }

    public function update_materi($id_materi, $data)
    {
        $this->db->where('id_materi', $id_materi);
        $this->db->update('materi', $data);
    }
}
