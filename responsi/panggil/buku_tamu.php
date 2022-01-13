<?php
echo
// Buat Tabel form untuk menambahkan data user yang masuk ke database.
"<h2>User</h2>
    <form method=POST action=form_user.php>
        <input type=submit value='Tambah User'>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Keperluan</th>
            <th>Tanggal</th>
        </tr>";
// panggil koneksi.php untuk mengambil data dari mysql
include "koneksi.php";
// ambil semua data dari tabel user berdasarkan id
$sql = "SELECT * FROM tgr_buku_tamu ORDER BY id";
// panggil proses query
$tampil = mysqli_query($con, $sql);
// tampilkan data berdasarkan baris jika lebih dari 0 maka tampilkan data
if (mysqli_num_rows($tampil) > 0) {
    $no = 1;
    // panggil fungsi perulangan while dan ubah data menjadi array
    while ($r = mysqli_fetch_array($tampil)) {
        echo
        // buat tabel untuk menampilkan data dari tabel users
        "<tr>
                <td>$no</td>
                <td>$r[id]</td>
                <td>$r[nama]</td>
                <td>$r[kelas]</td>
                <td>$r[keperluan]</td>
                <td>$r[tanggal]</td>
                <td>
                    <a href='hapus_user.php?id=$r[id]'>Hapus</a>
                </td>
            </tr>";
        $no++;
    }
    echo "</table>";
} else {
    echo "0 results";
}
// tutup proses msyqli


mysqli_close($con);