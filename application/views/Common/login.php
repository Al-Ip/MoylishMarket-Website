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
<style>
	.form-control{
		height: 40px;
		box-shadow: none;
		color: #63738a;
	}
	.form-control:focus{
		border-color: red;
	}
	.form-control, .btn{
		border-radius: 3px;
	}
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #ffffff;
		margin: 0 0 15px;
		position: relative;
		text-align: center;
	}
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: black;
		position: absolute;
		top: 50%;
		z-index: 2;
	}
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
	.signup-form .hint-text{
		color: #ffffff;
		margin-bottom: 30px;
		text-align: center;
	}
	.signup-form form{
		color: #ffffff;
		border-radius: 3px;
		margin-bottom: 15px;
		background: #353A40;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 30px;
	}
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{
		font-size: 16px;
		font-weight: bold;
		min-width: 140px;
		outline: none !important;
	}
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}
	.signup-form a{
		color: #5cb85c;
		text-decoration: underline;
	}
	.signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}
	.signup-form form a:hover{
		text-decoration: underline;
	}
	div.error {
		margin-bottom: 15px;
		margin-top: -6px;
		color: red;
	}
</style>

</head>
<body>
<div class="signup-form">
	<form action="<?php echo base_url('index.php/Auth/post_login') ?>" method="post" accept-charset="utf-8">
		<h2>Login</h2>
		<p class="hint-text">Enter your Email and Password.</p>
		<div class="form-group">
			<?php echo form_error('email'); ?>
			<input class="form-control " type="email" align="center" name="email" placeholder="Email" required="required"
				   value="<?php if (get_cookie('uemail')) { echo get_cookie('uemail'); } ?>">
		</div>
		<div class="form-group">
			<?php echo form_error('password'); ?>
			<input class="form-control" type="password" align="center" name="password" placeholder="Password" required="required"
				   value="<?php if (get_cookie('upassword')) { echo get_cookie('upassword'); } ?>">
		</div>
		<div class="form-group">
			<label class="checkbox-inline">
				<input type="checkbox" name="chkremember" value="1" checked="checked" >Remember me
			</label>
		</div>
		<div class="form-group">
			<button type="submit" name="btnlogin" class="btn btn-success btn-lg btn-block">Login</button>
		</div>
	</form>
	<div class="text-center">Dont have an account? <a href="<?php echo base_url('index.php/Auth/post_register'); ?>">Register</a></div>
</div>


<?php
$this->load->view('Common/footer');
?>
