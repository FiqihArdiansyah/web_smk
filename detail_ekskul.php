<?php 

require_once 'koneksi.php';
if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT tbl_ekskul.id,tbl_ekskul.nama_ekskul,tbl_ekskul.ketua_ekskul ,tbl_ekskul.tanggal_berdiri,tbl_ekskul.pembina, tbl_guru.nama,tbl_guru.id AS id_pembina FROM tbl_ekskul LEFT JOIN tbl_guru on tbl_ekskul.pembina = tbl_guru.id  WHERE tbl_ekskul.id = $id");

$row = mysqli_fetch_assoc($query);
$aktif = 'ekskul';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detail EKSKUL - SMK AL-ITTIHAD RAAS</title>
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
					Detail Esktrakurikuler - <b><?= $row['nama_ekskul'] ?></b>
				</div>
				<table class="table table-stripped">
							<tr>
								<td width="225px"><b>Nama</b></td>
								<td>:</td>
								<td><?= $row['nama_ekskul'] ?></td>
							</tr>
							<tr>
								<td><b>Pembina</b></td>
								<td>:</td>
								<td><?= $row['nama'] ?></td>
							</tr><tr>
								<td><b>Ketua Ekstrakurikuler</b></td>
								<td>:</td>
								<td><?= $row['ketua_ekskul'] ?></td>
							</tr>
							<tr>
								<td width="30%"><b>Tanggal Berdirinya</b></td>
								<td width="2%">:</td>
								<td><?= $row['tanggal_berdiri'] ?></td>
							</tr>
							<tr>
								<td><b></td>
								<td></td>
								<td><a href="ekskul.php" class="btn btn-secondary btn-sm">Kembali</a></td>
							</tr>
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