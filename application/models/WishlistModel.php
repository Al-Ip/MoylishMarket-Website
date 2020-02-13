<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WishlistModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function record_count()
	{
		return $this->db->count_all('wishlist');
	}

	function insertWishlistModel($products)
	{
		$this->db->insert('wishlist',$products);
		if ($this->db->affected_rows() ==1) {
			return true;
		}
		else {
			return false;
		}
	}

	function get_all_wish()
	{
		$this->db->select("customerNumber, productCode, timeAdded");
		$this->db->from('wishlist');
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteWishlistModel($id)
	{
		$this->db->where('productCode', $id);
		return $this->db->delete('wishlist');
	}

	function updateWishlistModel($products,$id)
	{
		$this->db->where('productCode', $id);
		return $this->db->update('wishlist', $products);
	}

	public function drilldown($products)
	{
		$this->db->select("customerNumber, productCode");
		$this->db->from('wishlist');
		$this->db->where('productCode',$products);
		$query = $this->db->get();
		return $query->result();
	}

	public function getRows($id = ''){
		$this->db->select('*');
		$this->db->from('products');
		if($id){
			$this->db->where('produceCode', $id);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('produceCode', 'asc');
			$query = $this->db->get();
			$result = $query->result_array();
		}

		// Return fetched data
		return !empty($result)?$result:false;
	}
}
?>
