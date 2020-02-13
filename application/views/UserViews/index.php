<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<title>Login Form</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>


<div class="container" style="margin-top:30px">
	<div class="row">
		<div class="col-sm-4">
			<h2>Profile</h2>
			<h5>This is your profile page, you can view and change various aspects of you account here.</h5>
			<img class="img-fluid" alt="NewsLogo" src="<?php echo $img_base . "site/noImage.png"?>" />
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2>Account Info</h2>
				</div>
				<div class="card-body">
					<?php
					//If the session is admin load different headers
					if (isset($this->session->userdata['user_id']))
					{
					?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>First Name:</b> <?php echo $this->session->userdata['first_name']; ?> </li>
						<li class="list-group-item"><b>Last Name:</b> <?php echo $this->session->userdata['last_name'];?> </li>
						<li class="list-group-item"><b>Email:</b> <?php echo $this->session->userdata['email'];?> </li>
						<li class="list-group-item"><b>Password:</b>
							<?php $hiddenPass = preg_replace("|.|","*",$this->session->userdata['password']);echo $hiddenPass; ?>
						</li>
					</ul>
					<br>
					<h4>About me:</h4>
					<p class="card-text">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
					<a href="<?php echo base_url('index.php/Auth/logout'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Logout</a>
				</div>
			</div>
			<br>
		</div>
		<?php } else
			{
				?>
			<p>User(s) not found...</p>
		<?php } ?>
	</div>
</div>


<?php
$this->load->view('Common/footer');
?>
