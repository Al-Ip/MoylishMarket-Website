<?php
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Wish List</title>
<div class="container" style="margin-top:30px">
	<div class="row">
		<div class="col-sm-4">
			<h2>Wish List</h2>
			<h5>A closer look at all the various products placed in your wishlist.</h5>
			<p>Here you can click on the <b>"Product Code"</b> hyperlink to view the product or place it directly into your cart</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<table class="table">
					<thead class="thead-dark">
					<tr>
						<th scope="col">Produce Code</th>
						<th scope="col">Time Added</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($wishlist as $row){?>
						<tr>
							<th scope="row"><?php echo anchor('Products/viewProduct/'. $row->productCode, $row->productCode); ?></th>
							<td><?php echo $row->timeAdded;?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<nav aria-label="Page navigation example">
					<a href="<?php echo base_url('index.php/Wishlist/index'); ?>"
					   class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Products</a>
					<a href="<?php echo base_url('index.php/Wishlist/deleteList/'.$row->productCode); ?>"
					   class="btn pull-right btn-danger"><i class="glyphicon glyphicon-menu-left"></i> Remove off Wishlist</a>
					<a href="<?php echo base_url('index.php/Products/addToCart/'.$row->productCode); ?>"
					   class="btn pull-right btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Add to Cart</a>
				</nav>
			</div>
		</div>
		<br>
	</div>
</div>
</div>

<?php
$this->load->view('Common/footer');
?>

