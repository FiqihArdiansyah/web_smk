<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_ekskul WHERE id = $id");
$ekskul = mysqli_fetch_assoc($query);
$query_guru = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

$active = 'master';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Jurusan - SMK AL-ITTIHAD RAAS</title>
	<link rel="icon" href="../../images/logo/logosmk.gif" type="image/x-icon">
	<link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
</head>
<body>
	<?php require_once '../navbar.php'; ?>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<div class="card shadow">
					<div class="card-header">
						<div class="clearfix">
							<div class="float-left">
								Ubah Jurusan
							</div>
							<div class="float-right">
								<a href="index.php">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_ubah.php?id=<?= $ekskul['id'] ?>">
							<div class="form-group">
								<label for="nama_ekskul">Nama Esktrakurikuler</label>
								<input type="text" value="<?= $ekskul['nama_ekskul'] ?>" class="form-control" id="nama_ekskul" placeholder="nama ekstrakurikuler" autocomplete="off" required="required" name="nama_ekskul">
							</div>
							<div class="form-group">
								<label for="pembina">Pembina</label>
								<select name="pembina" id="pembina" class="form-control">
									<?php while($row = mysqli_fetch_assoc($query_guru)) : ?>
										<option value="<?= $row['id'] ?>" <?= $ekskul['pembina'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="ketua">Nama Ketua Esktrakurikuler</label>
								<input type="text" value="<?= $ekskul['ketua_ekskul'] ?>" class="form-control" id="ketua" placeholder="nama ekstrakurikuler" autocomplete="off" required="required" name="ketua">
							</div>
							<div class="form-group">
										<label for="tanggal">Tanggal Berdiri</label>
										<input type="date" value="<?= $ekskul['tanggal_berdiri'] ?>" class="form-control" id="tanggal" placeholder="tanggal" autocomplete="off" required="required" name="tanggal">
									</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah</button>
								<button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
								<a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../../resources/js/jquery.js"></script>
	<script src="../../resources/js/bootstrap.min.js"></script>
</body>
</html>