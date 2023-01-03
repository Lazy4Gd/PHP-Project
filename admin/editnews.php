<h2>Edit News</h2>

<?php 

$ambil = $koneksi->query("SELECT * FROM news WHERE id_news='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Judul News</label>
		<input type="text" name="judul" class="form-control" value="<?php echo $pecah['judul']; ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi News</label>
		<input type="text" name="deskripsi" class="form-control" value="<?php echo $pecah['deskripsi']; ?>">
	</div>
	<button class="btn btn-primary" name="edit">Edit</button>
	<td>
		<a href="index.php?halaman=news" class="btn btn-primary">News Page</a>
	</td>
</form>
<?php 

if (isset($_POST['edit']))
{
		$koneksi->query("UPDATE news SET judul ='$_POST[judul]',
			deskripsi = '$_POST[deskripsi]' WHERE id_news = '$_GET[id]'");
	echo "<div class='alert alert-info'>News Updated</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=news'>";
}
?>