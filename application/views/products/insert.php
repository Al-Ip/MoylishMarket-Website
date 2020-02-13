<?php
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Insert Product</title>
<div class="container" style="margin-top:30px">
	<?php
	echo form_open_multipart('Products/handleInsert');
	?>
	<div class="row">
		<div class="col-sm-4">
			<h2>Inserting Product</h2>
			<h5>Look at this wonderful page.</h5>
			<p>You can insert a new product here by entering the fields seen in the right.</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2>Description: <?php echo form_input('description', $description);?></h2>
				</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Produce Code: </b> <?php echo form_input('produceCode', $produceCode);?> </li>
						<li class="list-group-item"><b>Select File for Upload :</b> <?php echo form_upload('userfile'); ?> </li>
						<li class="list-group-item"><b>Product Line:</b> <?php echo form_input('productLine', $productLine);?> </li>
						<li class="list-group-item"><b>Supplier:</b> <?php echo form_input('supplier', $supplier);?> </li>
						<li class="list-group-item"><b>Quantity In Stock:</b> <?php echo form_input('quantityInStock', $quantityInStock);?> </li>
						<li class="list-group-item"><b>Bulk Buy Price:</b> € <?php echo form_input('bulkBuyPrice', $bulkBuyPrice);?> </li>
						<li class="list-group-item"><b>Bulk Sale Price:</b> € <?php echo form_input('bulkSalePrice', $bulkSalePrice);?> </li>
					</ul>
					<br>
					<h4>About The Product</h4>
					<p class="card-text">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
					<a href="<?php echo base_url('index.php/Products/index'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Products</a>
					<?php echo form_submit('submitInsert', "Insert!", " class='btn pull-right btn-warning'"); ?><i class="glyphicon glyphicon-menu-left"></i>

				</div>
			</div>
			<br>
		</div>
		<?php
		//
		//When hitting submit without entering anything change how the error messages is shown!!!!!!
		//
		//
		echo form_close();
		echo validation_errors();
		?>
	</div>
</div>

<?php
$this->load->view('Common/footer');
?>
