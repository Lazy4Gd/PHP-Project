<?php

$ambil = $koneksi->query("SELECT * FROM news WHERE id_news='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM news WHERE id_news='$_GET[id]'");

echo "<script>alert('News Deleted');</script>";
echo "<script>location='index.php?halaman=news';</script>";

?>