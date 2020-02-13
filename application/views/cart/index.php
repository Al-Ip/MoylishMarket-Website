<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('Common/header');
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>

<html>
<head>
	<title>Cart Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<script>
	/* Update item quantity */
	function updateCartItem(obj, rowid){
		$.get("<?php echo base_url('index.php/CartController/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
			if(resp == 'ok'){
				location.reload();
			}else{
				alert('Cart update failed, please try again.');
			}
		});
	}
</script>

<div class="container" style="margin-top:30px">
	<h2>Shopping Cart</h2>
	<div class="row cart">
		<table class="table">
			<thead>
			<tr>
				<th width="10%"></th>
				<th width="30%">Product</th>
				<th width="15%">Price</th>
				<th width="13%">Quantity</th>
				<th width="20%">Subtotal</th>
				<th width="12%"></th>
			</tr>
			</thead>
			<tbody>
			<?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
				<tr>
					<td>
						<?php echo img(array('src'=>$img_base.'products/thumbs/'. $item["image"])); ?>
					</td>
					<td><?php echo $item["name"]; ?></td>
					<td><?php echo '€'.$item["price"].' EUR'; ?></td>
					<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
					<td><?php echo '€'.$item["subtotal"].' EUR'; ?></td>
					<td>
						<a href="<?php echo base_url('index.php/CartController/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
			<?php } }else{ ?>
			<tr><td colspan="6"><p>Your cart is empty.....</p></td>
				<?php } ?>
			</tbody>
			<tfoot>
			<tr>
				<td><a href="<?php echo base_url('index.php/Products/index'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
				<td colspan="3"></td>
				<?php if($this->cart->total_items() > 0){ ?>
					<td class="text-left">Grand Total: <b><?php echo '€'.$this->cart->total().' EUR'; ?></b></td>
					<td><a href="<?php echo base_url('checkout/'); ?>" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
				<?php } ?>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
</body>
</html>

<?php
$this->load->view('Common/footer');
?>
