<div class="container">
<h3>Data Peminjaman Buku</h3>
<?php
if (isset($_POST['pinjam'])) {
	$querybuku = mysqli_query($db, "SELECT*FROM tgr_buku WHERE no = '$_POST[no]'");
	$cekbuku = mysqli_num_rows($querybuku);
	$databuku = mysqli_fetch_array($querybuku);
	if ($cekbuku < 1) {
		echo "<div class='alert alert-warning'>Buku Dengan Nomor <b>".$_POST['no']."</b> Belum Ada. <a href='./?a=buku&b=tambah&tambah=".$_POST['no']."&nama=".$_POST['nama']."&kelas=".$_POST['kelas']."'>Tambah Buku</a></div>";
	}
	else{
		$pinjam = mysqli_query($db, "INSERT INTO tgr_peminjaman VALUES('','$_POST[nama]','$_POST[kelas]','$_POST[no]','$tgl','$kembali','','','0')");
		if ($pinjam) {
			echo "<div class='alert alert-info'>Berhasil Meminjam Buku <b>".$databuku['judul']."</b>. Terima Kasih Sudah Meminjam!<br>Jangan Lupa Untuk Mengembalikan Buku Sebelum Tanggal <b>".$kembali."</b></div>";
		}
		else{
			echo "<div class='alert alert-warning'>Gagal Meminjam Buku!</div>";
		}
	}
}
?>
	<form method="post" class="inputan" id="pinjam">
	<input type="number" required="" style="width:20%" name="no" placeholder="Nomor Buku"> <input type="text"  style="width:38%" required="" name="nama" placeholder="Nama">
	<select name="kelas" required="" style="width:10%">
		<option value="">-KELAS</option>
		
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
		
	</select>
	<input style="width:20%" type="date" name="tanggal" value="<?php echo date('Y-m-d')?>">
	<input type="submit" name="pinjam" style="width:10%" value="Pinjam">
	</form>
<br><br>
<?php
$query = mysqli_query($db, "SELECT*FROM tgr_peminjaman ORDER BY id DESC");
if (mysqli_num_rows($query) < 1) {
	echo "<div class='alert alert-warning'>Tidak Ada Data</div>";
}
?>
	<table class="table">
	<tr>
		<th style="width:5%">No.</th>
		<th style="width:20%">Nama</th>
		<th style="width:5%">Kelas</th>
		<th style="width:25%">Judul Buku</th>
		<th style="width:10%">Tanggal Pinjam</th>
		<th style="width:10%">Tanggal Kembali</th>
		<th style="width:25%">Opsi</th>
	</tr>
	<?php
	$no = 1;
	if (isset($_POST['kembali'])) {
		mysqli_query($db, "UPDATE tgr_peminjaman SET status='1', kembali='$d' WHERE no_buku='$_POST[kembali]'");
		header("location:#pinjam");
	}
	elseif (isset($_POST['perpanjang'])) {
		mysqli_query($db, "UPDATE tgr_peminjaman SET tanggal_pinjam='$d',l='0', tanggal_kembali='$kembali' WHERE no_buku='$_POST[perpanjang]'");
		header("location:#pinjam");
	}
	elseif (isset($_POST['batal_kembali'])) {
		mysqli_query($db, "UPDATE tgr_peminjaman SET status='0', kembali='0' WHERE no_buku='$_POST[batal_kembali]'");
		header("location:#pinjam");
	}
	elseif (isset($_POST['hapus_peminjaman'])) {
		mysqli_query($db, "DELETE FROM tgr_peminjaman WHERE no_buku='$_POST[hapus_peminjaman]'");
		header("location:#pinjam");
	}
	while ($pinjam = mysqli_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $pinjam['nama'];?></td>
		<td><?php echo $pinjam['kelas'];?></td>
		<td><?php $judulbuku = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM tgr_buku WHERE no='$pinjam[no_buku]'")); echo $judulbuku['judul']?></td>
		<td><?php echo $pinjam['tanggal_pinjam'];?></td>
		<td><?php
		if(date('d/m/Y') == $pinjam['tanggal_kembali']){
			mysqli_query($db, "UPDATE tgr_peminjaman SET l = '1' WHERE id='$pinjam[id]'");
		}
		if($pinjam['l'] == '1'){
			echo "<font style='color:red'>".$pinjam['tanggal_kembali']."</font>";
		}
		else{
			echo $pinjam['tanggal_kembali'];
		}
		?></td>
		<td>
			<?php
			if ($pinjam['status'] == '1') {
			?>
			<form method="post"><button type="submit" name="batal_kembali" value="<?php echo $pinjam['no_buku']?>" onclick="return confirm('Batal Kembalikan Buku Ini?')" class="btn btn-warning">Dikembalikan</button><?php echo $pinjam['kembali']?></form>
			<?php
			}
			else{
				?>
				<form method="post"><button type="submit" name="kembali" value="<?php echo $pinjam['no_buku']?>" onclick="return confirm('Pastikan Buku Benar-Benar Sudah Dikembalikan')" class="btn btn-info">Kembali</button> | <button type="submit" name="perpanjang" onclick="return confirm('Perpanjang Buku Ini Selama 1 Minggu?')" value="<?php echo $pinjam['no_buku']?>" class="btn btn-success">Perpanjang</button> <button type="submit" name="hapus_peminjaman" value="<?php echo $pinjam['no_buku']?>" style="background:none;border:none" title="Hapus" onclick="return confirm('Hapus Data Ini? (Menghapus Data Ini Dapat Mempengaruhi Angka Pada Laporan)')"><font style="color:red">X</font></button></form>
				<?php
			}
			?>
		</td>
	</tr>
	<?php
	$no++;
	}
	?>	
	</table>

	</div>
	
	