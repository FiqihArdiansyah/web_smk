<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_kelas WHERE id = $id");
$kelas = mysqli_fetch_assoc($query);
$query_guru = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");
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
						<form method="POST" action="proses_ubah.php?id=<?= $kelas['id'] ?>">
							<div class="form-group">
								<label for="kelas">Nama Kelas</label>
								<input type="text" readonly value="<?= $kelas['kelas'] ?>" class="form-control" id="kelas" placeholder="kelas" autocomplete="off" required="required" name="kelas">
							</div>
							<div class="form-group">
							<label for="id_jurusan">jurusan</label>
								<input type="text" readonly value="<?= $kelas['id_jurusan'] ?>" class="form-control" id="id_jurusan" placeholder="id_jurusan" autocomplete="off" required="required" name="id_jurusan">
							
							</div>
							<div class="form-group">
								<label for="wali_kelas">Wali Kelas</label>
								<select name="wali_kelas" id="wali_kelas" class="form-control">
									<?php while($row = mysqli_fetch_assoc($query_guru)) : ?>
										<option value="<?= $row['id'] ?>" <?= $kelas['wali_kelas'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
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