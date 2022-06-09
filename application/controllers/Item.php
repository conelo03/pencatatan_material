<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

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

	// Stock Gudang

	public function index()
	{
        $data['title']		= 'Stock Gudang';
		$data['item']		= $this->M_item->get_data()->result_array();
		$this->load->view('item/data', $data);
	}

	public function stock()
	{
        $data['title']		= 'Stock Gudang';
		$data['item']		= $this->M_item->get_data()->result_array();
		$this->load->view('item/stock', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Stock Gudang';
			$data['kategori']	= $this->M_kategori->get_data()->result_array();
			$this->load->view('item/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'kode_item'			=> $data['kode_item'],
				'nama_item'			=> $data['nama_item'],
				'id_kategori'			=> $data['id_kategori'],
				'lokasi'			=> $data['lokasi'],
				'stok'			=> $data['stok'],
			];
			if ($this->M_item->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-item');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('item');
			}
		}
	}

	public function edit($id_item)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Stock Gudang';
			$data['item']	= $this->M_item->get_by_id($id_item);
			$data['kategori']	= $this->M_kategori->get_data()->result_array();
			$this->load->view('item/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_item'		=> $id_item,
				'kode_item'			=> $data['kode_item'],
				'nama_item'			=> $data['nama_item'],
				'id_kategori'			=> $data['id_kategori'],
				'lokasi'			=> $data['lokasi'],
				'stok'			=> $data['stok'],
			];
			
			if ($this->M_item->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-item/'.$id_item);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('item');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('kode_item', 'Kode Item', 'required|trim');
		$this->form_validation->set_rules('nama_item', 'Nama Item', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('lokasi', 'Lokasi Item', 'required|trim');
		
	}

	public function hapus($id_item)
	{
		$this->M_item->delete($id_item);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('item');
	}

	public function barcode($kode_item)
	{
		$data['title']		= 'Stock Gudang';
		$data['kode_item']	= $kode_item;
		$this->load->view('item/barcode', $data);
	}

	public function barcode_stock($kode_item)
	{
		$data['title']		= 'Stock Gudang';
		$data['kode_item']	= $kode_item;
		$this->load->view('item/barcode_stock', $data);
	}

	public function barcode_generator($kode_item)
	{
		$this->load->library('zend');

		$this->zend->load('Zend/Barcode');
		 
		Zend_Barcode::render('code128', 'image', array('text'=>$kode_item), array());
	}

	// Barang Masuk

	public function barang_masuk()
	{
        $data['title']		= 'Barang Masuk';
		$data['barang_masuk']		= $this->M_barang_masuk->get_data()->result_array();
		$this->load->view('barang_masuk/data', $data);
	}

	public function tambah_barang_masuk()
	{
		$this->validation_barang_masuk();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Barang Masuk';
			$this->load->view('barang_masuk/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_item'			=> $data['id_item'],
				'kode_item'			=> $data['kode_item'],
				'tgl_masuk'			=> date('Y-m-d H:i:s'),
				'jumlah'			=> $data['jumlah'],
				'keterangan'			=> $data['keterangan'],
				'id_pegawai'			=> $this->session->userdata('id_pegawai'),
			];
			if ($this->M_barang_masuk->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-barang-masuk');
			} else {
				$item	= $this->M_item->get_by_id($data['id_item']);
				$data_item	= [
					'id_item'		=> $item['id_item'],
					'stok'			=> $item['stok'] + $data['jumlah'],
				];
				$this->M_item->update($data_item);
				$this->session->set_flashdata('msg', 'success');
				redirect('barang-masuk');
			}
		}
	}

	public function edit_barang_masuk($id_barang_masuk)
	{
		$this->validation_barang_masuk();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Barang Masuk';
			$data['bm'] = $this->M_barang_masuk->get_by_id($id_barang_masuk);
			$data['item']	= $this->M_item->get_by_id($data['bm']['id_item']);
			$data['kat']	= $this->M_kategori->get_by_id($data['item']['id_kategori']);
			$this->load->view('barang_masuk/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$jumlah_old = $data['jumlah_old'];
			$item	= $this->M_item->get_by_id($data['id_item']);
			$data_user	= [
				'id_barang_masuk'			=> $id_barang_masuk,
				'jumlah'			=> $data['jumlah'],
				'keterangan'			=> $data['keterangan'],
			];
			if ($this->M_barang_masuk->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-barang-masuk/'.$id_barang_masuk);
			} else {
				$data_item	= [
					'id_item'		=> $item['id_item'],
					'stok'			=> $item['stok'] - $jumlah_old + $data['jumlah'],
				];
				$this->M_item->update($data_item);
				$this->session->set_flashdata('msg', 'success');
				redirect('barang-masuk');
			}
		}
	}

	public function detail_barang_masuk($id_barang_masuk)
	{
		$data['title']		= 'Barang Masuk';
		$data['bm'] = $this->M_barang_masuk->get_by_id($id_barang_masuk);
		$data['item']	= $this->M_item->get_by_id($data['bm']['id_item']);
		$data['kat']	= $this->M_kategori->get_by_id($data['item']['id_kategori']);
		$data['pegawai']   = $this->M_pegawai->get_by_id($data['bm']['id_pegawai']);
		$this->load->view('barang_masuk/detail', $data);
	}

	public function hapus_barang_masuk($id_barang_masuk, $id_item)
	{
		$bm = $this->M_barang_masuk->get_by_id($id_barang_masuk);
		$item	= $this->M_item->get_by_id($id_item);
		$data_item	= [
			'id_item'		=> $item['id_item'],
			'stok'			=> $item['stok'] - $bm['jumlah'],
		];
		$this->M_item->update($data_item);
		$this->M_barang_masuk->delete($id_barang_masuk);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang-masuk');
	}

	public function approve_barang_masuk($id_barang_masuk, $id_item)
	{
		$bm = $this->M_barang_masuk->get_by_id($id_barang_masuk);
		$item	= $this->M_item->get_by_id($id_item);
		$data_item	= [
			'id_item'		=> $item['id_item'],
			'stok'			=> $item['stok'] + $bm['jumlah'],
		];
		$this->M_item->update($data_item);
		$data_item	= [
			'id_barang_masuk'		=> $id_barang_masuk,
			'approval'			=> 1,
		];
		$this->M_barang_masuk->update($data_item);
		$this->session->set_flashdata('msg', 'approve');
		redirect('barang-masuk');
	}

	// Barang Keluar

	public function barang_keluar()
	{
        $data['title']		= 'Barang Keluar';
		$data['barang_keluar']		= $this->M_barang_keluar->get_data()->result_array();
		$this->load->view('barang_keluar/data', $data);
	}

	public function tambah_barang_keluar()
	{
		$this->validation_barang_keluar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Barang Keluar';
			$this->load->view('barang_keluar/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_item'			=> $data['id_item'],
				'kode_item'			=> $data['kode_item'],
				'tgl_keluar'			=> date('Y-m-d H:i:s'),
				'jumlah'			=> $data['jumlah'],
				'keterangan'			=> $data['keterangan'],
				'penerima'			=> $data['penerima'],
				'id_pegawai'			=> $this->session->userdata('id_pegawai'),
			];
			$item	= $this->M_item->get_by_id($data['id_item']);
			if($item['stok'] < $data['jumlah']){
				$this->session->set_flashdata('msg', 'error-stock');
				redirect('barang-keluar');
			}	

			if ($this->M_barang_keluar->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-barang-keluar');
			} else {
				$data_item	= [
					'id_item'		=> $item['id_item'],
					'stok'			=> $item['stok'] - $data['jumlah'],
				];
				$this->M_item->update($data_item);
				$this->session->set_flashdata('msg', 'success');
				redirect('barang-keluar');
			}
		}
	}

	public function edit_barang_keluar($id_barang_keluar)
	{
		$this->validation_barang_keluar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Barang Keluar';
			$data['bm'] = $this->M_barang_keluar->get_by_id($id_barang_keluar);
			$data['item']	= $this->M_item->get_by_id($data['bm']['id_item']);
			$data['kat']	= $this->M_kategori->get_by_id($data['item']['id_kategori']);
			$this->load->view('barang_keluar/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$jumlah_old = $data['jumlah_old'];
			$item	= $this->M_item->get_by_id($data['id_item']);
			$data_user	= [
				'id_barang_keluar'			=> $id_barang_keluar,
				'jumlah'			=> $data['jumlah'],
				'keterangan'			=> $data['keterangan'],
			];

			if(($item['stok'] + $jumlah_old) < $data['jumlah']){
				$this->session->set_flashdata('msg', 'error-stock');
				redirect('barang-keluar');
			}	

			if ($this->M_barang_keluar->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-barang-keluar/'.$id_barang_keluar);
			} else {
				$data_item	= [
					'id_item'		=> $item['id_item'],
					'stok'			=> $item['stok'] + $jumlah_old - $data['jumlah'],
				];
				$this->M_item->update($data_item);
				$this->session->set_flashdata('msg', 'success');
				redirect('barang-keluar');
			}
		}
	}

	public function detail_barang_keluar($id_barang_keluar)
	{
		$data['title']		= 'Barang Keluar';
		$data['bm'] = $this->M_barang_keluar->get_by_id($id_barang_keluar);
		$data['item']	= $this->M_item->get_by_id($data['bm']['id_item']);
		$data['kat']	= $this->M_kategori->get_by_id($data['item']['id_kategori']);
		$data['pegawai']   = $this->M_pegawai->get_by_id($data['bm']['id_pegawai']);
		$this->load->view('barang_keluar/detail', $data);
	}

	public function hapus_barang_keluar($id_barang_keluar, $id_item)
	{
		$bk = $this->M_barang_keluar->get_by_id($id_barang_keluar);
		$item	= $this->M_item->get_by_id($id_item);
		$data_item	= [
			'id_item'		=> $item['id_item'],
			'stok'			=> $item['stok'] + $bk['jumlah'],
		];
		$this->M_item->update($data_item);
		$this->M_barang_keluar->delete($id_barang_keluar);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang-keluar');
	}

	public function approve_barang_keluar($id_barang_keluar, $id_item)
	{
		$bk = $this->M_barang_keluar->get_by_id($id_barang_keluar);
		$item	= $this->M_item->get_by_id($id_item);
		$data_item	= [
			'id_item'		=> $item['id_item'],
			'stok'			=> $item['stok'] - $bk['jumlah'],
		];
		$this->M_item->update($data_item);
		$data_item	= [
			'id_barang_keluar'		=> $id_barang_keluar,
			'approval'			=> 1,
		];
		$this->M_barang_keluar->update($data_item);
		$this->session->set_flashdata('msg', 'approve');
		redirect('barang-keluar');
	}

	public function search_item_by_kode()
	{
        $kode = $this->input->post('kode');
        $cek_kode = $this->db->get_where('tb_item', ['kode_item' => $kode]);

        $res = false;
        $data = [];
        if($cek_kode->num_rows() > 0){
        	$res = true;
        	$item = $cek_kode->row_array();
        	$kategori = $this->db->get_where('tb_kategori', ['id_kategori' => $item['id_kategori']])->row_array();
        	$data = [
        		'id_item' => $item['id_item'],
        		'nama_item' => $item['nama_item'],
        		'kategori' => $kategori['nama_kategori'],
        		'stok' => $item['stok']
        	];
        }
        $response = [
        	'response'	=> $res,
        	'kode'	=> $kode,
        	'data'	=> $data

        ]; 
        echo json_encode($response);
	}

	private function validation_barang_masuk()
	{
		$this->form_validation->set_rules('kode_item', 'Kode Item', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
		
	}

	private function validation_barang_keluar()
	{
		$this->form_validation->set_rules('kode_item', 'Kode Item', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required|trim');
		
	}

}
