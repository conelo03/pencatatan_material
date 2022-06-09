<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	// Data Item

	public function index()
	{
    $data['title']		= 'Maintenance Hardware';
		$data['maintenance_hardware']		= $this->M_maintenance->get_data()->result_array();
		$this->load->view('maintenance_hardware/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Maintenance Hardware';
			$this->load->view('maintenance_hardware/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_item'			=> $data['id_item'],
				'kode_item'			=> $data['kode_item'],
				'tanggal'			=> date('Y-m-d H:i:s'),
				'keterangan'			=> $data['keterangan'],
				'id_pegawai'			=> $this->session->userdata('id_pegawai'),
			];
			if ($this->M_maintenance->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-maintenance-hardware');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('maintenance-hardware');
			}
		}
	}

	public function edit($id_maintenance)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Maintenance Hardware';
			$data['bm']	= $this->M_maintenance->get_by_id($id_maintenance);
			$data['item']	= $this->M_item->get_by_id($data['bm']['id_item']);
			$this->load->view('maintenance_hardware/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_maintenance'			=> $id_maintenance,
				'keterangan'			=> $data['keterangan'],
			];
			
			if ($this->M_maintenance->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-maintenance-hardware/'.$id_maintenance);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('maintenance-hardware');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('kode_item', 'Kode Item', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
		
	}

	public function hapus($id_maintenance)
	{
		$this->M_maintenance->delete($id_maintenance);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('maintenance-hardware');
	}

	public function repair($id_maintenance)
	{
		$data = [
			'tanggal_repair' => date('Y-m-d H:i:s'),
			'status' => 1,
		];
		$this->db->where('id_maintenance', $id_maintenance);
		$this->db->update('tb_maintenance', $data);
		$this->session->set_flashdata('msg', 'edit');
		redirect('maintenance-hardware');
	}

	public function barcode($kode_item)
	{
		$data['title']		= 'Data Item';
		$data['kode_item']	= $kode_item;
		$this->load->view('item/barcode', $data);
	}

	public function barcode_generator($kode_item)
	{
		$this->load->library('zend');

		$this->zend->load('Zend/Barcode');
		 
		Zend_Barcode::render('code128', 'image', array('text'=>$kode_item), array());
	}

}
