<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang_keluar extends CI_Model {

	public $table	= 'tb_barang_keluar';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_item', 'tb_item.id_item=tb_barang_keluar.id_item');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_barang_keluar)
	{
		return $this->db->get_where($this->table, ['id_barang_keluar' => $id_barang_keluar])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_barang_keluar', $data['id_barang_keluar']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_barang_keluar)
	{
		$this->db->delete($this->table, ['id_barang_keluar' => $id_barang_keluar]);
	}
}
