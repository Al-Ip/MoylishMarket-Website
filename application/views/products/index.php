<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Buy Products</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<div class="container" style="margin-top:30px">
	<h2>Product List</h2>
	<div class="row">
		<div class="col-lg-12">
			<?php if(!empty($products)){ foreach($products as $row){ ?>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">

						<?php echo anchor('Products/viewProduct/'.$row->produceCode,
							img(array('src'=>$img_base.'products/thumbs/'. $row->photo))); ?>

						<div class="caption">
							<h4 class="pull-right">€<?php echo $row->bulkSalePrice; ?> EUR</h4>
							<h4><?php echo $row->description; ?></h4>
							<hr>
							<h5 class="pull-right"><?php echo $row->productLine; ?></h5>
							<p><b>Supplier: </b><?php echo $row->supplier; ?></p>
						</div>
						<div class="atc">
							<a href="<?php echo base_url('index.php/Products/addToCart/'.$row->produceCode); ?>" class="btn btn-success">
								Add to Cart
							</a>
							<a href="<?php echo base_url('index.php/Wishlist/wishAdd/'.$row->produceCode); ?>" class="btn float-right btn-warning">
								Add to Wishlist
							</a>
						</div>
					</div>
				</div>
			<?php } }else{ ?>
				<p>Product(s) not found...</p>
			<?php } ?>
		</div>

	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination pg-blue justify-content-center">
			<li class="page-item disabled">
				<a class="page-link" tabindex="-1">Previous</a>
			</li>
			<li class="page-item"><a class="page-link"><?php echo $this->pagination->create_links();?></a></li>
		</ul>
	</nav>
</div>




</body>

<?php
$this->load->view('Common/footer');
?>
