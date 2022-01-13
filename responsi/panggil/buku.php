<div class="container">
<h3>Data Buku | <a href="./?a=buku&b=tambah">Tambah Buku</a></h3>
<form method="get"><input type="text" name="cari_buku" placeholder="Search"><button type="submit" style="background: none;border: none"></button></form><br>
<?php
$query = mysqli_query($db, "SELECT*FROM tgr_buku ORDER by no DESC");
if (mysqli_num_rows($query) < 1) {
	echo "<div class='alert alert-warning'>Tidak Tersedia Data</div>";
}
?>
	<table class="table" style="width:100%" id="buku">
		<tr>
			<th style="width:5%">No</th>
			<th style="width:7%">Tanggal</th>
			<th style="width:18%">Judul</th>
			<th style="width:10%">Pengarang</th>
			<th style="width:10%">Penerbit</th>
			<th style="width:5%">Th. Terbit</th>
			<th style="width:10%">Asal</th>
			<th style="width:10%">Klasifikasi</th>
			<th style="width:10%">Status</th>
			<th style="width:13%">Opsi</th>
		</tr>

		<?php
		if (isset($_POST['ngapus'])) {
			$query2 = mysqli_query($db, "DELETE FROM tgr_buku WHERE no='$_POST[ngapus]'");
			if ($query2) {
				echo "<div class='alert alert-info'>Buku Telah Berhasil Dihapus!</div>";
			}
			else{
				echo "<div class='alert alert-warning'>Maaf Anda Gagal Menghapus Buku</div>";
			}
			header("location:#buku");
		}
		while ($buku = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $buku['no'];?></td>
			<td><?php echo $buku['tanggal'];?></td>
			<td><?php echo $buku['judul'];?></td>
			<td><?php echo $buku['pengarang'];?></td>
			<td><?php echo $buku['penerbit'];?></td>
			<td><?php echo $buku['tahun_terbit'];?></td>
			<td><?php echo $buku['asal'];?></td>
			<td><?php echo $buku['klasifikasi'];?></td>
			<td>
				<?php
				$qq = mysqli_query($db, "SELECT*FROM tgr_peminjaman WHERE no_buku='$buku[no]'");
				$ddqq = mysqli_fetch_array($qq);
				$caripinjam = mysqli_num_rows($qq);
				if ($caripinjam > 0 && $ddqq['status'] !== '1') {
					echo "<button class='btn btn-danger'>Sedang dipinjam</button>";
				}
				else{
					echo "<button class='btn btn-success'>Buku Tersedia</button>";
				}
				?>
			</td>
			<td><form method="post"><a href="./?a=buku&b=ubah&no=<?php echo $buku['no']?>">Update</a><button value="<?php echo $buku['no']?>" type="submit" style="background:none;border:none;" name="ngapus" onclick="return confirm('Hapus Buku: <?php echo $buku["judul"];?>?')">Delete</button></form></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>

