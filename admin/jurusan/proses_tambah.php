<?php 

if(!isset($_POST['tambah'])) header('Location: tambah.php');

require_once '../../koneksi.php';
$jurusan = mysqli_real_escape_string($koneksi, isset($_POST['jurusan']) ? $_POST['jurusan'] : '');
$query = mysqli_query($koneksi, "INSERT INTO tbl_jurusan (jurusan) VALUES ('$jurusan')");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
	header('Location: index.php');
}