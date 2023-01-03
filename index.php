<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sirenhead</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
}

-->
    </style>
</head>
<body background="foto/back.jpg">

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<div class="panel panel-default">
		<h1>About Sirenhead</h1></font>
		<div class="row">
			<div class="col-sm-2">
				<div class="thumbnail">
					<img src="foto/logo.jpeg" alt="">
					<div class="caption">
						<h3>Name: -</h3>
						<h5>Age: -</h5>
						<h5>role: -</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="thumbnail">
					<img src="foto/logo.jpeg" alt="">
					<div class="caption">
						<h3>Name: -</h3>
						<h5>Age: -</h5>
						<h5>role: -</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="thumbnail">
					<img src="foto/logo.jpeg" alt="">
					<div class="caption">
						<h3>Name: -</h3>
						<h5>Age: -</h5>
						<h5>role: -</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="thumbnail">
					<img src="foto/logo.jpeg" alt="">
					<div class="caption">
						<h3>Name: -</h3>
						<h5>Age: -</h5>
						<h5>role: -</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="thumbnail">
					<img src="foto/logo.jpeg" alt="">
					<div class="caption">
						<h3>Name: -</h3>
						<h5>Age: -</h5>
						<h5>role: -</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<?php include 'footer.php' ?>
	</body>
</html>