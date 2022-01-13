<div class="container">
<a href="./?a=buku#buku">Kembali Ke Daftar Buku</a><?php if(isset($_GET["tambah"])){ echo " | <a href='./?a=peminjaman'>Kembali Ke Peminjaman</a>";}?>
<h3>Tambah Buku | <a href="#" onclick="return confirm('Perbarui Data Excel Buku?')">Perbarui Buku</a></h3><hr>
	<center>
	<?php
	if (isset($_POST['tambah'])) {
		$tambah = mysqli_query($db, "INSERT INTO tgr_buku VALUES('$_POST[no]','$tgl','$_POST[judul]','$_POST[pengarang]','$_POST[penerbit]','$_POST[tahun_terbit]','$_POST[asal]','$_POST[klasifikasi]')");
		if (isset($_GET['tambah'])) {
		$pinjam = mysqli_query($db, "INSERT INTO tgr_peminjaman VALUES('','$_GET[nama]','$_GET[kelas]','$_POST[no]','$tgl','$kembali','','','0')");
		if ($pinjam) {
			echo "<div class='alert alert-info'>Buku <b>".$_POST['judul']."</b> Berhasil Ditambah Dan Langsung Dipinjam. Terima Kasih Sudah Meminjam!<br>Jangan Lupa Untuk Mengembalikan Buku Sebelum Tanggal <b>".$kembali."</b></div>";
		}
		else{
			echo "<div class='alert alert-warning'>Gagal Menambah Buku!</div>";
		}
		}
		else{

		if ($tambah) {
			echo "<div class='alert alert-info'>Berhasil Menambah Buku!</div>";
		}
		else{
			echo "<div class='alert alert-warning'>Gagal Menambah Buku.</div>";
		}
		}
	}
	?>
	<form method="post">
		<table width="100%">
			<tr>
				<th>Nomor</th>
				<td>:</td>
				<td><input required type="number" name="no" <?php if(isset($_GET['tambah'])){ echo "value='".$_GET['tambah']."'";}?>></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td>:</td>
				<td><input required type="date" name="tanggal" value="<?php echo date('Y-m-d');?>"></td>
			</tr>
			<tr>
				<th>Judul</th>
				<td>:</td>
				<td><input required type="text" name="judul"></td>
			</tr>
			<tr>
				<th>Pengarang</th>
				<td>:</td>
				<td><input required type="text" name="pengarang"></td>
			</tr>
			<tr>
				<th>Penerbit</th>
				<td>:</td>
				<td><input required type="text" name="penerbit"></td>
			</tr>
			<tr>
				<th>Tahun Terbit</th>
				<td>:</td>
				<td><input required type="number" name="tahun_terbit"></td>
			</tr>
			<tr>
				<th>Asal</th>
				<td>:</td>
				<td><input required type="text" name="asal"></td>
			</tr>
			<tr>
				<th>Klasifikasi</th>
				<td>:</td>
				<td><input required type="text" name="klasifikasi"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><button type="submit" name="tambah" class="btn btn-primary" style="width:25%">Tambah</button> <button class="btn btn-warning" type="reset" style="width:25%">Reset</button></td>
			</tr>
		</table>
	</form>
	</center>
</div>

