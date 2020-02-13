<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('WishlistModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('cart');
	}

	function index()
	{
		$data = array();
		$data['wishlist'] = $this->WishlistModel->get_all_wish();

		// Load the product list view
		$this->load->view('wishlist/index', $data);
	}

	public function wishAdd($produceCode)
	{
		// Fetch specific product by ID
		$product = $this->WishlistModel->getRows($produceCode);

		// Add product to the cart
		$data = array(
			'customerNumber'    => $this->session->userdata['user_id'],
			'productCode'    => $product['produceCode'],
			'timeAdded' 	=> date('Y-m-d')
		);
		$this->WishlistModel->insertWishlistModel($data);

		// Redirect to the cart page
		redirect('Wishlist/index');
	}

	public function viewList($id)
	{	$data['view_data']= $this->WishlistModel->drilldown($id);
		$this->load->view('wishlist/index', $data);
	}

	public function deleteList($orderCode)
	{	$deletedRows = $this->WishlistModel->deleteWishlistModel($orderCode);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows wishlist item has been deleted";
		else
			$data['message'] = "There was an error deleting the wishlist item with an ID of $orderCode";
		$this->load->view('Common/displayMessageView',$data);
	}


}
