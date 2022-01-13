<?php
session_start();
// panggil koneksi.php untuk mengambil data dari mysql
include "../Pertemuan3pwd/koneksi.php";
// Ambil data dan kirimkan data yang terdiri dari id, password untuk melakukan pengecekan
$id_user = $_POST['id_user'];
$pass = md5($_POST['paswd']);
// ambil data berdasarkan id dan password dari tabel users untuk melakukan pengecekan pada database
$sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
    // panggil proses query
    $login = mysqli_query($con, $sql);
    // buat query menjadi baris
    $ketemu = mysqli_num_rows($login);
    // ubah data query menjadi array
    $r = mysqli_fetch_array($login);
    // jika data > 0 atau ternyata data tersebut ada maka tampilkan data dibawah
    if ($ketemu > 0) {
        // lakukan session untuk menampilkan informasi data user
        $_SESSION['iduser'] = $r['id_user'];
        $_SESSION['passuser'] = $r['password'];
        // tampilkan data dibawah
        echo "USER BERHASIL LOGIN<br>";
        echo "id user =", $_SESSION['iduser'], "<br>";
        echo "password=", $_SESSION['passuser'], "<br>";
        echo "<a href=logout.php><b>LOGOUT</b></a></center>";
        // jika data tida ada atau 0
    } else {
        echo "<center>Login gagal! username & password tidak benar<br>";
        echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
    }
    mysqli_close($con);
} else {
    echo "<center>Login gagal! Captcha tidak sesuai!<br>";
    echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
}
