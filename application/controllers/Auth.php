<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_model');
		$this->load->library('form_validation');
		$this->load->library('cart');
		$this->load->helper(array('url','html','form'));
		$this->user_id = $this->session->userdata('user_id');
		$this->load->helper('cookie');
	}


	public function index()
	{
		$config['base_url'] = site_url('Auth/index/');
		$config['total_rows'] = $this->Form_model->record_count();
		$data['users'] = $this->Form_model->get_all_users();
		$this->load->view('Common/login');
	}

	//Fix the logging 
	public function post_login()
	{
		$session_set_value = $this->session->all_userdata();
		// Check for remember_me data in retrieved session data
		if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") {
			$this->load->view('UserViews/index');
		}
		else if(isset($session_set_value['remember_me'])
			&& $session_set_value['remember_me'] == "1" && $adminCheck == 1)
			$this->load->view('UserViews/index');
		else
		{
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_message('required', 'Enter %s');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('Common/login');
			}
			else
			{
				$data = array(
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password'))
				);
				$check = $this->Form_model->auth_check($data);

				$pass = $this->input->post('password');
				$email = $this->input->post('email');
				if ($check) {
					if ($this->input->post("chkremember")) {
						$this->input->set_cookie('uemail', $email, 86500); /* Create cookie for store emailid */
						$this->input->set_cookie('upassword', $pass, 86500); /* Create cookie for password */
					}
					else{
						delete_cookie('uemail'); /* Delete email cookie */
						delete_cookie('upassword'); /* Delete password cookie */
					}
				}

				//$check = $this->Form_model->auth_check($data);

				if($check != false){
					$user = array(
						'user_id' => $check->id,
						'password' => $check->password,
						'email' => $check->email,
						'first_name' => $check->first_name,
						'last_name' => $check->last_name,
						'admin' => $check->admin
					);

					$this->session->set_userdata($user);

					//Admin Login
					$adminCheck = $check->admin;
					if($adminCheck == 1)
						redirect(base_url('index.php/Auth/profile'));
					else
						redirect( base_url('index.php/Auth/profile') );
				}

				$this->load->view('Common/login');
			}
		}
	}

	public function post_register()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', 'Enter %s');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('Common/register');
		}
		else
		{
			//If the checkbox 'admin' at registration is checked register a Admin user
			if($_POST['admin'] == 1)
			{
				$data = array(
					'id' => $this->input->post('id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'admin' => $this->input->post('admin')
				);
				$check = $this->Form_model->insert_user($data);
				if($check != false && $_POST['admin'] == 1){
					$user = array(
						'user_id' => $check,
						'email' => $this->input->post('email'),
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'password' => md5($this->input->post('password')),
						'admin'=> $this->input->post('admin')
					);
					$this->session->set_userdata($user);
					redirect(base_url('index.php/Auth/profile'));
				}
			}
			//If the checkbox 'admin' at registration is not checked register a normal user
			else{
				$data = array(
					'id' => $this->input->post('id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'admin'=> $this->input->post('admin')
					);
				$check = $this->Form_model->insert_user($data);
				if($_POST['admin'] != '1'){
					$user = array(
						'user_id' => $check,
						'email' => $this->input->post('email'),
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'password' => md5($this->input->post('password')),
						'admin'=> $this->input->post('admin')
					);
					$this->session->set_userdata($user);
					redirect( base_url('index.php/Auth/profile') );
				}
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/Auth'));
	}

	public function profile(){
		if(empty($this->user_id)){
			redirect(base_url('index.php/Auth'));
		}
		else{
			if($this->session->userdata['admin'] == 1)
				$this->load->view('UserViews/index');
			else
				$this->load->view('UserViews/index');
		}
	}

}
