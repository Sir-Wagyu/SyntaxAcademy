<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscription_model extends CI_Model
{
    public function getAllSubscription()
    {
        $query = $this->db->get('subscriptions');
        return $query->result();
    }

    public function getSubscriptionById($id)
    {
        $query = $this->db->get_where('subscriptions', array('id_langganan' => $id));
        return $query->row();
    }
}
