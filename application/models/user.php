<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function userAuth($data) {
		$this->db->select();
		$this->db->from('users');
		$this->db->where($data);
		$this->db->limit(1);
		$data = $this->db->get();
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function readUserData($data) {
		$this->db->select();
		$this->db->from('users');
		$this->db->where($data);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();

	}

	public function insertUser($table, $data) {
		$this->db->insert($table, $data);
		if ($this->db->affected_rows()) {
			return $this->db->insert_id();
		} else {
			return false;
		}

	}

}; /* End of file user.php */; /* Location: ./application/models/user.php */?>