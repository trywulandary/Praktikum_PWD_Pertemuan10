<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan SD Qurrota A'yun</title>
	<link rel="icon" type="image/png" href="./tampilan/ikon/logoqa">
	<link rel="stylesheet" type="text/css" href="./tampilan/style.css">
</head>
<body>
<?php
session_start();
$db = mysqli_connect("localhost","root","","perpus");
include 'panggil/menu.php';
date_default_timezone_set("Asia/Jakarta");
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$tanggal = $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
$d = date("d/m/Y");
$d2 = strtotime("d/m/Y");
$kembali = date("d/m/Y", strtotime("+7 day"));
$tgl = date_format(date_create(@$_POST['tanggal']), "d/m/Y");
$tglblk2 = date_format(date_create(@$data['tanggal']), 'Y-m-d');
$hbuku = mysqli_num_rows(mysqli_query($db, "SELECT*FROM tgr_buku WHERE no='No'"));
$htamu = mysqli_num_rows(mysqli_query($db, "SELECT*FROM tgr_buku_tamu WHERE nama='Nama'"));
if ($hbuku > 0) {
	mysqli_query($db, "DELETE FROM tgr_buku WHERE no='No'");
}
if ($htamu > 0) {
	mysqli_query($db, "DELETE FROM tgr_buku_tamu WHERE nama='Nama'");
}
if (!isset($_SESSION['masuk'])) {
	include 'panggil/masuk.php';
}
else{
echo "<a href='javascript:oid' style='margin-left:20px' onclick='history.go()'>Refresh</a>";
echo "<b style='float:right'>$tanggal</b>";
if (isset($_GET['a'])) {
	if ($_GET['a'] == 'buku') {
		if (@$_GET['b'] == 'ubah') {
		include 'panggil/ubah_buku.php';
		}
		elseif(@$_GET['b'] == 'tambah'){
		include 'panggil/tambah_buku.php';
		}
		else{
		include 'panggil/buku.php';
		}
	}
	if ($_GET['a'] == 'peminjaman') {
		include 'panggil/peminjaman.php';
	}

	if ($_GET['a'] == 'laporan') {
		include 'panggil/laporan.php';
	}
	if ($_GET['a'] == 'informasi') {
		include 'panggil/informasi.php';
	}
}
elseif (isset($_GET['cari_buku'])) {
	include 'panggil/cari_buku.php';
}

else{
include 'panggil/selamat-datang.html';
include 'panggil/buku-tamu.php';
}
}
?>
</body>
<footer class="panel-footer modal-footer">
	

<center>&copy 2021 - <b>Perpustakaan SD Qurrota A'yun   </center>
</footer>
</html>
