<?php
$datanews = array();

$ambil = $koneksi->query("SELECT * FROM news");
while($tiap = $ambil->fetch_assoc())
{
	$datanews[] = $tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";
?>

<h2>Tambah News</h2>

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label>Judul</label>
		<input type="text" class="form-control" name="judulnews">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsinews" rows="10"></textarea>
	</div>
	<button class="btn btn-primary" name="save">Save</button>
</form>
<?php
if (isset($_POST['save']))
{
	$koneksi->query("INSERT INTO news
		(judul, deskripsi) 
		VALUES('$_POST[judulnews]','$_POST[deskripsinews]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=news'>";
}
?>