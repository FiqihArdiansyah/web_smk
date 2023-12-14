<?php 

$query_artikel_terbaru = mysqli_query($koneksi, "SELECT * FROM tbl_artikel ORDER BY tanggal DESC LIMIT 4");
$query_kategori_artikel= mysqli_query($koneksi, "SELECT * FROM tbl_kategori_artikel ORDER BY nama_kategori ASC LIMIT 4");

?>
<div class="col-sm-4">
	<div class="list-group">
		<span class="list-group-item text-white" style="background-color: #00923E">Artikel Terbaru</span>
		<?php while($artikel_terbaru = mysqli_fetch_assoc($query_artikel_terbaru)) : ?>
			<a href="detail_artikel.php?id=<?= $artikel_terbaru['id'] ?>" class="list-group-item list-group-item-action"><?= $artikel_terbaru['judul'] ?></a>
		<?php endwhile; ?>
	</div>

	<div class="list-group">
		<span class="list-group-item text-white mt-3" style="background-color: #00923E">Kategori Artikel</span>
		<?php while($kategori_artikel = mysqli_fetch_assoc($query_kategori_artikel)) : ?>
			<a href="kategori.php?id=<?= $kategori_artikel['id'] ?>" class="list-group-item list-group-item-action"><?= $kategori_artikel['nama_kategori'] ?></a>
		<?php endwhile; ?>
	</div>
	<!-- <div class="list-group">
		<span class="list-group-item text-white mt-3" style="background-color: #00923E">Jumlah Pengunjung</span>
		<?php 
		$sql_hitung = mysqli_query($koneksi, "SELECT * FROM tbl_visitor");
		while($row = mysqli_fetch_array($sql_hitung)){
			$jmlh_sekarang = $row['counts'];
			$jmlh_baru = $jmlh_sekarang + 1 ;
			$update_counts = mysqli_query($koneksi, "UPDATE tbl_visitor SET counts='$jmlh_baru'");
		 } ?>
		 <a class="list-group-item list-group-item-action"><?= $jmlh_baru ?></a>
	</div> -->
</div>