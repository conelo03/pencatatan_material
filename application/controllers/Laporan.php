<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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

	public function barang_masuk()
	{
		$data['title']	= 'Laporan Barang Masuk';
		$data['barang_masuk']		= $this->M_barang_masuk->get_data()->result_array();
		$this->load->view('laporan/data_barang_masuk', $data);
	}

	public function barang_keluar()
	{
		$data['title']	= 'Laporan Barang Keluar';
		$data['barang_keluar']		= $this->M_barang_keluar->get_data()->result_array();
		$this->load->view('laporan/data_barang_keluar', $data);
	}

	public function maintenance()
	{
		$data['title']	= 'Laporan Maintenance Hardware';
		$data['maintenance_hardware']		= $this->M_maintenance->get_data()->result_array();
		$this->load->view('laporan/data_maintenance', $data);
	}

	public function cetak_barang_masuk()
	{
		$data['title']	= 'Cetak Barang Masuk';
		$data['barang_masuk']		= $this->M_barang_masuk->get_data()->result_array();
		$this->load->view('laporan/cetak_barang_masuk', $data);
	}

	public function cetak_barang_keluar()
	{
		$data['title']	= 'Cetak Barang Keluar';
		$data['barang_keluar']		= $this->M_barang_keluar->get_data()->result_array();
		$this->load->view('laporan/cetak_barang_keluar', $data);
	}

	public function cetak_maintenance()
	{
		$data['title']	= 'Cetak Maintenance Hardware';
		$data['maintenance_hardware']		= $this->M_maintenance->get_data()->result_array();
		$this->load->view('laporan/cetak_maintenance', $data);
	}
}
