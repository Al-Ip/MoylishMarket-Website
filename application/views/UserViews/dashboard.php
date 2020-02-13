<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Common/header');
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="http://localhost/K00229834_Alex/LFM_Project/assets/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<title>Dashboard</title>
</head>
<body>

<div class="container">
		<?php
		if (get_cookie('uemail')) {?>
			<h2>Welcome user: <?php echo get_cookie('uemail'); ?></h2>
			<?php
		}
		else { ?>
			<h2>No cookies created or available</h2>
			<?php
		}
		?>
		<a href="<?= base_url();?>index.php/Auth/logout">Logout</a>
</div>
</body>
</html>

<?php
$this->load->view('Common/footer');
?>
