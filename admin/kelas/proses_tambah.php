<?php 

if(!isset($_POST['tambah'])) header('Location: tambah.php');

require_once '../../koneksi.php';
$kelas = mysqli_real_escape_string($koneksi, isset($_POST['kelas']) ? $_POST['kelas'] : '');
$wali_kelas = mysqli_real_escape_string($koneksi, isset($_POST['wali_kelas']) ? $_POST['wali_kelas'] : '');
$jurusan = mysqli_real_escape_string($koneksi, isset($_POST['jurusan']) ? $_POST['jurusan'] : '');
$query = mysqli_query($koneksi, "INSERT INTO tbl_kelas (kelas, id_jurusan ,wali_kelas) VALUES ('$kelas','$jurusan', '$wali_kelas')");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
	header('Location: index.php');
}