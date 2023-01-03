<?php
session_start();
include 'koneksi.php';


if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='produk.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Keranjang Belanja</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body background="foto/back.jpg">

<!-- navigasi bar -->
<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
		<h1>Cart</h1>
		<hr>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Ticket</th>
				<th>Price</th>
				<th>Total</th>
				<th>Total Price</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php foreach($_SESSION['keranjang'] as $id_token => $jumlah) { ?>
			<!-- menampilkan produk berdasarkan id_token -->
			<?php 
			$ambil = $koneksi->query("SELECT * FROM produk 
				WHERE id_token='$id_token'");
			$pecah = $ambil->fetch_assoc();
			$subharga = $pecah["harga_tiket"]*$jumlah;
			?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_tiket']; ?></td>
				<td>Rp. <?php echo number_format($pecah['harga_tiket']); ?></td>
				<td><?php echo $jumlah; ?></td>
				<td>Rp. <?php echo number_format($subharga); ?></td>
				<td>
					<a href="hapuskeranjang.php?id=<?php echo $pecah['id_token']; ?>" class="btn btn-danger btn-xs">Delete</a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
		</tbody>
	</table>

	<a href="produk.php" class="btn btn-default">Back</a>
	<a href="checkout.php" class="btn btn-primary">Checkout</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php include 'footer.php' ?>
	</body>
</html>