<?php 

require_once 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT tbl_kelas.id AS id, tbl_kelas.kelas, tbl_kelas.wali_kelas,tbl_kelas.id_jurusan,tbl_guru.nama, tbl_guru.id AS id_guru ,tbl_jurusan.jurusan,tbl_jurusan.id AS id_jurus FROM tbl_kelas LEFT JOIN tbl_jurusan on tbl_kelas.id_jurusan = tbl_jurusan.id LEFT JOIN tbl_guru on tbl_kelas.wali_kelas = tbl_guru.id ORDER BY kelas ASC");
$aktif = 'kelas';
$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar Kelas - SMK AL-ITTIHAD RAAS</title>
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
					Daftar Kelas
				</div>
				<table id="table_id" class="dataTable table table-bordered">
				    <thead>
				        <tr>
				            <th>No</th>
				            <th>Kelas</th>
				            <th>Jurusan</th>
				            <th>Nama Wali Kelas</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php while($row = mysqli_fetch_assoc($query)) : ?>
				        	<tr>
				        		<td><?= $no++ ?></td>
				        		<td><?= $row['kelas'] ?></td>
				        		<td><?= isset($row['jurusan']) ? $row['jurusan'] : '-' ?></td>
				        		<td><a href="detail_guru.php?id=<?= $row['id_guru'] ?>" target="_blank"><?= isset($row['nama']) ? $row['nama'] : '-' ?></a></td>
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