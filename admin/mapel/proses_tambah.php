<?php 

if(!isset($_POST['tambah'])) header('Location: tambah.php');

require_once '../../koneksi.php';
$kode_mapel = mysqli_real_escape_string($koneksi, isset($_POST['kode_mapel']) ? $_POST['kode_mapel'] : '');
$mapel = mysqli_real_escape_string($koneksi, isset($_POST['mapel']) ? $_POST['mapel'] : '');
$jurusan = mysqli_real_escape_string($koneksi, isset($_POST['jurusan']) ? $_POST['jurusan'] : '');
$query = mysqli_query($koneksi, "INSERT INTO tbl_mapel (kode_mapel, mapel ,id_jurusan) VALUES ('$kode_mapel','$mapel', '$jurusan')");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
	header('Location: index.php');
}