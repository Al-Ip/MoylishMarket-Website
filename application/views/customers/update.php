<?php
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Updating Customer</title>
<div class="container" style="margin-top:30px">
	<?php foreach($edit_data as $row){
		echo form_open_multipart('Customers/updateCustomers/'.$row->customerNumber);
	?>
	<div class="row">
		<div class="col-sm-4">
			<h2>Updating Customer </h2>
			<h5>A closer look at the selected customer.</h5>
			<p>You may change anything about the selected customer here.</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2>Update Specified Customer</h2>
				</div>
				<div class="card-body">
					<h5 class="card-title" >Customer Number : <?php echo form_input('customerNumber', $row->customerNumber); ?></h5>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Customer Name :</b>  <?php echo form_input('customerName', $row->customerName); ?> </li>
						<li class="list-group-item"><b>Contact Last Name :</b> <?php echo form_input('contactLastName', $row->contactLastName);?> </li>
						<li class="list-group-item"><b>Contact First Name :</b> <?php echo form_input('contactFirstName', $row->contactFirstName);?> </li>
						<li class="list-group-item"><b>Phone :</b> <?php echo form_input('phone', $row->phone);?> </li>
						<li class="list-group-item"><b>Address Line 1 :</b>  <?php echo form_input('addressLine1', $row->addressLine1);?> </li>
						<li class="list-group-item"><b>Address Line 2 :</b> <?php echo form_input('addressLine2', $row->addressLine2);?> </li>
						<li class="list-group-item"><b>City :</b>  <?php echo form_input('city', $row->city); ?> </li>
						<li class="list-group-item"><b>Postal Code :</b> <?php echo form_input('postalCode', $row->postalCode);?> </li>
						<li class="list-group-item"><b>Country :</b> <?php echo form_input('country', $row->country);?> </li>
						<li class="list-group-item"><b>Credit Limit :</b> <?php echo form_input('creditLimit', $row->creditLimit);?> </li>
						<li class="list-group-item"><b>Email :</b>  <?php echo form_input('email', $row->email);?> </li>
						<li class="list-group-item"><b>Password :</b> <?php echo form_input('password', $row->password);?> </li>
					</ul>
					<br>
					<h4>About The Customer</h4>
					<p class="card-text">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
					<a href="<?php echo base_url('index.php/Customers/index'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Products</a>
					<?php echo form_submit('submitUpdate', "Submit!", " class='btn pull-right btn-warning'"); ?><i class="glyphicon glyphicon-menu-left"></i>

				</div>
			</div>
			<br>
		</div>
		<?php
		echo form_close();
		echo validation_errors();
		}
		?>
	</div>
</div>

<?php
$this->load->view('Common/footer');
?>
