<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//
	//Orders Table
	//
	function record_count()
	{
		return $this->db->count_all('orders');
	}

	function get_all_orders($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$this->db->select("orderNumber, orderDate, requiredDate, 
		shippedDate, status, comments, customerNumber");
		$this->db->from('orders');
		$query = $this->db->get();
		return $query->result();
	}

	public function drilldown($id)
	{
		$this->db->select("orderNumber, orderDate, requiredDate, 
		shippedDate, status, comments, customerNumber");
		$this->db->from('orders');
		$this->db->where('orderNumber',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteOrder($id)
	{
		$this->db->where('orderNumber', $id);
		return $this->db->delete('orders');
	}

	function updateOrder($order,$id)
	{
		$this->db->where('orderNumber', $id);
		return $this->db->update('orders', $order);
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//
	//Orders Details Table
	//
	function orderDCount()
	{
		return $this->db->count_all('orderdetails');
	}

	function get_all_ordersD()
	{
		$this->db->select("orderNumber, productCode, quantityOrdered, priceEach");
		$this->db->from('orderdetails');
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteOrderD($id)
	{
		$this->db->where('orderNumber', $id);
		return $this->db->delete('orderdetails');
	}

	function updateOrderD($order,$id)
	{
		$this->db->where('orderNumber', $id);
		return $this->db->update('orderdetails', $order);
	}

	public function drilldownD($id)
	{
		$this->db->select("orderNumber, productCode, quantityOrdered, priceEach");
		$this->db->from('orderdetails');
		$this->db->where('orderNumber',$id);
		$query = $this->db->get();
		return $query->result();
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
