<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permintaan_barang extends CI_Model {

	public $table	= 'tb_permintaan_barang';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_item', 'tb_item.id_item=tb_permintaan_barang.id_item');
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_permintaan_barang.id_pegawai');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_permintaan_barang)
	{
		return $this->db->get_where($this->table, ['id_permintaan_barang' => $id_permintaan_barang])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_permintaan_barang', $data['id_permintaan_barang']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_permintaan_barang)
	{
		$this->db->delete($this->table, ['id_permintaan_barang' => $id_permintaan_barang]);
	}
}
