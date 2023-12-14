<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
$jurusan = mysqli_real_escape_string($koneksi, $_POST['id_jurusan']);
$walikelas = mysqli_real_escape_string($koneksi, $_POST['wali_kelas']);
$query = mysqli_query($koneksi, "UPDATE tbl_kelas SET kelas = '$kelas', id_jurusan = '$jurusan', wali_kelas = '$walikelas' WHERE id = $id");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Diubah!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Diubah!';
	header('Location: index.php');
}

?>