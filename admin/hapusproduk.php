<?php

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_token='$_GET[id]'");
$perproduk = $ambil->fetch_assoc();
$fototiket = $perproduk['foto_tiket'];
if (file_exists("../foto_produk/$foto_tiket"))
{
	unlink("../foto_produk/$foto_tiket");
}


$koneksi->query("DELETE FROM produk WHERE id_token='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>