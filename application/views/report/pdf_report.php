<?php
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->SetTitle("Laporan Sample In", 1);

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(275, 7, 'PT SELAMAT SEMPURNA', 0, 1, 'C');
$pdf->Image(base_url() . "assets/img/logo.jpeg", 10, 10, 25, 0, 'JPEG');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(275, 7, 'LAPORAN DATA SAMPLE IN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(275, 7, 'Sample In Produk Periode Tanggal ' . date_indo($tgl1) . ' Sampai Tanggal ' . date_indo($tgl2), 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 6, 'NO PERMINTAAN', 1, 0);
$pdf->Cell(27, 6, 'DATE IN', 1, 0);
$pdf->Cell(40, 6, 'SALES', 1, 0);
$pdf->Cell(55, 6, 'CUSTOMER', 1, 0);
$pdf->Cell(40, 6, 'PART NO', 1, 0);
$pdf->Cell(40, 6, 'PERMINTAAN', 1, 0);
$pdf->Cell(15, 6, 'QTY', 1, 0);
$pdf->Cell(20, 6, 'STATUS', 1, 1);
$pdf->SetFont('Arial', '', 10);
foreach ($result as $key) {
    $pdf->Cell(40, 6, $key->noPermintaan, 1, 0);
    $pdf->Cell(27, 6, mediumdate_indo($key->tanggal), 1, 0);
    $pdf->Cell(40, 6, $key->nama, 1, 0);
    $pdf->Cell(55, 6, $key->customer, 1, 0);
    $pdf->Cell(40, 6, $key->partNo, 1, 0);
    $pdf->Cell(40, 6, $key->permintaan, 1, 0);
    $pdf->Cell(15, 6, $key->qty, 1, 0);
    $pdf->Cell(20, 6, $key->status, 1, 1);
}
$pdf->ln();
$pdf->ln();
$pdf->Cell(217, 6, '', 0, 0);
$pdf->Cell(60, 6, 'Tangerang, ' . date_indo(date('Y-m-d')), 0, 1, 'C');
$pdf->Cell(217, 6, '', 0, 0);
$pdf->Cell(60, 6, 'Mengetahui,', 0, 1, 'C');
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(217, 6, '', 0, 0);
$pdf->Cell(60, 6, 'Manajer', 'T', 1, 'C');
$pdf->Output();
