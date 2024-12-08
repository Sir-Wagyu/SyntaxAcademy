<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function index()
    {
        $data['konten'] = $this->load->view('main_view/contact_view', '', true);
        $this->load->view('main_view/main_view', $data);
    }
}
