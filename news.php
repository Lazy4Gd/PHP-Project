<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>News</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body background="foto/back.jpg">

<?php include 'menu.php'; ?>

<!-- konten -->
<section class="konten">
	<div class="container">
		<div class="panel panel-default">
		<h1>News</h1></font>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM news "); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<div class="caption">
						<h3><?php echo $perproduk['judul']; ?></h3>
						<hr>
						<h5><?php echo $perproduk['deskripsi']; ?></h5>
					</div>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>