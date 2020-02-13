<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Customer List</title>
<div class="container" style="margin-top:30px">
	<div class="row">
		<div class="col-sm-4">
			<h2>Customer List</h2>
			<h5>A closer look at all the various customers stored.</h5>
			<p>As Administrator you can click on an <b>Customer Number</b> to see more detail and even edit, delete or amend said customer details</p>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<table class="table">
					<thead class="thead-dark">
					<tr>
						<th scope="col">Customer Number</th>
						<th scope="col">Customer Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Email</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($customers as $row){?>
						<tr>
							<th scope="row"><?php echo anchor('Customers/viewCustomers/'. $row->customerNumber, $row->customerNumber); ?></th>
							<td><?php echo $row->customerName;?></td>
							<td><?php echo $row->phone;?></td>
							<td><?php echo $row->email;?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<nav aria-label="Page navigation example">
					<ul class="pagination pg-blue justify-content-center">
						<li> <?php echo $this->pagination->create_links();?> </li>
					</ul>
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

