<?php
	// memanggil library FPDF
	require('../fpdf/fpdf.php');
	// intance object dan memberikan pengaturan halaman PDF
	$pdf = new FPDF('l', 'mm', 'A5');
	// membuat halaman baru
	$pdf->AddPage();
	// setting jenis font yang akan digunakan
	$pdf->SetFont('Arial', 'B', 16);
	// mencetak string
	$pdf->Cell(190, 7, 'LAPORAN BUKU TAMU', 0, 1, 'C');
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190, 7, 'DAFTAR HADIR KUNJUNGAN PERPUSTAKAAN', 0, 1, 'C');
	// memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10, 7, '', 0, 1);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 6, 'ID', 1, 0);
	$pdf->Cell(20, 6, 'NAMA', 1, 0);
	$pdf->Cell(30, 6, 'KELAS', 1, 0);
	$pdf->Cell(50, 6, 'KEPERLUAN', 1, 0);
	$pdf->Cell(50, 6, 'TANGGAL', 1, 1);
	// $pdf->Cell(30, 6, 'TANGGAL LHR', 1, 1);
	$pdf->SetFont('Arial', '', 10);
	include 'koneksi.php';
	$data = mysqli_query($con, "select * from tgr_buku_tamu");
	while ($row = mysqli_fetch_array($data)) {
		$pdf->Cell(20, 6, $row['id'], 1, 0);
		$pdf->Cell(20, 6, $row['nama'], 1, 0);
		$pdf->Cell(30, 6, $row['kelas'], 1, 0);
		$pdf->Cell(50, 6, $row['keperluan'], 1, 0);
		$pdf->Cell(50, 6, $row['tanggal'], 1, 1);
		// $pdf->Cell(30, 6,  $row['tgllhr'], 1, 1);
	}
	$pdf->Output();

	