<h2>Edit Pelanggan</h2>

<?php 

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Email Pelanggan</label>
		<input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Ganti Password</label>
		<input type="Password" name="password" class="form-control" value="<?php echo $pecah['password_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon Pelanggan</label>
		<input type="number" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<button class="btn btn-primary" name="edit">Edit</button>
	<td>
		<a href="index.php?halaman=pelanggan" class="btn btn-primary">Halaman Pelanggan</a>
	</td>
</form>
<?php 

if (isset($_POST['edit']))
{
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan ='$_POST[nama]',
			email_pelanggan = '$_POST[email]', password_pelanggan = '$_POST[password]',
            telepon_pelanggan = '$_POST[telepon]' WHERE id_pelanggan = '$_GET[id]'");
	echo "<div class='alert alert-info'>Data Pelanggan telah diedit</div>";
}
?>