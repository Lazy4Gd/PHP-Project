<?php 
session_start();
include 'koneksi.php';
// mendapatkan id produk dari link url
$id_produk = $_GET['id'];

// jika sudah ada produk di keranjang, maka produk jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_token]))
{
	$_SESSION['keranjang'][$id_token]+=1;
}

// sebelum ada di keranjang, maka produk dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_token] = 1;
}


//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//forward ke halaman keranjang
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>