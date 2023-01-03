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
	<title>Produk</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body background="foto/back.jpg">

<?php include 'menu.php'; ?>

<!-- konten -->
<section class="konten">
	<div class="container">
		<div class="panel panel-default">
		<h1>Ticket</h1></font>
		<div class="row">
			
			<?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_tiket']; ?>" alt="">
					<div class="caption">
						<h4><?php echo $perproduk['nama_tiket']; ?></h4>
						<h5>Rp. <?php echo number_format($perproduk['harga_tiket']); ?></h5>
						<!--<a href="beli.php?id=<?php echo $perproduk['id_tiket']; ?>" class="btn btn-primary">Beli</a> -->
						<a href="detail.php?id=<?php echo $perproduk["id_token"]; ?>" class="btn btn-primary">Buy</a>
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