<?php 

require_once 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT tbl_guru.id AS id, tbl_guru.nip, tbl_guru.nama ,tbl_guru.alamat,tbl_guru.foto,tbl_guru.no_hp, tbl_guru.id_mapel, tbl_mapel.mapel,tbl_mapel.id AS id_mapel FROM tbl_guru LEFT JOIN tbl_mapel on tbl_guru.id_mapel = tbl_mapel.id  ORDER BY id ASC");
$aktif = 'guru';
$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar Guru - SMK AL-ITTIHAD RAAS</title>
	<link rel="icon" href="images/logo/logosmk.gif" type="image/x-icon">
	<link rel="stylesheet" href="resources/datatables/datatables.min.css">
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/edit.css">
</head>
<body>
	<div class="container bg-light">
		<!-- top bar -->
		<div class="logo clearfix">
			<div class="float-left mt-3 mb-3">
				<img src="resources/images/logosmk.png" alt="Logo Sekolah" width="70px" class="float-left mr-3">
				<div class="text float-right">
					<span class="smk">SMK AL-ITTIHAD RAAS</span><br>
					<span class="visi">Mewujudkan SMK Berkarakter, Berkompeten dan Unggul.</span>
				</div>
			</div>
		</div>
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>

		<!-- content -->
		<div class="row p-3">
			<div class="col-md-8">
				<div class="title mb-3">
					Daftar Guru
				</div>
				<table id="table_id" class="dataTable table table-bordered">
				    <thead>
				        <tr>
				            <th>No</th>
				            <th>NIP</th>
				            <th width="50px">Foto</th>
				            <th>Nama</th>
				            <th>Mata Pelajaran</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php while($row = mysqli_fetch_assoc($query)) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row['nip'] ?></td>
								<td><img src="images/guru/<?= $row['foto'] ?>" alt="" width="100%" class="img-thumbnail"></td>
								<td><a href="detail_guru.php?id=<?= $row['id'] ?>"><?= $row['nama'] ?></a></td>
						    	<td><?= isset($row['mapel']) ? $row['mapel'] : '-' ?></td>
							</tr>
						<?php endwhile; ?>
				    </tbody>
				</table>
			</div>
			<?php require 'sidebar.php'; ?>
		</div>
		<div class="text-white footer">
			2023 © Copyright by Gabriels.
		</div>
	</div>

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/datatables/datatables.min.js"></script>
	<script src="resources/datatables/datatable.js"></script>
</body>
</html>