<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$tahun = date('Y');
		$data['title']	= 'Dashboard';
		$item = $this->M_item->get_data()->result_array();
		$nama = array();
		$stok = array();
		foreach ($item as $key) {
			array_push($stok, $key['stok']);
			array_push($nama, $key['nama_item']);
		}
		$data['nama'] = json_encode($nama);
		$data['stok'] = json_encode($stok);
		$this->load->view('dashboard', $data);
	}
}
