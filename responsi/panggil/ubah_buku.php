<div class="container">
	<?php
	$query = mysqli_query($db, "SELECT*FROM tgr_buku WHERE no='$_GET[no]'");
	$data = mysqli_fetch_array($query);
	?>
<a href="./?a=buku#buku">Kembali Ke Daftar Buku</a>
<h3>Ubah Buku: <b><?php echo $data['judul']?></b></h3><hr>
	<center>
	<?php
	if (isset($_POST['ubah'])) {
		$ubah = mysqli_query($db, "UPDATE tgr_buku SET no='$_POST[no]', tanggal='$tgl', judul='$_POST[judul]', pengarang='$_POST[pengarang]', penerbit='$_POST[penerbit]', tahun_terbit='$_POST[tahun_terbit]', asal='$_POST[asal]', klasifikasi='$_POST[klasifikasi]' WHERE no='$_GET[no]'");
		$cekminjem = mysqli_num_rows(mysqli_query($db, "SELECT*FROM tgr_peminjaman WHERE no_buku='$_GET[no]'"));
		if ($cekminjem > 0) {
			mysqli_query($db, "UPDATE tgr_peminjaman SET no_buku='$_POST[no]' WHERE no_buku='$_GET[no]'");
		}
		if ($ubah) {
			echo "<div class='alert alert-info'>Buku Ini Berhasil Diubah!</div>";
		}
		else{
			echo "<div class='alert alert-warning'>Gagal Mengubah Buku.</div>";
		}
	}
	?>
	<form method="post">
		<table width="100%">
			<tr>
				<th>Nomor</th>
				<td>:</td>
				<td><input required type="number" name="no" value="<?php echo $data['no'];?>"></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td>:</td>
				<td><input required type="date" name="tanggal" value="<?php echo $tglblk2;?>"></td>
			</tr>
			<tr>
				<th>Judul</th>
				<td>:</td>
				<td><input required type="text" name="judul" value="<?php echo $data['judul'];?>"></td>
			</tr>
			<tr>
				<th>Pengarang</th>
				<td>:</td>
				<td><input required type="text" name="pengarang" value="<?php echo $data['pengarang'];?>"></td>
			</tr>
			<tr>
				<th>Penerbit</th>
				<td>:</td>
				<td><input required type="text" name="penerbit" value="<?php echo $data['penerbit'];?>"></td>
			</tr>
			<tr>
				<th>Tahun Terbit</th>
				<td>:</td>
				<td><input required type="number" name="tahun_terbit" value="<?php echo $data['tahun_terbit'];?>"></td>
			</tr>
			<tr>
				<th>Asal</th>
				<td>:</td>
				<td><input required type="text" name="asal" value="<?php echo $data['asal'];?>"></td>
			</tr>
			<tr>
				<th>Klasifikasi</th>
				<td>:</td>
				<td><input required type="text" name="klasifikasi" value="<?php echo $data['klasifikasi'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><button type="submit" name="ubah" class="btn btn-primary" style="width:25%">Ubah</button> <button class="btn btn-warning" type="reset" style="width:25%">Reset</button></td>
			</tr>
		</table>
	</form>
	</center>
</div>