<?php
session_start();
require('fpdf.php');

include("connect_db.php");
$reg1=$_SESSION['reg'];
$query="select s.name, nationality, DOB, prev_std, std from registration r, student s where s.reg='$reg1' and s.rid=r.rid";
$result=mysql_query($query);
if(!$result)
    echo mysql_error();
$number_of_products = mysql_num_rows($result);

$row = mysql_fetch_array($result);

$name = $row['name'];
$nationality = $row['nationality'];
$dob = $row['DOB'];
$pstd = $row['prev_std'];
$doj = "2006-06-02";
$std = $row['std'];
$dol = "2013-04-30";
$schoolName = "JSS";
$lda = "";
$result = "pass";
$ppc = "10";
$year1 = "2013";
$dic = "";
$year2 = "";
$obser = "good";

mysql_close();

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont(Arial, 'B', 20);
$pdf->SetFont(Arial, 'U', 20);
$pdf->Image('logo1.jpg',10,6,190);
$pdf->Ln(20);
$pdf->drawTextBox('', 190, 252, 'C', 'M');
$pdf->SetFont(Arial, 'B', 20);
$pdf->SetXY(55, 35);
$pdf->SetTextColor(220,50,50);
$pdf->Cell(100, 6, "TRANSFER CERTIFICATE", 0, 0, 'C');
$pdf->Ln(20);
$pdf->SetFont(Times, '', 12);
$pdf->SetX(40);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(5, 6, "1.  Name of the Student:", 0, 0, 'C');
$pdf->Cell(120, 6, "______________________________________", 0, 0, 'C');
$pdf->Cell(-150, 6, $name, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(33);
$pdf->Cell(5, 6, "2.  Nationality:", 0, 0, 'C');
$pdf->Cell(120, 6, "______________________________________", 0, 0, 'C');
$pdf->Cell(-150, 6, $nationality, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(35);
$pdf->Cell(5, 6, "3.  Date of Birth:", 0, 0, 'C');
$pdf->Cell(120, 6, "______________________________________", 0, 0, 'C');
$pdf->Cell(-150, 6, $dob, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(53);
$pdf->Cell(5, 6, "4.  Class to whic he/she was admitted:", 0, 0, 'C');
$pdf->Cell(90, 6, "___________", 0, 0, 'C');
$pdf->Cell(-100, 6, $pstd, 0, 0, 'C');
$pdf->Cell(75);
$pdf->Cell(5, 6, "  Year:", 0, 0, 'C');
$pdf->Cell(30, 6, "___________", 0, 0, 'C');
//$pdf->Cell(100);
$pdf->Cell(-20, 6, $doj, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(39);
$pdf->Cell(5, 6, "5.  The present Class:", 0, 0, 'C');
$pdf->Cell(60, 6, "___________", 0, 0, 'C');
$pdf->Cell(-70, 6, $std, 0, 0, 'C');
$pdf->Cell(88);
$pdf->Cell(5, 6, "  Year:", 0, 0, 'C');
$pdf->Cell(30, 6, "___________", 0, 0, 'C');
$pdf->Cell(-20, 6, $dol, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(36);
$pdf->Cell(5, 6, "6.  School Name:", 0, 0, 'C');
$pdf->Cell(120, 6, "______________________________________", 0, 0, 'C');
$pdf->Cell(-150, 6, $schoolName, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(56);
$pdf->Cell(5, 6, "7.  Last date of Attendance in the school:", 0, 0, 'C');
$pdf->Cell(99, 6, "________________", 0, 0, 'C');
$pdf->Cell(-100, 6, $lda, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(58);
$pdf->Cell(5, 6, "8.  Result at the end of the Academic Year:", 0, 0, 'C');
$pdf->Cell(102, 6, "________________", 0, 0, 'C');
$pdf->Cell(-110, 6, $result, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(53);
$pdf->Cell(5, 6, "(a).  Passed and Promoted to Class:", 0, 0, 'C');
$pdf->Cell(80, 6, "___________", 0, 0, 'C');
$pdf->Cell(-80, 6, $ppc, 0, 0, 'C');
$pdf->Cell(70);
$pdf->Cell(5, 6, "  for the academic Year:", 0, 0, 'C');
$pdf->Cell(63, 6, "___________", 0, 0, 'C');
$pdf->Cell(-70, 6, $year1, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(46);
$pdf->Cell(5, 6, "(b).  Detained in the Class:", 0, 0, 'C');
$pdf->Cell(80, 6, "___________", 0, 0, 'C');
$pdf->Cell(-80, 6, $dic, 0, 0, 'C');
$pdf->Cell(70);
$pdf->Cell(5, 6, "  for the academic Year:", 0, 0, 'C');
$pdf->Cell(63, 6, "___________", 0, 0, 'C');
$pdf->Cell(-70, 6, $year2, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetX(42);
$pdf->Cell(5, 6, "9.  Observations if any:", 0, 0, 'C');
$pdf->Cell(120, 6, "______________________________________", 0, 0, 'C');
$pdf->Cell(-150, 6, $obser, 0, 0, 'C');
$pdf->Ln(30);
$pdf->SetX(20);
$pdf->SetFont(Arial, 'B', 12);
$pdf->Cell(5, 6, "HEADMASTER/PRINCIPLE/DIRECTOR", 0);
$pdf->Ln(10);
$pdf->SetX(20);
$pdf->SetFont(Times, '', 12);
$pdf->Cell(5, 6, "Name:", 0);
$pdf->Ln(10);
$pdf->SetX(20);
$pdf->Cell(5, 6, "Signature:", 0);
$pdf->Cell(130);
$pdf->SetFont(Arial, 'B', 12);
$pdf->Cell(5, 6, "SCHOOL STAMP", 0);

$pdf->Output();
?>