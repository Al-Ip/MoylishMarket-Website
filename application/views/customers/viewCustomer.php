<?php
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>
<title>Product Detail</title>
<div class="container" style="margin-top:30px">
	<?php foreach($view_cust as $row){?>
	<div class="row">
		<div class="col-sm-4">
			<h2>Customer Detail</h2>
			<h5>A closer look at the selected customer.</h5>
			<p>As Administrator only you can view this page and edit or delete the customer as you wish</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2>Detailed View Of Specific Customer</h2>
				</div>
				<div class="card-body">
					<h5 class="card-title" ><b>Customer Number :</b> <?php echo $row->customerNumber;?></h5>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Customer Name :</b> <?php echo $row->customerName;?> </li>
						<li class="list-group-item"><b>Contact Last Name :</b> <?php echo $row->contactLastName;?> </li>
						<li class="list-group-item"><b>Contact First Name :</b> <?php echo $row->contactFirstName;?> </li>
						<li class="list-group-item"><b>Phone :</b> <?php echo $row->phone;?> </li>
						<li class="list-group-item"><b>Address Line 1 :</b> <?php echo $row->addressLine1;?> </li>
						<li class="list-group-item"><b>Address Line 2 :</b> <?php echo $row->addressLine2;?> </li>
						<li class="list-group-item"><b>City :</b> <?php echo $row->city;?> </li>
						<li class="list-group-item"><b>Postal Code :</b> <?php echo $row->postalCode;?> </li>
						<li class="list-group-item"><b>Country :</b> <?php echo $row->country;?> </li>
						<li class="list-group-item"><b>Credit Limit :</b> <?php echo $row->creditLimit;?> </li>
						<li class="list-group-item"><b>Email :</b> <?php echo $row->email;?> </li>
						<li class="list-group-item"><b>Password :</b> <?php $hiddenPass = preg_replace("|.|","*",$row->password);echo $hiddenPass; ?></li>
					</ul>
					<br>
					<h4>Orders Placed</h4>
					<p class="card-text">Here are located the orders paced associated with the specified customer.
						<br>
						Note!!!
						<br>
						You can click on the <b>Order Number</b> hyperlink to be directed to the specified product.
					</p>
					<table class="table">
						<thead class="thead-dark">
						<tr>
							<th scope="col">Order Number</th>
							<th scope="col">Status</th>
							<th scope="col">Comments</th>
							<th scope="col">Customer Number</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($view_orders as $row){?>
							<tr>
								<th scope="row"><?php echo anchor('Orders/viewOrders/'. $row->orderNumber, $row->orderNumber); ?></th>
								<td><?php echo $row->status;?></td>
								<td>
									<?php
									if($row->comments == null)
										echo "No Comment Written!";
									else
										echo $row->comments;
									?>
								</td>
								<td><?php echo $row->customerNumber;?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<br>
					<a href="<?php echo base_url('index.php/Customers/index'); ?>"
					   class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Customer List</a>
					<a href="<?php echo base_url('index.php/Customers/deleteCustomer/'.$row->customerNumber); ?>"
					   class="btn pull-right btn-danger"><i class="glyphicon glyphicon-menu-left"></i> Delete Customer</a>
					<a href="<?php echo base_url('index.php/Customers/editCustomer/'.$row->customerNumber); ?>"
					   class="btn pull-right btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Update Customer</a>
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
