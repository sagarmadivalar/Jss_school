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
    $this->drawTextBox('', 190, 252, 'C', 'M');
    $this->SetXY(20, 10);
    $this->Ln(20);
    $this->setFont('Arial','',8);
    $this->SetTextColor(0,0,0);
    $this->Cell(39);
    $this->Cell(100,6,'ONLINE APPLICATION FOR SCHOOL ADMISSION',0,0,'C');
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
function BasicTable1($header,$data)
{
    $this->SetFont('Arial','B',10);
    $this->SetX(12);
    foreach($header as $col)
        $this->Cell(40,7,$col,1,0,'L');
    $this->Ln();
    $this->SetFont('Times','',10);
    // Data
    foreach($data as $row)
    {
        $this->SetX(12);
        foreach($row as $col)
            $this->Cell(40,6,$col,1,0,'L');
        $this->Ln();
       
    }
}
function appTitle($label)
{
    // Title
   // $this->SetTextColor(255, 255, 255);
    $this->SetX(11);
    $this->SetFillColor(200,220,255);
    $this->Cell(0,6,"$label",0,1,'C',true);
    $this->Ln(10);
    // Save ordinate
    $this->y0 = $this->GetY();
}

}

$pdf = new PDF();
//$pdf=new PDF_TextBox();
// Column headings
//$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
   $label="This online application is povisional subject to payment of application fees/ intimation charges";
   $label2="Declaration:";
   $label3="I hereby declare that all statements made in this application are true. complete and correct to the best of my knowledge and belief. I understand that";
$l4="in the event of any information being found untrue or incorrect at any stage or my not satisfying any of the eligibility criteria, my candidature is liable to cancelled.";
$l5="Place:";
$l6="Date:";
$sig="Signature";
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','B',8);
$pdf->AddPage();
$pdf->appTitle($label);
//$pdf->drawTextBox('', 190, 280, 'C', 'M');
//$this->SetXY($this->GetX(),$this->GetY());
$pdf->SetFont('Times','',10);
$pdf->BasicTable($data);
$header = array('Subjects', 'Marks(MAX)', 'Marks_secured', 'Result');
$data = $pdf->LoadData('marks.txt');
$pdf->ln(10);
$pdf->BasicTable1($header,$data);
$pdf->ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 6, $label2);
$pdf->ln();
$pdf->SetFont('Times', '', 8);
$pdf->Cell(20);
$pdf->Cell(40, 4, $label3);
$pdf->ln();
$pdf->Cell(40, 4, $l4);
$pdf->ln(20);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 4, $l5);
$pdf->ln(30);
$pdf->Cell(40, 4, $l6);
$pdf->Cell(120);
$pdf->Cell(40, 4, $sig);
$pdf->ln(20);
$pdf->Cell(10, 4, "Attachments:");
$pdf->SetFont('Times', '', 10);
$pdf->ln(10);
$pdf->Cell(10, 4, "Birth Certificate of the Applicant or previous year transfer certificate.");
$pdf->ln(7);
$pdf->Cell(10, 4, "Caste Certificate.");
$pdf->ln(7);
$pdf->Cell(10, 4, "Parents Income Certificate.");
$pdf->ln(7);
$pdf->Cell(10, 4, "Prevous Year Marks List.");
$pdf->Output();
?>

