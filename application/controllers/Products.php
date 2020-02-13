<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

	function  __construct(){
		parent::__construct();
		$this->load->model('ProductsModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('cart');
	}

	function index(){
		$data = array();


		// Fetch products from the database
		$config['base_url'] = site_url('Products/index/');
		$config['total_rows'] = $this->ProductsModel->record_count();
		$config["uri_segment"] = 2;
		$config['per_page'] = 9;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['products'] = $this->ProductsModel->get_all_products($config["per_page"], $page);

		// Load the product list view
		$this->load->view('products/index', $data);
	}

	public function viewProduct($id)
	{	$data['view_data']= $this->ProductsModel->drilldown($id);
		$this->load->view('Common/viewProduct', $data);
	}

	function addToCart($proID){

		// Fetch specific product by ID
		$product = $this->ProductsModel->getRows($proID);

		// Add product to the cart
		$data = array(
			'id'    => $product['produceCode'],
			'qty'    => 1,
			'price'    => $product['bulkSalePrice'],
			'name'    => $product['description'],
			'image' => $product['photo']
		);
		$this->cart->insert($data);

		// Redirect to the cart page
		redirect('CartController/index');
	}


	//
	//
	//
	//
	//
	//Old ProductController Code
	//
	//
	//
	//
	//
	function phpAlert($msg) {
		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}

	public function listProduct()
	{
		$config['base_url'] = site_url('Products/listProduct/');
		$config['total_rows'] = $this->ProductsModel->record_count();
		$config['per_page'] = 10;
		$this->pagination->initialize($config);
		$data['title_info']=$this->ProductsModel->get_all_products(10, $this->uri->segment(10));
		$this->load->view('products/index', $data);
	}

	public function editProduct($products)
	{	$data['edit_data']= $this->ProductsModel->drilldown($products);
		$this->load->view('products/update', $data);
	}

	public function deleteProduct($produceCode)
	{	$deletedRows = $this->ProductsModel->deleteProductModel($produceCode);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows author has been deleted";
		else
			$data['message'] = "There was an error deleting the author with an ID of $produceCode";
		$this->load->view('Common/displayMessageView',$data);
	}

	public function updateProduct($id)
	{
		$pathToFile = $this->uploadAndResizeFile();
		$this->createThumbnail($pathToFile);

		//set validation rules
		$this->form_validation->set_rules('produceCode', 'Produce Code', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('productLine', 'Product Line', 'required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
		$this->form_validation->set_rules('bulkBuyPrice', 'Bulk Buy Price', 'required');
		$this->form_validation->set_rules('bulkSalePrice', 'Bulk Sale Price', 'required');

		//get values from post
		$id = $this->input->post('produceCode');
		$products['description'] = $this->input->post('description');
		$products['productLine'] = $this->input->post('productLine');
		$products['supplier'] = $this->input->post('supplier');
		$products['quantityInStock'] = $this->input->post('quantityInStock');
		$products['bulkBuyPrice'] = $this->input->post('bulkBuyPrice');
		$products['bulkSalePrice'] = $this->input->post('bulkSalePrice');
		$products['photo'] = $_FILES['userfile']['name'];

		//check if the form has passed validation
		if (!$this->form_validation->run()){
			//validation has failed, load the form again
			echo '<script language="javascript">';
			echo 'alert("Validation has failed, Try again!")';
			echo '</script>';
			$this->load->view('products/update', $products);
			return;
		}
		//check if update is successful
		if ($this->ProductsModel->updateProductModel($products,$id)) {
			/*
			 * Trying to send message after updating but the redirect function is cleaning the output buffer
			 * and exiting script execution
			$this->phpAlert(   "Fantastic!!\\n\\nProduct Updated successfully!!!"   );
			$url = base_url() . "Products/viewProduct/".$id;
			echo ("<script type='javascript/text'>location.href ='$url'</script>");
			*/
			redirect('Products/viewProduct/'.$id);
		}
		else {
			$this->phpAlert(   "Uh oh ...\\n\\nProblem On Update!"   );
		}
	}

	public function handleInsert(){
		if ($this->input->post('submitInsert')){

			$pathToFile = $this->uploadAndResizeFile();
			$this->createThumbnail($pathToFile);

			//set validation rules
			$this->form_validation->set_rules('produceCode', 'Produce Code', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('productLine', 'Product Line', 'required');
			$this->form_validation->set_rules('supplier', 'Supplier', 'required');
			$this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
			$this->form_validation->set_rules('bulkBuyPrice', 'Bulk Buy Price', 'required');
			$this->form_validation->set_rules('bulkSalePrice', 'Bulk Sale Price', 'required');

			//get values from post
			$products['produceCode'] = $this->input->post('produceCode');
			$products['description'] = $this->input->post('description');
			$products['productLine'] = $this->input->post('productLine');
			$products['supplier'] = $this->input->post('supplier');
			$products['quantityInStock'] = $this->input->post('quantityInStock');
			$products['bulkBuyPrice'] = $this->input->post('bulkBuyPrice');
			$products['bulkSalePrice'] = $this->input->post('bulkSalePrice');
			$products['photo'] = $_FILES['userfile']['name'];

			//check if the form has passed validation
			if (!$this->form_validation->run()){
				//validation has failed, load the form again
				$this->load->view('products/insert', $products);
				return;
			}

			//check if insert is successful
			if ($this->ProductsModel->insertProductModel($products)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}

			//load the view to display the message
			$this->load->view('Common/displayMessageView', $data);

			return;
		}
		$products['produceCode'] = "";
		$products['description'] = "";
		$products['productLine'] = "";
		$products['supplier'] = "";
		$products['quantityInStock'] = "";
		$products['bulkBuyPrice'] = "";
		$products['bulkSalePrice'] = "";
		$products['photo'] = "";

		//load the form
		$this->load->view('products/insert', $products);
	}

	function uploadAndResizeFile()
	{	//set config options for thumbnail creation
		$config['upload_path']='./assets/images/products/full/';
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']='100';
		$config['max_width']='1024';
		$config['max_height']='768';

		$this->load->library('upload',$config);
		if (!$this->upload->do_upload())
			echo $this->upload->display_errors();
		else
			echo 'upload done<br>';

		$upload_data = $this->upload->data();
		$path = $upload_data['full_path'];

		$config['source_image']=$path;
		$config['maintain_ratio']='FALSE';
		$config['width']='180';
		$config['height']='200';

		$this->load->library('image_lib',$config);
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'image resized<br>';

		$this->image_lib->clear();
		return $path;
	}

	function createThumbnail($path)
	{	//set config options for thumbnail creation
		$config['source_image']=$path;
		$config['new_image']='./assets/images/products/thumbs/';
		$config['maintain_ratio']='FALSE';
		$config['width']='42';
		$config['height']='42';

		//load library to do the resizing and thumbnail creation
		$this->image_lib->initialize($config);

		//call function resize in the image library to physiclly create the thumbnail
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'thumbnail created<br>';
	}

}
