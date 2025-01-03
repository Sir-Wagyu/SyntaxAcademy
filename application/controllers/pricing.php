<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pricing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subscription_model');
        $this->load->model('user_model');
    }
    public function index()
    {
        $data['user'] = $this->user_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['subscriptions'] = $this->subscription_model->getAllSubscription();
        $data['konten'] = $this->load->view('main_view/pricing_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }

    public function checkout($id)
    {
        $data['user'] = $this->user_model->getAllUserStatusById($this->session->userdata('id_user'));
        $data['subscription'] = $this->subscription_model->getSubscriptionById($id);
        $data['konten'] = $this->load->view('main_view/detailPricing_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }
}
