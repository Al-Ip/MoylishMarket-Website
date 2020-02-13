<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductsModel extends CI_Model
{
    function __construct()
    {
    	parent::__construct();
		$this->load->database();
    }
	
	function record_count()
	{
		return $this->db->count_all('products');
	}
	
	function insertProductModel($products)
	{
		$this->db->insert('products',$products);
		if ($this->db->affected_rows() ==1) {
			return true;
		}
		else {
			return false;
		}
	}

	function get_all_products($limit, $offset) 
	{	
		$this->db->limit($limit, $offset);
		$this->db->select("produceCode, description, productLine, supplier, quantityInStock, bulkBuyPrice, bulkSalePrice, photo"); 
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deleteProductModel($id)
	{
		$this->db->where('produceCode', $id);
		return $this->db->delete('products');
    }

	function updateProductModel($products,$id)
	{
		$this->db->where('produceCode', $id);
		return $this->db->update('products', $products);
	}

	public function drilldown($products)
	{
		$this->db->select("produceCode, description, productLine, supplier, quantityInStock, bulkBuyPrice, bulkSalePrice, photo");
		$this->db->from('products');
		$this->db->where('produceCode',$products);
		$query = $this->db->get();
		return $query->result();
    }

    /////////////////////////////////////////////////////////////////////////////////////////////
	//
	////CartController Code
	//
	/////////////////////////////////////////////////////////////////////////////////////////////
	/*
	public function getRows($id = ''){
		$this->db->select('*');
		$this->db->from('products');
		if($id){
			$this->db->where('produceCode', $id);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('description', 'asc');
			$query = $this->db->get();
			$result = $query->result_array();
		}

		// Return fetched data
		return !empty($result)?$result:false;
	}

	public function getOrder($id){
		$this->db->select('o.*, c.name, c.email, c.phone, c.address');
		$this->db->from($this->ordTable.' as o');
		$this->db->join($this->custTable.' as c', 'c.id = o.customer_id', 'left');
		$this->db->where('o.id', $id);
		$query = $this->db->get();
		$result = $query->row_array();

		// Get order items
		$this->db->select('i.*, p.image, p.name, p.price');
		$this->db->from($this->ordItemsTable.' as i');
		$this->db->join($this->proTable.' as p', 'p.id = i.product_id', 'left');
		$this->db->where('i.order_id', $id);
		$query2 = $this->db->get();
		$result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();

		// Return fetched data
		return !empty($result)?$result:false;
	}

	public function insertCustomer($data){
		// Add created and modified date if not included
		if(!array_key_exists("created", $data)){
			$data['created'] = date("Y-m-d H:i:s");
		}
		if(!array_key_exists("modified", $data)){
			$data['modified'] = date("Y-m-d H:i:s");
		}

		// Insert customer data
		$insert = $this->db->insert($this->custTable, $data);

		// Return the status
		return $insert?$this->db->insert_id():false;
	}

	public function insertOrder($data){
		// Add created and modified date if not included
		if(!array_key_exists("created", $data)){
			$data['created'] = date("Y-m-d H:i:s");
		}
		if(!array_key_exists("modified", $data)){
			$data['modified'] = date("Y-m-d H:i:s");
		}

		// Insert order data
		$insert = $this->db->insert($this->ordTable, $data);

		// Return the status
		return $insert?$this->db->insert_id():false;
	}

	public function insertOrderItems($data = array()) {

		// Insert order items
		$insert = $this->db->insert_batch($this->ordItemsTable, $data);

		// Return the status
		return $insert?true:false;
	}
	*/

}
?>
