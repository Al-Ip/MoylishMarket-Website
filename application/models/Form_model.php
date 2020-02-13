<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function record_count()
	{
		return $this->db->count_all('users');
	}

	function get_all_users()
	{
		$this->db->select("id, email, password, first_name, last_name, admin");
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result();
	}

	public function login($data) {
		$condition = "email =" . "'" . $data['email']
			. "' AND " . "password =" . "'" . $data['password']
			. "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	// Read data from database to show data in admin page
	public function read_user_information($email) {

		$condition = "email =" . "'" . $email . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function auth_check($data)
	{
		$query = $this->db->get_where('users', $data);
		if($query){
			return $query->row();
		}
		return false;
	}
	public function insert_user($data)
	{
		$insert = $this->db->insert('users', $data);
		if ($insert) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function getAdmin($admin)
	{
		$this->db->where('admin',$admin);
		$query = $this->db->get('users');
		if($query->num_rows == 1)
		{
			return $query->row();
		}
		return false;
	}
}
