<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kursus_model extends CI_Model
{
    public function get_all_kursus()
    {
        $query = $this->db->get('kursus');
        return $query->result();
    }
}
