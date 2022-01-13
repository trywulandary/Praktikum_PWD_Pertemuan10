<div class="container">
	<div class="masuk" style="margin-bottom:28%">
	<center>
	<img src="./tampilan/ikon/logoqa.png" width="200px" height="210px">
	<h3>Login</h3>
	<center> Perpustakaan SD Qurrota A'yun Berbasis Website </center>
<?php
if (isset($_POST['masuk'])) {
	$pass = md5($_POST['pass']);
	$querymsk = mysqli_query($db, "SELECT*FROM tgr_admin WHERE nama = '$_POST[nama]' AND password = '$pass'");
	$cek = mysqli_num_rows($querymsk);
	if (empty($cek)) {
		echo "<div class='alert alert-warning'>Mohon Maaf Nama Atau Password Yang Anda Masukan Salah, Silahkan Coba lagi!</div>";
	}
	else{
		header("location:./");
		$_SESSION['masuk'] = $_POST['nama'];
	}
}
?>
		<form action="" method="post">
			<input type="text" required="" name="nama" placeholder="Nama"><br>
			<input type="password" name="pass" required="" placeholder="Password"><br>

			<tr><td>Captcha</td></tr>
			<tr>
				<td><img src='panggil/captcha.php' /></td>
				<td> : <input name='captcha_code' type='text'></td>
			</tr>
			<br>
			<button type="submit" name="masuk" class="btn btn-primary">Login</button>
			<button type="reset" class="btn btn-primary">Reset</button>
		</form>
		</center>
	</div>
</div>