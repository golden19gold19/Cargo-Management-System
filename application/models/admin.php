<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

	public function readData($table, $data) {
		$this->db->select();
		$this->db->from($table);
		$this->db->where($data);
		$data = $this->db->get();
		return $data->result();

	}

	public function deleteUser($table, $data) {
		$this->db->where($data);
		$this->db->delete($table);
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}

	}

	public function updateUser($table, $data, $id) {
		$this->db->where($id);
		$this->db->update($table, $data);
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}

	}

	public function insertItem($table, $data) {
		$this->db->insert($table, $data);
		if ($this->db->affected_rows()) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function updateItem($table, $data, $id) {
		$this->db->where($id);
		$this->db->update($table, $data);
		return true;

	}

	public function deleteItem($table, $data) {
		$this->db->where($data);
		$this->db->delete($table);
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}

	}

}; /* End of file admin.php */; /* Location: ./application/models/admin.php */
?>