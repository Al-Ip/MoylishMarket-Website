<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Order List</title>
<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-sm-4">
				<h2>Order List</h2>
				<h5>A closer look at all the various orders placed.</h5>
				<p>As Administrator you can click on an <b>Order Number</b> to see more detail and even edit, delete or amend said order</p>
				<hr class="d-sm-none">
			</div>
			<div class="col-sm-8">
				<div class="card">
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
						<?php foreach($orders as $row){?>
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

