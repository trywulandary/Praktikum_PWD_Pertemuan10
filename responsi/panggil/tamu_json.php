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
