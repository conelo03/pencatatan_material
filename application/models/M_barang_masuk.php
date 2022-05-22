<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang_masuk extends CI_Model {

	public $table	= 'tb_barang_masuk';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_item', 'tb_item.id_item=tb_barang_masuk.id_item');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_barang_masuk)
	{
		return $this->db->get_where($this->table, ['id_barang_masuk' => $id_barang_masuk])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_barang_masuk', $data['id_barang_masuk']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_barang_masuk)
	{
		$this->db->delete($this->table, ['id_barang_masuk' => $id_barang_masuk]);
	}
}
