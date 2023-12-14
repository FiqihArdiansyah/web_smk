<?php
$active = 'master'; 

require_once '../../koneksi.php';
$query = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");
$queryjurusan = mysqli_query($koneksi, "SELECT id, jurusan FROM tbl_jurusan");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Kelas - SMK AL-ITTIHAD RAAS</title>
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
								Tambah Kelas
							</div>
							<div class="float-right">
								<a href="index.php">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_tambah.php">
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select type="text" class="form-control" id="kelas" placeholder="Kelas" autocomplete="off" required="required" name="kelas">
								<option value="X">X</option>
								<option value="XI">XI</option>
								<option value="XII">XII</option>
								</select>
							</div>
							<div class="form-group">
								<label for="jurusan">Jurusan</label>
								<select name="jurusan" id="jurusan" class="form-control">
									<?php while($rowj = mysqli_fetch_assoc($queryjurusan)) : ?>
										<option value="<?= $rowj['id'] ?>"><?= $rowj['jurusan'] ?></option>
									<?php endwhile; ?>	
								</select>
							</div>
							<div class="form-group">
								<label for="wali_kelas">Wali Kelas</label>
								<select name="wali_kelas" id="wali_kelas" class="form-control">
									<?php while($row = mysqli_fetch_assoc($query)) : ?>
										<option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
									<?php endwhile; ?>	
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah</button>
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