<div class="container" id="buku-tamu">
<?php
if (isset($_POST['kirim'])) {
	$query = mysqli_query($db, "INSERT INTO tgr_buku_tamu VALUES('','$_POST[nama]','$_POST[kelas]','$_POST[keperluan]','$tgl')");
	header("location:#buku-tamu");
}
?>
<h3>Buku Tamu | <a href="#" onclick="return confirm('Perbarui Data Excel Buku Tamu?')">Perbarui Excel Buku Tamu
<a href="panggil/report.php">
	<button class="btn btn-primary">Download</button>
</a>
</a>
</h3>
<form class="inputan" action="" method="post">
	<input required="" type="text" name="nama" style="width:10%" id="short" placeholder="Nama">
	<select name="kelas" required="" style="width:10%">
		<option value="">PiihKelas</option>
	 
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
		
		
	</select>
	<input type="date" name="tanggal" style="width:20%" value="<?php echo date('Y-m-d')?>">
	<input type="text" name="keperluan" required="" id="short" style="width:30%" placeholder="Keperluan">
	<input type="submit" name="submit" value="send" style="width:8%">
</form>
<?php
 // Check If form submitted, insert form data into users table.
 if(isset($_POST['submit'])) {
 $nama = $_POST['nama'];
 $kelas = $_POST['kelas'];
 $keperluan = $_POST['keperluan'];
 $tanggal = $_POST['tanggal'];
 // include database connection file
 include_once("koneksi.php");
 // Insert user data into table
 $result = mysqli_query($con, "INSERT INTO tgr_buku_tamu(nama,kelas,keperluan,tanggal) VALUES('$nama','$kelas', '$keperluan','$tanggal')");
}
?>
<br><br>
<table class="table">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Keperluan</th>
		<th>Tanggal</th>
		<th>Hapus</th>
	</tr>
	<?php
	if (isset($_POST['hapus_bukutamu'])) {
		$query = mysqli_query($db, "DELETE FROM tgr_buku_tamu WHERE id = '$_POST[hapus_bukutamu]'");
		if ($query) {
		echo "<div class='alert alert-info'>Berhasil Menghapus Data</div>";
		}
		else{
		echo "<div class='alert alert-warning'>Gagal Menghapus Data</div>";
		}
		header("location:#buku-tamu");
	}
	$no_tamu = 1;
	$querytamu = mysqli_query($db, "SELECT*FROM tgr_buku_tamu ORDER BY id DESC");
	if (mysqli_num_rows($querytamu) < 1) {
		echo "<div class='alert alert-warning'>Tidak Ada Data</div>";
	}
	while ($tamu = mysqli_fetch_array($querytamu)) {
	?>
	<tr>
		<td><?php echo $no_tamu;?>.</td>
		<td><?php echo $tamu['nama'];?></td>
		<td><?php echo $tamu['kelas'];?></td>
		<td><?php echo $tamu['keperluan'];?></td>
		<td><?php echo $tamu['tanggal'];?></td>
		<td><form method="post"><button class="btn btn-link" type="submit" onclick="return confirm ('Hapus?')" name="hapus_bukutamu" value="<?php echo $tamu['id'];?>">Hapus</button></form></td>
	</tr>
	<?php
	$no_tamu++;
}
	?>
</table>
</div>

<?php
// Panggil koneksi.php untuk mendapatkan data
include "koneksi.php";
// Ambil semua data di tabel mahasiswa berdasarkan NIM
$sql = "select * from tgr_buku_tamu order by id";
// Membuat query
$tampil = mysqli_query($con, $sql);
// Jika terdapat datanya maka tampilkan
if (mysqli_num_rows($tampil) > 0) {
    // Mulai dari satu (untuk mengganti array yang dimulai dari 0)
    $no = 1;
    // Membuat response menjadi array agar data di expert menjadi array
    $response = array();
    // Mengambil data tersebut dan menjadikan array
    $response["data"] = array();
    // Jika data tersebut ada maka ubah menjadi fetch array
    while ($r = mysqli_fetch_array($tampil)) {
        // Tampilkan semua atribut yang dimasukkan
        $h['id'] = $r['id'];
        $h['nama'] = $r['nama'];
        $h['kelas'] = $r['kelas'];
        $h['keperluan'] = $r['keperluan'];
        $h['tanggal'] = $r['tanggal'];
        // Simpan data array tersebut ke dalam "data" agar dipanggil di proses response
        array_push($response["data"], $h);
    }
    // tutup proses json dengan sintaks PHP json_encode
    echo json_encode($response);
    // jika data tersebut kosong atau tidak ada datanya
} else {
    // Tampilkan pesan Tidak ada data
    $response["message"] = "tidak ada data";
    // tutup proses json dengan sintaks PHP json_encode
    echo json_encode($response);
}

