<?php 

require('assets/Fpdf/fpdf.php');

$connect = mysqli_connect('localhost', 'root', '', 'fotografi');

$pdf = new FPDF('L', 'mm', 'A4');
$pdf -> AddPage();
$pdf -> SetFont('Times', 'B', 14);
$pdf -> Cell(280, 10, 'DATA PEMESANAN JASA', 0, 0, 'C');
$pdf -> Cell(10, 15, '', 0, 1);
$pdf -> SetFont('Times', 'B', 10);
// $pdf -> Cell(10, 7, 'ID', 1, 0, 'C');
// $pdf -> Cell(50, 7, 'NAMA', 1, 0, 'C');
// $pdf -> Cell(30, 7, 'No HP', 1, 0, 'C');
// $pdf -> Cell(35, 7, 'Tim', 1, 0, 'C');
// $pdf -> Cell(50, 7, 'Layanan', 1, 0, 'C');
// $pdf -> Cell(45, 7, 'Alamat', 1, 0, 'C');
$pdf -> SetFont('Times', '', 10);

$data = mysqli_query($connect, "SELECT * FROM pemesanan");
$y = 40; // Menentukan posisi vertikal awal

$pdf->SetXY(10, $y); // Mengatur posisi awal tabel
$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 7, 'ID', 1, 0, 'C');
$pdf->Cell(50, 7, 'NAMA', 1, 0, 'C');
$pdf->Cell(30, 7, 'No HP', 1, 0, 'C');
$pdf->Cell(35, 7, 'Tim', 1, 0, 'C');
$pdf->Cell(50, 7, 'Layanan', 1, 0, 'C');
$pdf->Cell(45, 7, 'Alamat', 1, 0, 'C');

$y += 7; // Menambahkan posisi vertikal untuk selanjutnya

foreach ($data as $key => $value) {
    $pdf->SetXY(10, $y); // Mengatur posisi x dan y
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(10, 6, $key + 1, 1, 0, 'C');
    $pdf->Cell(50, 6, $value['nama'], 1, 0);
    $pdf->Cell(30, 6, $value['no_hp'], 1, 0);
    $pdf->Cell(35, 6, $value['tim'], 1, 0);
    $pdf->Cell(50, 6, $value['layanan'], 1, 0);
    $pdf->Cell(45, 6, $value['alamat'], 1, 0);

    $y += 6; // Menambahkan posisi vertikal untuk selanjutnya
}

$pdf->Output();


?>