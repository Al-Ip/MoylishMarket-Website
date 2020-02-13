<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//
	//Customer Table
	//
	function record_count()
	{
		return $this->db->count_all('customers');
	}

	function get_all_cust($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$this->db->select("customerNumber, customerName, contactLastName, 
		contactFirstName, phone, addressLine1, addressLine2, city, postalCode,
		country, creditLimit, email, password");
		$this->db->from('customers');
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteCustomer($id)
	{
		$this->db->where('customerNumber', $id);
		return $this->db->delete('customers');
	}

	function updateCustomer($cust,$id)
	{
		$this->db->where('customerNumber', $id);
		return $this->db->update('customers', $cust);
	}

	public function drilldown($id)
	{
		$this->db->select("customerNumber, customerName, contactLastName, 
		contactFirstName, phone, addressLine1, addressLine2, city, postalCode,
		country, creditLimit, email, password");
		$this->db->from('customers');
		$this->db->where('customerNumber',$id);
		$query = $this->db->get();
		return $query->result();
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//
	//Orders Details Table
	//
	function get_all_ord()
	{
		$this->db->select("orderNumber, orderDate, requiredDate, 
		shippedDate, status, comments, customerNumber");
		$this->db->from('orders');
		$query = $this->db->get();
		return $query->result();
	}

	public function drilldownOrd($id)
	{
		$this->db->select("orderNumber, orderDate, requiredDate, 
		shippedDate, status, comments, customerNumber");
		$this->db->from('orders');
		$this->db->where('customerNumber',$id);
		$query = $this->db->get();
		return $query->result();
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
