<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pricing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subscription_model');
    }
    public function index()
    {
        $data['subscriptions'] = $this->subscription_model->getAllSubscription();
        $data['konten'] = $this->load->view('main_view/pricing_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }

    public function checkout($id)
    {
        $data['subscription'] = $this->subscription_model->getSubscriptionById($id);
        $data['konten'] = $this->load->view('main_view/detailPricing_view', $data, true);
        $this->load->view('main_view/main_view', $data);
    }
}
