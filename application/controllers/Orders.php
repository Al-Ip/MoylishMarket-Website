<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('OrderModel');
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

		//Pagination Configs
		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i> Previous Page ';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = ' Next Page <i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['base_url'] = site_url('Orders/index/');
		$config['total_rows'] = $this->OrderModel->record_count();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);

		$data['orders'] = $this->OrderModel->get_all_orders(20, $this->uri->segment(5));
		$data['ordersDet'] = $this->OrderModel->get_all_ordersD();
		$this->load->view('orders/index', $data);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//
	//Orders Table
	//
	public function viewOrders($id)
	{
		$data['view_orders']= $this->OrderModel->drilldown($id);
		$data['view_ordersDet']= $this->OrderModel->drilldownD($id);
		$this->load->view('orders/viewOrder', $data);
	}

	public function editOrder($order)
	{	$data['edit_data']= $this->OrderModel->drilldown($order);
		$this->load->view('orders/update', $data);
	}

	public function deleteOrder($orderCode)
	{	$deletedRows = $this->OrderModel->deleteOrder($orderCode);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows author has been deleted";
		else
			$data['message'] = "There was an error deleting the order with an ID of $orderCode";
		$this->load->view('Common/displayMessageView',$data);
	}

	public function updateOrder($id)
	{
		//set validation rules
		$this->form_validation->set_rules('orderNumber', 'Order Number', 'required');
		$this->form_validation->set_rules('orderDate', 'Order Date', 'required');
		$this->form_validation->set_rules('requiredDate', 'Required Date', 'required');
		$this->form_validation->set_rules('shippedDate', 'Shipped Date', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('comments', 'Comments', 'required');
		$this->form_validation->set_rules('customerNumber', 'Customer Number', 'required');

		//get values from post
		$id = $this->input->post('orderNumber');
		$order['orderDate'] = $this->input->post('orderDate');
		$order['requiredDate'] = $this->input->post('requiredDate');
		$order['shippedDate'] = $this->input->post('shippedDate');
		$order['status'] = $this->input->post('status');
		$order['comments'] = $this->input->post('comments');
		$order['customerNumber'] = $this->input->post('customerNumber');

		//check if the form has passed validation
		if (!$this->form_validation->run()){
			//validation has failed, load the form again
			echo '<script language="javascript">';
			echo 'alert("Validation has failed, Try again!")';
			echo '</script>';
			$this->load->view('orders/update', $order);
			return;
		}
		//check if update is successful
		if ($this->OrderModel->updateOrder($order,$id)) {
			/*
			 * Trying to send message after updating but the redirect function is cleaning the output buffer
			 * and exiting script execution
			$this->phpAlert(   "Fantastic!!\\n\\nProduct Updated successfully!!!"   );
			$url = base_url() . "Products/viewProduct/".$id;
			echo ("<script type='javascript/text'>location.href ='$url'</script>");
			*/
			redirect('Orders/viewOrders/'.$id);
		}
		else {
			$this->phpAlert(   "Uh oh ...\\n\\nProblem On Update!"   );
		}
	}


}
