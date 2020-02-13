<?php
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>
<title>Product Detail</title>
<div class="container" style="margin-top:30px">
	<?php foreach($view_orders as $row){?>
	<div class="row">
		<div class="col-sm-4">
			<h2>Order Detail</h2>
			<h5>A closer look at the selected Order.</h5>
			<p>As Administrator only you can view this page and edit the order or delete as you wish</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2>Detailed View Of Specific Order</h2>
				</div>
				<div class="card-body">
					<h5 class="card-title" ><b>Order Number :</b> <?php echo $row->orderNumber;?></h5>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Order Date :</b> <?php echo $row->orderDate;?> </li>
						<li class="list-group-item"><b>Required Date :</b> <?php echo $row->requiredDate;?> </li>
						<li class="list-group-item"><b>Shipped Date :</b> <?php echo $row->shippedDate;?> </li>
						<li class="list-group-item"><b>Status :</b> <?php echo $row->status;?> </li>
						<li class="list-group-item"><b>Comments :</b>
							<?php
							if($row->comments == null)
								echo "No Comment Written!";
							else
								echo $row->comments;
							?> </li>
						<li class="list-group-item"><b>Customer Number :</b><?php echo $row->customerNumber;?> </li>
					</ul>
					<br>
					<h4>Order Details</h4>
					<p class="card-text">Here are located the products associated with the specified order.
						<br>
						Note!!!
						<br>
						You can click on the <b>ProductCode</b> hyperlink to be directed to the specified product.
					</p>
					<table class="table">
						<thead class="thead-dark">
						<tr>
							<th scope="col">OrderNumber</th>
							<th scope="col">ProductCode</th>
							<th scope="col">QuantityOrdered</th>
							<th scope="col">PriceEach</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($view_ordersDet as $row){?>
							<tr>
								<th scope="row"><?php echo $row->orderNumber; ?></th>
								<td><?php echo anchor('Products/viewProduct/'. $row->productCode, $row->productCode); ?></td>
								<td><?php echo $row->quantityOrdered;?></td>
								<td> €<?php echo $row->priceEach;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<br>
					<a href="<?php echo base_url('index.php/Orders/index'); ?>"
					   class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Order List</a>
					<a href="<?php echo base_url('index.php/Orders/deleteOrder/'.$row->orderNumber); ?>"
					   class="btn pull-right btn-danger"><i class="glyphicon glyphicon-menu-left"></i> Delete Order</a>
					<a href="<?php echo base_url('index.php/Orders/editOrder/'.$row->orderNumber); ?>"
					   class="btn pull-right btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Update Order</a>
				</div>
			</div>
			<br>
		</div>
<?php }?>
</div>
</div>


<?php
$this->load->view('Common/footer');
?>
