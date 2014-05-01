<?php
session_start();
require('fpdf.php');

include("connect_db.php");
$reg1=$_SESSION['reg'];
$query=" select name from student where reg='$reg1'";
$result=mysql_query($query);
if(!$result)
    echo mysql_error();
$number_of_products = mysql_num_rows($result);

$row = mysql_fetch_array($result);
$name = $row['name'];

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont(Arial, 'B', 20);
$pdf->SetFont(Arial, 'U', 20);
$pdf->Image('logo1.jpg',10,6,190);
$pdf->Ln(20);
$pdf->drawTextBox('', 195, 152, 'C', 'M');
$pdf->SetFont(Arial, 'B', 20);
$pdf->SetXY(55, 35);
$pdf->SetTextColor(220,50,50);
$pdf->Cell(100, 6, "LEAVING CERTIFICATE", 0, 0, 'C');
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont(Times, '', 10);
$pdf->Cell(90);
$pdf->Cell(5, 6, "(provisional)", 0, 0, 'C');
$pdf->Ln(20);
$pdf->SetFont(Times, '', 12);
$pdf->Cell(5, 6, "This is to certify that", 0);
$pdf->Cell(30);
$pdf->Cell(20, 6, "____________________________________________________________________", 0);
$pdf->Cell(10);
$pdf->Cell(5, 6, $name, 0);
$pdf->Ln(10);
$pdf->Cell(5, 6, "of", 0);
$pdf->Cell(1);
$pdf->Cell(20, 6, "___________________________________________________________________________", 0);
$pdf->Cell(-10);
$pdf->Cell(5, 6, 'JSS School Vidyagiri dharwad', 0);
$pdf->Cell(145);
$pdf->Cell(5, 6, "School", 0);
$pdf->Ln(10);
$pdf->Cell(5, 6, "passed the Ministry of Education Primary School Leaving Certificate Examination in the year From", 0);
$pdf->Cell(165);
$pdf->Cell(30, 6, "_______", 0);
$pdf->Cell(-30);
$pdf->Cell(5, 6, '2010-06-01', 0);
$pdf->Ln(10);
$pdf->Cell(5, 6, "to", 0);
$pdf->Cell(1);
$pdf->Cell(10, 6, "_______", 0);
$pdf->Cell(-10);
$pdf->Cell(5, 6, "2012-05-31", 0);
$pdf->Cell(20);
$pdf->Cell(5, 6, "at PASS LEVEL.", 0);
$pdf->Ln(30);
$pdf->SetFont(Arial, 'B', 12);
$pdf->Cell(10);
$pdf->Cell(5, 6, "DATE:", 0);
$pdf->Cell(140);
$pdf->Cell(5, 6, "HEADMASTER", 0);
$pdf->Output();
?>



