<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_maintenance extends CI_Model {

	public $table	= 'tb_maintenance';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_item', 'tb_item.id_item=tb_maintenance.id_item');
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_maintenance.id_pegawai');
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_maintenance)
	{
		return $this->db->get_where($this->table, ['id_maintenance' => $id_maintenance])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_maintenance', $data['id_maintenance']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_maintenance)
	{
		$this->db->delete($this->table, ['id_maintenance' => $id_maintenance]);
	}
}
