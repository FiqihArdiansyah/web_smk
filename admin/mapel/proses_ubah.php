<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$kode_mapel = mysqli_real_escape_string($koneksi, $_POST['kode_mapel']);
$mapel = mysqli_real_escape_string($koneksi, $_POST['mapel']);
$jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
$query = mysqli_query($koneksi, "UPDATE tbl_mapel SET kode_mapel = '$kode_mapel', mapel = '$mapel', id_jurusan = '$jurusan' WHERE id = $id");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Diubah!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Diubah!';
	header('Location: index.php');
}

?>