<?php
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Updating Order</title>
<div class="container" style="margin-top:30px">
	<?php foreach($edit_data as $row){
	echo form_open_multipart('Orders/updateOrder/'.$row->orderNumber);
	?>
	<div class="row">
		<div class="col-sm-4">
			<h2>Updating Product </h2>
			<h5>A closer look at the selected product.</h5>
			<p>You may change anything about the selected product here.</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2>Update Specified Order</h2>
				</div>
				<div class="card-body">
					<h5 class="card-title" >Order Number : <?php echo form_input('orderNumber', $row->orderNumber); ?></h5>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Order Date :</b>  <?php echo form_input('orderDate', $row->orderDate); ?> </li>
						<li class="list-group-item"><b>Required Date :</b> <?php echo form_input('requiredDate', $row->requiredDate);?> </li>
						<li class="list-group-item"><b>Shipped Date :</b> <?php echo form_input('shippedDate', $row->shippedDate);?> </li>
						<li class="list-group-item"><b>Status :</b> <?php echo form_input('status', $row->status);?> </li>
						<li class="list-group-item"><b>Comments :</b>  <?php echo form_input('comments', $row->comments);?> </li>
						<li class="list-group-item"><b>Customer Number :</b> <?php echo form_input('customerNumber', $row->customerNumber);?> </li>
					</ul>
					<br>
					<h4>About The Order</h4>
					<p class="card-text">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
					<a href="<?php echo base_url('index.php/Orders/index'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Products</a>
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
