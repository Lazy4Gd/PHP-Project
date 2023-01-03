<?php
$dataproduk = array();

$ambil = $koneksi->query("SELECT * FROM produk");
while($tiap = $ambil->fetch_assoc())
{
	$dataproduk[] = $tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";
?>

<h2>Tambah Tiket</h2>

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="namatiket">
	</div>
	<div class="form-group">
		<label>Harga Tiker (IDR)</label>
		<input type="number" class="form-control" name="hargatiket">
	</div>
	<div class="form-group">
		<label>Stok Tiket</label>
		<input type="number" class="form-control" name="stoktiket">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsitiket" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto_tiket">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save']))
{
	$nama = $_FILES['foto_tiket']['name'];
	$lokasi = $_FILES['foto_tiket']['tmp_name'];
	move_uploaded_file($lokasi, '../foto_produk/'.$nama);
	$koneksi->query("INSERT INTO produk
		(nama_tiket, harga_tiket, foto_tiket, deskripsi_tiket, stok_tiket) 
		VALUES('$_POST[namatiket]','$_POST[hargatiket]','$nama','$_POST[deskripsitiket]','$_POST[stoktiket]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>