<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->helper('url'); 
	$cssbase = base_url()."assets/css/";
	$jsbase = base_url()."assets/js/";
	$img_base = base_url()."assets/images/";
	$base = base_url() . index_page();
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
<header>
	<div class="jumbotron text-center" style="margin-bottom:0">
		<img class="img-fluid" alt="Responsive image" src="<?php echo $img_base . "site/logo.png"?>" />
		<h1>Moylish Market</h1>
		<p>Your home for fresh produce in Limerick!</p>
	</div>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" <?= anchor('HomePageController/index', 'Home', 'title="Home"'); ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<?php
				//If the session is admin load different headers
				if (isset($this->session->userdata['user_id']) && $this->session->userdata['admin'] == 1)
				{
				?>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Customers/index', 'Customers', 'title="customers"'); ?></a>
					</li>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Orders/index', 'Orders', 'title="orders"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Products/handleInsert', 'Insert Product', 'title="Insert"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Products/index', 'Products', 'title="products"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Auth/post_register', 'Register', 'title="Register"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Auth/profile', 'Profile', 'title="Profile"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Wishlist/index', 'Wishlist', 'title="Wishlist"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/CartController/index'); ?>" class="cart-link" title="View Cart">
							<i class="glyphicon glyphicon-shopping-cart">Cart</i>
							<span>(<?php echo $this->cart->total_items(); ?>)</span></a>
					</li>
				<?php
				}
				else if(isset($this->session->userdata['user_id']) && $this->session->userdata['admin'] == 0)
				{
				?>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Products/index', 'Products', 'title="products"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Auth/post_register', 'Register', 'title="Register"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Auth/profile', 'Profile', 'title="Profile"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Wishlist/index', 'Wishlist', 'title="Wishlist"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/CartController/index'); ?>" class="cart-link" title="View Cart">
							<i class="glyphicon glyphicon-shopping-cart">Cart</i>
							<span>(<?php echo $this->cart->total_items(); ?>)</span></a>
					</li>
				<?php
				}
				else{
				?>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Products/index', 'Products', 'title="products"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Auth/post_register', 'Register', 'title="Register"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Auth/post_login', 'Login', 'title="Login"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" <?= anchor('Wishlist/index', 'Wishlist', 'title="Wishlist"'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/CartController/index'); ?>" class="cart-link" title="View Cart">
							<i class="glyphicon glyphicon-shopping-cart">Cart</i>
							<span>(<?php echo $this->cart->total_items(); ?>)</span></a>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
	</nav>

</header>
