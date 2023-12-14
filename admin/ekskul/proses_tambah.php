<?php 

if(!isset($_POST['tambah'])) header('Location: tambah.php');

require_once '../../koneksi.php';
$nama_ekskul = mysqli_real_escape_string($koneksi, isset($_POST['nama_ekskul']) ? $_POST['nama_ekskul'] : '');
$pembina = mysqli_real_escape_string($koneksi, isset($_POST['pembina']) ? $_POST['pembina'] : '');
$ketua = mysqli_real_escape_string($koneksi, isset($_POST['ketua']) ? $_POST['ketua'] : '');
$tanggal = mysqli_real_escape_string($koneksi, isset($_POST['tanggal']) ? $_POST['tanggal'] : '');
$query = mysqli_query($koneksi, "INSERT INTO tbl_ekskul (nama_ekskul, pembina, ketua_ekskul, tanggal_berdiri) VALUES ('$nama_ekskul', '$pembina', '$ketua', '$tanggal')");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
	header('Location: index.php');
}