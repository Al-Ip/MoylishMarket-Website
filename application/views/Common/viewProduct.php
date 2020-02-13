<?php
	$this->load->view('Common/header');
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<title>Product Detail</title>
<div class="container" style="margin-top:30px">
	<?php foreach($view_data as $row){?>
	<div class="row">
		<div class="col-sm-4">
			<h2>Product Detail</h2>
			<h5>A closer look at the selected product.</h5>
			<?php
			//If the session is admin load different headers
			if (isset($this->session->userdata['user_id']) && $this->session->userdata['admin'] == 1)
			{
			?>
			<p>As Administrator you can view various details a user cannot as well as update or delete the product</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2><?php echo $row->description;?></h2>
				</div>
				<div class="card-body">
					<h5 class="card-title" ><b>Produce Code:</b> <?php echo $row->produceCode;?></h5>
					<?php echo img(array('src'=>$img_base.'products/full/'. $row->photo)); ?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Product Line:</b> <?php echo $row->productLine;?> </li>
						<li class="list-group-item"><b>Supplier:</b> <?php echo $row->supplier;?> </li>
						<li class="list-group-item"><b>Quantity In Stock:</b> <?php echo $row->quantityInStock;?> </li>
						<li class="list-group-item"><b>Bulk Buy Price:</b> €<?php echo $row->bulkBuyPrice;?> </li>
						<li class="list-group-item"><b>Bulk Sale Price:</b> €<?php echo $row->bulkSalePrice;?> </li>
					</ul>
					<br>
					<h4>About The Product</h4>
					<p class="card-text">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
					<a href="<?php echo base_url('index.php/Products/index'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Products</a>
					<a href="<?php echo base_url('index.php/Products/deleteProduct/'.$row->produceCode); ?>"
					   class="btn pull-right btn-danger"><i class="glyphicon glyphicon-menu-left"></i> Delete Product</a>
					<a href="<?php echo base_url('index.php/Products/editProduct/'.$row->produceCode); ?>"
					   class="btn pull-right btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Update Product</a>

				</div>
			</div>
			<br>
		</div>
		<?php
		} else{
		?>
		<p>As a User you can view the detail of the product but cannot update or delete the product.</p>
		<hr class="d-sm-none">
	</div>
	<div class="col-sm-8">
		<div class="card">
			<div class="card-header">
				<h2><?php echo $row->description;?></h2>
			</div>
			<div class="card-body">
				<?php echo img(array('src'=>$img_base.'products/full/'. $row->photo)); ?>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><b>Product Line:</b> <?php echo $row->productLine;?> </li>
					<li class="list-group-item"><b>Supplier:</b> <?php echo $row->supplier;?> </li>
					<li class="list-group-item"><b>Quantity In Stock:</b> <?php echo $row->quantityInStock;?> </li>
					<li class="list-group-item"><b>Sale Price:</b> €<?php echo $row->bulkSalePrice;?> </li>
				</ul>
				<br>
				<h4>About The Product</h4>
				<p class="card-text">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
					labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
				<a href="<?php echo base_url('index.php/Products/index'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Products</a>
			</div>
		</div>
		<br>
	</div>
	<?php }?>
	</div>
<?php
}
?>
</div>

<?php
	$this->load->view('Common/footer');
?>
