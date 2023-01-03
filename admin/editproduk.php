<h2>Edit Tiket</h2>

<?php 

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_token='$_GET[id]'");
$perproduk = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Tiket</label>
		<input type="text" name="namatiket" class="form-control" value="<?php echo $perproduk['nama_tiket']; ?>">
	</div>
	<div class="form-group">
		<label>Harga Tiket</label>
		<input type="number" name="hargatiket" class="form-control" value="<?php echo $perproduk['harga_tiket']; ?>">
	</div>
	<div class="form-group">
		<label>Stok Tiket</label>
		<input type="number" name="stoktiket" class="form-control" value="<?php echo $perproduk['stok_tiket']; ?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $perproduk['foto_tiket']; ?>" width="100">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto_tiket" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi Tiket</label>
		<textarea name="deskripsitiket" class="form-control" rows="10">
			<?php echo $perproduk['deskripsi_tiket']; ?>
		</textarea>
	</div>
	<button class="btn btn-primary" name="edit">Edit</button>
</form>

<?php 

if (isset($_POST['edit']))
{
	$namafoto = $_FILES['foto_tiket']['name'];
	$lokasifoto = $_FILES['foto_tiket']['tmp_name'];

	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_tiket ='$_POST[namatiket]',
			harga_tiket = '$_POST[hargatiket]', stok_tiket = '$_POST[stoktiket]', foto_tiket = '$namafoto', deskripsi_tiket = '$_POST[deskripsitiket]' WHERE id_token = '$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_tiket ='$_POST[namatiket]',
			harga_tiket = '$_POST[hargatiket]', stok_tiket = '$_POST[stoktiket]',deskripsi_tiket = '$_POST[deskripsitiket]' WHERE id_token = '$_GET[id]'");	
	}
	echo "<div class='alert alert-info'>Data Produk telah diedit</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>