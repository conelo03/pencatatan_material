<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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

	public function index()
	{
        $data['title']		= 'Data Pegawai';
		$data['pegawai']		= $this->M_pegawai->get_data()->result_array();
		$this->load->view('pegawai/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pegawai';
			$this->load->view('pegawai/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$foto = $this->upload_foto();
			$data_user	= [
				'nama'			=> $data['nama'],
				'username'		=> $data['username'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				'nip'			=> $data['nip'],
				'jabatan'			=> $data['jabatan'],
				'tempat_lahir'			=> $data['tempat_lahir'],
				'tanggal_lahir'			=> $data['tanggal_lahir'],
				'jenis_kelamin'			=> $data['jenis_kelamin'],
				'foto'			=> $foto,
				'akses'			=> $data['akses'],
			];
			if ($this->M_pegawai->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-pegawai');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pegawai');
			}
		}
	}

	public function edit($id_pegawai)
	{
		$this->validation($id_pegawai);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pegawai';
			$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai);
			$this->load->view('pegawai/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if (empty($_FILES['foto']['name'])) {
				$foto = $data['foto_old'];
			}else{
				$foto = $this->upload_foto();
			}
			if(!empty($data['password'])){
				$data_user	= [
					'id_pegawai'		=> $id_pegawai,
					'nama'			=> $data['nama'],
					'username'		=> $data['username'],
					'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
					'nip'			=> $data['nip'],
					'jabatan'			=> $data['jabatan'],
					'tempat_lahir'			=> $data['tempat_lahir'],
					'tanggal_lahir'			=> $data['tanggal_lahir'],
					'jenis_kelamin'			=> $data['jenis_kelamin'],
					'foto'			=> $foto,
					'akses'			=> $data['akses'],
				];
			} else {
				$data_user	= [
					'id_pegawai'		=> $id_pegawai,
					'nama'			=> $data['nama'],
					'username'		=> $data['username'],
					'nip'			=> $data['nip'],
					'jabatan'			=> $data['jabatan'],
					'tempat_lahir'			=> $data['tempat_lahir'],
					'tanggal_lahir'			=> $data['tanggal_lahir'],
					'jenis_kelamin'			=> $data['jenis_kelamin'],
					'foto'			=> $foto,
					'akses'			=> $data['akses'],
				];
			}
			
			if ($this->M_pegawai->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pegawai/'.$id_pegawai);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pegawai');
			}
		}
	}

	private function validation($id_pegawai = null)
	{
		if(is_null($id_pegawai)){
			$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric|is_unique[tb_pegawai.username]', ['is_unique'	=> 'Username Sudah Terdaftar']);
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|required');
			$this->form_validation->set_rules('akses', 'Akses', 'required');
		} else {
			$username_baru 	= $this->input->post('username');
			$data			= $this->db->get_where('tb_pegawai', ['id_pegawai' => $id_pegawai])->row_array();
			$username 		= $data['username'];

			if($username == $username_baru){
				$this->form_validation->set_rules('username', 'Username', 'required|trim');
			} else {
				$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_pegawai.username]', array('is_unique' => 'Username sudah terdaftar' ));
			}
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
			$this->form_validation->set_rules('akses', 'Akses', 'required');
		}
		
	}

	public function hapus($id_pegawai)
	{
		$this->M_pegawai->delete($id_pegawai);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pegawai');
	}

	private function upload_foto()
	{
	    $config['upload_path'] = './assets/img/profile';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size'] = 10000;
	    $this->upload->initialize($config);
	    $this->load->library('upload', $config);

	    if(! $this->upload->do_upload('foto'))
	    {
	    	return '';
	    }

	    return $this->upload->data('file_name');
	}

	public function profile()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');
		$data['title']		= 'Profil Pribadi';
		$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai);
		$this->load->view('pegawai/profile', $data);
	}

	public function setting()
	{
		$this->validation_setting();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Profil Pribadi';
			$id_pegawai 		= $this->session->userdata('id_pegawai');
			$data['pegawai']	= $this->M_pegawai->get_by_id($id_pegawai);
			$this->load->view('pegawai/setting', $data);
		} else {
			$id_pegawai 		= $this->session->userdata('id_pegawai');
			$data	= $this->input->post(null, true);
			if (empty($_FILES['foto']['name'])) {
				$foto = $data['foto_old'];
			}else{
				$foto = $this->upload_foto();
			}
			if(!empty($data['password'])){
				$data_user	= [
					'id_pegawai'		=> $id_pegawai,
					'nip'			=> $data['nip'],
					'nama'			=> $data['nama'],
					'username'		=> $data['username'],
					'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
					'jabatan'			=> $data['jabatan'],
					'tempat_lahir'			=> $data['tempat_lahir'],
					'tanggal_lahir'			=> $data['tanggal_lahir'],
					'jenis_kelamin'			=> $data['jenis_kelamin'],
					'foto'			=> $foto,
				];
			} else {
				$data_user	= [
					'id_pegawai'		=> $id_pegawai,
					'nip'			=> $data['nip'],
					'nama'			=> $data['nama'],
					'username'		=> $data['username'],
					'jabatan'			=> $data['jabatan'],
					'tempat_lahir'			=> $data['tempat_lahir'],
					'tanggal_lahir'			=> $data['tanggal_lahir'],
					'jenis_kelamin'			=> $data['jenis_kelamin'],
					'foto'			=> $foto,
				];
			}
			
			if ($this->M_pegawai->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('setting');
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('setting');
			}
		}
	}

	private function validation_setting()
	{
		$username		= $this->session->userdata('username');
		$username_baru 	= $this->input->post('username');
		if($username == $username_baru){
			$this->form_validation->set_rules('username', 'Username', 'required');	
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_pegawai.username]', ['is_unique'	=> 'Username Sudah Ada']);
		}
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
	}
}
