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
		$this->db->select_sum('jumlah');
		$this->db->select('date_format(tgl_masuk, "%M") as bulan');
		$this->db->from('tb_barang_masuk');
		$this->db->like('tgl_masuk', $tahun, 'after');
		$this->db->group_by('date_format(tgl_masuk, "%Y-%m")');
		$barang_masuk = $this->db->get()->result_array();
		$bulan_masuk = array();
		$jumlah_masuk = array();
		foreach ($barang_masuk as $key) {
			array_push($jumlah_masuk, $key['jumlah']);
			array_push($bulan_masuk, $key['bulan']);
		}
		$data['jumlah_masuk'] = json_encode($jumlah_masuk);
		$data['bulan_masuk'] = json_encode($bulan_masuk);

		$this->db->select_sum('jumlah');
		$this->db->select('date_format(tgl_keluar, "%M") as bulan');
		$this->db->from('tb_barang_keluar');
		$this->db->like('tgl_keluar', $tahun, 'after');
		$this->db->group_by('date_format(tgl_keluar, "%Y-%m")');
		$barang_keluar = $this->db->get()->result_array();
		$bulan_keluar = array();
		$jumlah_keluar = array();
		foreach ($barang_keluar as $key) {
			array_push($jumlah_keluar, $key['jumlah']);
			array_push($bulan_keluar, $key['bulan']);
		}
		$data['jumlah_keluar'] = json_encode($jumlah_keluar);
		$data['bulan_keluar'] = json_encode($bulan_keluar);
		$this->load->view('dashboard', $data);
	}
}
