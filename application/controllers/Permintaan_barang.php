<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_barang extends CI_Controller {

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
    $data['title']		= 'Permintaan Barang';
		$data['permintaan_barang']		= $this->M_permintaan_barang->get_data()->result_array();
		$this->load->view('permintaan_barang/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Permintaan Barang';
			$this->load->view('permintaan_barang/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_item'			=> $data['id_item'],
				'kode_item'			=> $data['kode_item'],
				'tanggal'			=> date('Y-m-d H:i:s'),
				'jumlah'			=> $data['jumlah'],
				'keterangan'			=> $data['keterangan'],
				'id_pegawai'			=> $this->session->userdata('id_pegawai'),
			];
			if ($this->M_permintaan_barang->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-permintaan-barang');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('permintaan-barang');
			}
		}
	}

	public function edit($id_permintaan_barang)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Permintaan Barang';
			$data['pb']	= $this->M_permintaan_barang->get_by_id($id_permintaan_barang);
			$data['item']	= $this->M_item->get_by_id($data['pb']['id_item']);
			$this->load->view('permintaan_barang/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_permintaan_barang'			=> $id_permintaan_barang,
				'jumlah'			=> $data['jumlah'],
				'keterangan'			=> $data['keterangan'],
			];
			
			if ($this->M_permintaan_barang->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-permintaan-barang/'.$id_permintaan_barang);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('permintaan-barang');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('kode_item', 'Kode Item', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
		
	}

	public function hapus($id_permintaan_barang)
	{
		$this->M_permintaan_barang->delete($id_permintaan_barang);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('permintaan-barang');
	}

	public function verifikasi($id_permintaan_barang)
	{
		$this->db->where('id_permintaan_barang', $id_permintaan_barang);
		$this->db->update('tb_permintaan_barang', ['status' => 1]);
		$this->session->set_flashdata('msg', 'edit');
		redirect('permintaan-barang');
	}

	public function barcode_generator($kode_item)
	{
		$this->load->library('zend');

		$this->zend->load('Zend/Barcode');
		 
		Zend_Barcode::render('code128', 'image', array('text'=>$kode_item), array());
	}

}
