<?php
require('fpdf.php');
require('textbox.php');

class PDF extends FPDF
{

function Header()
{
    // Logo

    $this->Image('logo1.jpg',10,6,190);
    $this->Ln(20);
    $this->drawTextBox('', 190, 200, 'C', 'M');
    $this->SetXY(20, 10);
    $this->Ln(20);
    $this->setFont('Arial','',8);
    $this->SetTextColor(0,0,0);
    $this->Cell(39);
    $this->Ln(10);
}
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($data)
{

    // Data
    foreach($data as $row)
    {
        $i=1;
        $this->Cell(50);
        foreach($row as $col)
           {
            if($i==1)
                {
                $this->SetFont('Times', 'B', 10);
                $i++;
            }
            else
               $this->SetFont('Times', '', 10);
            $this->Cell(40,6,$col,0);
        }
        $this->Ln();
        $this->Ln();
    }
}
}
$pdf = new PDF();
$data = $pdf->LoadData('m1.txt');
$pdf->SetFont('Arial','U',20);
$pdf->AddPage();
$pdf->Cell(100);
$pdf->Cell(6, 6, 'MARKS DETAILS', 0, 0, 'C');
$pdf->Ln(20);
$pdf->SetFont('Arial','',10);
$pdf->BasicTable($data);
$pdf->Output();
?>

