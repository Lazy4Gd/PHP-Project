<h2>Data Produk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $perproduk['nama_tiket']; ?></td>
			<td><?php echo number_format($perproduk['harga_tiket']); ?></td>
			<td><?php echo $perproduk['stok_tiket']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $perproduk['foto_tiket']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $perproduk['id_token']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=editproduk&id=<?php echo $perproduk['id_token']; ?>" class="btn btn-warning">edit</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>