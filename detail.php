<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php
// mendapatkan id_produk dari url
$id_token = $_GET["id"];

// query mengambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_token='$id_token'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Produk</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body background="foto/back.jpg">

<?php include 'menu.php'; ?>

<section class="kontent">
	<div class="container">
		<div class="panel panel-default">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_produk/<?php echo $detail["foto_tiket"]; ?>" alt="" class="img-responsive">
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<h2 style="background-color: white;"><?php echo $detail["nama_tiket"] ?></h2>
				<h4 style="background-color: white;">Rp. <?php echo number_format($detail["harga_tiket"]); ?></h4>

				<h5 style="background-color: white;">Stok: <?php echo $detail['stok_tiket'] ?></h5>

				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">Buy Now</button>
							</div>
						</div>
					</div>
				</form>

				<?php 
				// jika ada tombol beli
				if (isset($_POST["beli"])) 
				{
					// mendapatkan jumlah yang diinput
					$jumlah = $_POST["jumlah"];

					// masuk ke keranjang belanja
					$_SESSION["keranjang"][$id_token] = $jumlah;

					echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>

				<p style="background-color: white;"><?php echo $detail["deskripsi_tiket"]; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>