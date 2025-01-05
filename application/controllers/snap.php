<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-4pE8-vucMr0CSLmdupY4mTSr', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->database();
	}


	public function token()
	{
		$subscription_id_langganan = $this->input->post('id_langganan');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$harga = $this->input->post('harga');
		$durasi = $this->input->post('durasi');
		$namaPaket = $this->input->post('namaPaket');

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $harga,
			'quantity' => 1,
			'name' => "Paket $namaPaket"
		);

		// Optional
		// $item2_details = array(
		// 	'id' => 'a2',
		// 	'price' => 50000,
		// 	'quantity' => 1,
		// 	'name' => "Orange"
		// );

		// Optional
		$item_details = array($item1_details);

		// Optional
		$billing_address = array(
			'first_name'    => "Andri",
			'last_name'     => "Litani",
			'address'       => "Mangga 20",
			'city'          => "Jakarta",
			'postal_code'   => "16602",
			'phone'         => "081122334455",
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "Obet",
			'last_name'     => "Supriadi",
			'address'       => "Manggis 90",
			'city'          => "Jakarta",
			'postal_code'   => "16601",
			'phone'         => "08113366345",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $nama,
			// 'last_name'     => "Litani",
			'email'         => $email,
			'phone'         => "081122334455",
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$users_id_user = $this->input->post('id_user');
		$subscriptions_id_langganan = $this->input->post('id_langganan');
		$durasi = $this->input->post('durasi');
		$id_userSubscriptions = $this->session->userdata('id_userSubscriptions');
		$result = json_decode($this->input->post('result_data'), true);

		if ($result['status_code'] == '200') {
			$tanggal_mulai = date("Y-m-d H:i:s", strtotime($result['transaction_time']));
			$tanggal_selesai = date("Y-m-d H:i:s", strtotime("+$durasi months", strtotime($tanggal_mulai)));

			//update data userSubscription
			$dataUpdate = [
				"subscriptions_id_langganan" => $subscriptions_id_langganan,
				"status" => "aktif",
				"tanggal_mulai" => $tanggal_mulai,
				"tanggal_selesai" => $tanggal_selesai,
			];

			$this->db->where('id_userSubscriptions', $id_userSubscriptions);
			$this->db->update('user_subscriptions', $dataUpdate);

			//insert data pembayaran
			$data = [
				'users_id_user' => $users_id_user,
				'subscriptions_id_langganan' => $subscriptions_id_langganan,
				'order_id' => $result['order_id'],
				'gross_amount' => $result['gross_amount'],
				'transaction_time' => $result['transaction_time'],
				'status_code' => $result['status_code'],
				'payment_type' => $result['payment_type'],
				'bank' => $result['va_numbers'][0]['bank'],
				'va_number' => $result['va_numbers'][0]['va_number'],
			];

			$this->db->insert('pembayaran', $data);
		}

		redirect('elearning', 'refresh');
	}
}
