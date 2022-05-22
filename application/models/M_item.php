<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_item extends CI_Model {

	public $table	= 'tb_item';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_item)
	{
		return $this->db->get_where($this->table, ['id_item' => $id_item])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_item', $data['id_item']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_item)
	{
		$this->db->delete($this->table, ['id_item' => $id_item]);
	}
}
