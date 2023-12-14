<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_mapel WHERE id = $id");
$mapel = mysqli_fetch_assoc($query);
$query_jurusan = mysqli_query($koneksi, "SELECT id, jurusan FROM tbl_jurusan");

$active = 'master';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Kelas - SMK AL-ITTIHAD RAAS</title>
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
								Ubah Kelas
							</div>
							<div class="float-right">
								<a href="index.php">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_ubah.php?id=<?= $mapel['id'] ?>">
							<div class="form-group">
								<label for="kode_mapel">Kode Mata Pelajaran</label>
								<input type="text" readonly value="<?= $mapel['kode_mapel'] ?>" class="form-control" id="kode_mapel" placeholder="kode_mapel" autocomplete="off" required="required" name="kode_mapel">
							</div>
							<div class="form-group">
								<label for="mapel">Kode Mata Pelajaran</label>
								<input type="text" readonly value="<?= $mapel['mapel'] ?>" class="form-control" id="kode_mapel" placeholder="mapel" autocomplete="off" required="required" name="mapel">
							</div>
							<div class="form-group">
								<label for="jurusan">Jurusan</label>
								<select name="jurusan" id="jurusan" class="form-control">
									<?php while($row = mysqli_fetch_assoc($query_jurusan)) : ?>
										<option value="<?= $row['id'] ?>" <?= $mapel['id_jurusan'] == $row['id'] ? 'selected' : '' ?>><?= $row['jurusan'] ?></option>
									<?php endwhile; ?>
								</select>
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