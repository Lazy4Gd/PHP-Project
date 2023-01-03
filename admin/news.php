<h2>Data News</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Deskripsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM news "); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $perproduk['judul']; ?></td>
			<td><?php echo $perproduk['deskripsi']; ?></td>
			<td>
				<a href="index.php?halaman=hapusnewsk&id=<?php echo $perproduk['id_news']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=editnews&id=<?php echo $perproduk['id_news']; ?>" class="btn btn-warning">edit</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahnews" class="btn btn-primary">Tambah Data</a>