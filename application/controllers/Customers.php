<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('CustomerModel');
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

		$config['base_url'] = site_url('Customers/index/');
		$config['total_rows'] = $this->CustomerModel->record_count();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);

		$data['customers'] = $this->CustomerModel->get_all_cust(20, $this->uri->segment(5));
		$data['orders'] = $this->CustomerModel->get_all_ord();
		$this->load->view('customers/index', $data);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//
	//Orders Table
	//
	public function viewCustomers($id)
	{
		$data['view_cust']= $this->CustomerModel->drilldown($id);
		$data['view_orders']= $this->CustomerModel->drilldownOrd($id);
		$this->load->view('customers/viewCustomer', $data);
	}

	public function editCustomer($cust)
	{	$data['edit_data']= $this->CustomerModel->drilldown($cust);
		$this->load->view('customers/update', $data);
	}

	public function deleteCustomer($custId)
	{	$deletedRows = $this->CustomerModel->deleteCustomer($custId);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows author has been deleted";
		else
			$data['message'] = "There was an error deleting the Customer with an ID of $custId";
		$this->load->view('Common/displayMessageView',$data);
	}

	public function updateCustomers($id)
	{
		//set validation rules
		$this->form_validation->set_rules('customerNumber', 'Customer Number', 'required');
		$this->form_validation->set_rules('customerName', 'Customer Name', 'required');
		$this->form_validation->set_rules('contactLastName', 'Contact Last Name', 'required');
		$this->form_validation->set_rules('contactFirstName', 'Contact First Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('addressLine1', 'Address Line 1', 'required');
		$this->form_validation->set_rules('addressLine2', 'Address Line 2', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postalCode', 'Postal Code', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('creditLimit', 'Credit Limit', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		//get values from post
		$id = $this->input->post('customerNumber');
		$cust['customerName'] = $this->input->post('customerName');
		$cust['contactLastName'] = $this->input->post('contactLastName');
		$cust['contactFirstName'] = $this->input->post('contactFirstName');
		$cust['phone'] = $this->input->post('phone');
		$cust['addressLine1'] = $this->input->post('addressLine1');
		$cust['addressLine2'] = $this->input->post('addressLine2');
		$cust['city'] = $this->input->post('city');
		$cust['postalCode'] = $this->input->post('postalCode');
		$cust['country'] = $this->input->post('country');
		$cust['creditLimit'] = $this->input->post('creditLimit');
		$cust['email'] = $this->input->post('email');
		$cust['password'] = $this->input->post('password');

		//check if the form has passed validation
		if (!$this->form_validation->run()){
			//validation has failed, load the form again
			echo '<script language="javascript">';
			echo 'alert("Validation has failed, Try again!")';
			echo '</script>';
			$this->load->view('customers/viewCustomer', $cust);
			return;
		}
		//check if update is successful
		if ($this->CustomerModel->updateCustomer($cust,$id)) {
			/*
			 * Trying to send message after updating but the redirect function is cleaning the output buffer
			 * and exiting script execution
			$this->phpAlert(   "Fantastic!!\\n\\nProduct Updated successfully!!!"   );
			$url = base_url() . "Products/viewProduct/".$id;
			echo ("<script type='javascript/text'>location.href ='$url'</script>");
			*/
			redirect('Customers/viewCustomers/'.$id);
		}
		else {
			$this->phpAlert(   "Uh oh ...\\n\\nProblem On Update!"   );
		}
	}


}
