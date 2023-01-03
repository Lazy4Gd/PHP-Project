<?php 
session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body background="foto/back.jpg">	

<!-- navigasi bar -->
<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Log In</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="Password" class="form-control" name="password" placeholder="Password">
							</div>
							<button class="btn btn-primary" name="login">Log In</button>
							<hr />
	                            Not Registered ? <a href="daftar.php" >Click Here</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php' ?>
<?php 
// jika ada tombol simpan
if (isset($_POST["login"]))
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	$ambil = $koneksi->query("SELECT * FROM pelanggan
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	$akunyangcocok = $ambil->num_rows;

	if ($akunyangcocok==1)
	{
		//anda bisa login
		$akun = $ambil->fetch_assoc();

		$_SESSION['pelanggan'] = $akun;
		echo "<script>alert('anda berhasil login');</script>";

		//jika sudah belanja
		if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
		{
			echo "<script>location='checkout.php';</script>";
		}
		else
		{
			echo "<script>location='produk.php';</script>";
		}
	}
	else
	{
		//anda gagal login
		echo "<script>alert('anda gagal login, periksa kembali akun anda');</script>";
		echo "<script>location='login.php';</script>";
	}
}

?>

</body>
</html>