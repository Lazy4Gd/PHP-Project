<?php 
session_start();
include 'koneksi.php';

//jika belum login
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["keranjang"]))
{
	echo "<script>alert('Buy a Ticket or Login');</script>";
	echo "<script>location='produk.php';</script>";
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
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
		<h1>Checkout</h1>
		<hr>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Price</th>
				<th>Total</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $totalbelanja = 0; ?>
			<?php foreach($_SESSION['keranjang'] as $id_token => $jumlah) { ?>
			<!-- menampilkan produk berdasarkan id_produk -->
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
			</tr>
			<?php $nomor++; ?>
			<?php $totalbelanja+=$subharga; ?>
		<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total Price</th>
				<th>Rp. <?php echo number_format($totalbelanja) ?></th>
			</tr>
		</tfoot>
	</table>

	<form method="post">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<th>Name</th>
					<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<th>Phone</th>
					<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<th>Email</th>
					<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['email_pelanggan'] ?>" class="form-control">
				</div>
			</div>
			</div>
		<button class="btn btn-primary" name="checkout">Checkout</button>
	</form>

	<?php
	if (isset($_POST["checkout"]))
	{
		$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
		$token = $_POST["token"];
		$tanggal_pembelian = date("Y-m-d");

		$ambil = $koneksi->query("SELECT * FROM ongkir WHERE token='$token'");
		$arraytoken = $ambil->fetch_assoc();
		$tarif = $arraytoken['tarif'];

		$total_pembelian = $totalbelanja + $tarif;

		//1. menyimpan data ke tabel pembelian
		//$koneksi->query("INSERT INTO pembelian (
		//	id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, alamat, tarif, alamat_rumah)
		//	VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$alamat','$tarif','$alamat_rumah')");
		
		$koneksi->query("INSERT INTO `pembelian` (`id_pelanggan`, `token`, `tanggal_pembelian`, `total_pembelian`, `tarif`, `status_pembelian`, `resi_pengiriman`) VALUES ('$id_pelanggan', '$token', '$tanggal_pembelian', '$total_pembelian', '$tarif', 'Pending', '')");

		// mendapatkan id_pembelian yang barusan terjadi
		$id_pembelian_barusan = $koneksi->insert_id;
		
		//debugging
		//print("id_pembelian_barusan : ".$id_pembelian_barusan);
		//die();

		foreach ($_SESSION["keranjang"] as $id_token => $jumlah) 
		{

			//mendapatkan data produk berdasarkan id_produk
			$ambil = $koneksi->query("SELECT * FROM produk WHERE id_token = '$id_token'");
			$perproduk = $ambil->fetch_assoc();

			$nama = $perproduk['nama_tiket'];
			$harga = $perproduk['harga_tiket'];
			$berat = $perproduk['berat_produk'];

			$subberat = $perproduk['berat_produk']*$jumlah;
			$subharga = $perproduk['harga_tiket']*$jumlah;
			$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_token, nama, harga, berat, subberat, subharga, jumlah)
				VALUES ('$id_pembelian_barusan','$id_token','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

			// update stok
			$koneksi->query("UPDATE produk SET stok_tiket = stok_tiket -$jumlah
				WHERE id_token='$id_token'");
		}

		//mengkosongkan keranjang belanja

		unset($_SESSION["keranjang"]);

		// tampilan dialihkan ke halaman nota
		echo "<script>alert('Success');</script>";
		echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
	}

	?>

	</div>
</section>

<?php include 'footer.php' ?>
<!-- <pre><?php //print_r($_SESSION['pelanggan']) ?></pre>
<pre><?php //print_r($_SESSION['keranjang']) ?></pre> -->

</body>
</html>