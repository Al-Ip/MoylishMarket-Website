<?php
	$this->load->view('Common/header');
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>

<title>Home</title>

<div class="container" style="margin-top:30px">
	<div class="row">
		<div class="col-sm-4">
			<h2>News</h2>
			<h5>The only place for reliable news and stories surrounding the produce of Moylish Market!</h5>
			<img class="img-fluid" alt="NewsLogo" src="<?php echo $img_base . "site/news.png"?>" />
			<p>Some text about me in culpa qui officia deserunt mollit anim..</p>
			<h3>Follow Us!</h3>
			<p>Our Social Medias:</p>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<a href="#" class="fa fa-facebook-square"></a>
					<a href="#" class="fa fa-twitter-square"></a>
					<a href="#" class="fa fa-snapchat-square"></a>
					<a href="#" class="fa fa-youtube-square"></a>
				</li>
			</ul>
			<hr class="d-sm-none">
		</div>
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h2>Carrot Karetson Becomes Taoiseach By Majority Vote!!!</h2>
				</div>
				<div class="card-body">
					<h5 class="card-title">Title description, Dec 07, 2019</h5>
					<img class="img-fluid" alt="NewsLogo" src="<?php echo $img_base . "site/carrotSuit.jpg"?>" />
					<br>
					<p class="card-text">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
					<a href="#" class="btn btn-primary">Read</a>
				</div>
			</div>
			<br>
			<h2>Carrot Karetson Runs For Office, Vows Fresh Carrots For All!!</h2>
			<h5>Title description, Sep 02, 2019</h5>
			<div class="fakeimg">Fake Image</div>
			<p>Some text..</p>
			<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
			<br>
			<h2>Carrot Named 'Karetson' Shows First Signs Of Intelligent Life!!</h2>
			<h5>Title description, Aug 01, 2019</h5>
			<div class="fakeimg">Fake Image</div>
			<p>Some text..</p>
			<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
			<br>
			<h2>Study Shows Carrots Contain Phosphorus</h2>
			<h5>Title description, Jun 11, 2019</h5>
			<div class="fakeimg">Fake Image</div>
			<p>Some text..</p>
			<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
			<br>
			<h2>Record Sales As Carrot Fundraiser Proves Successful</h2>
			<h5>Title description, Mar 24, 2019</h5>
			<img class="img-fluid" alt="NewsLogo" src="<?php echo $img_base . "site/carrots.jfif"?>" />
			<p>Some text..</p>
			<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
			<br>
		</div>

	</div>
</div>


<?php
	$this->load->view('Common/footer');
?>
