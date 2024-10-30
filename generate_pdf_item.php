<?php
require('../fpdf/fpdf.php');
include('../config/database.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Item List', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    function LoadData($conn)
    {
        $data = array();
        $sql = "SELECT * FROM item";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function FancyTable($header, $data)
    {
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $col) {
            $this->Cell(30, 7, $col, 1);
        }
        $this->Ln();
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            $this->Cell(30, 6, $row['kodeitem'], 1);
            $this->Cell(30, 6, $row['nama'], 1);
            $this->Cell(30, 6, $row['hargabeli'], 1);
            $this->Cell(30, 6, $row['hargajual'], 1);
            $this->Cell(30, 6, $row['stok'], 1);
            $this->Cell(30, 6, $row['satuan'], 1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$header = array('Kode Item', 'Nama', 'Harga Beli', 'Harga Jual', 'Stok', 'Satuan');
$data = $pdf->LoadData($conn);
$pdf->AddPage();
$pdf->FancyTable($header, $data);
$pdf->Output();
?>
