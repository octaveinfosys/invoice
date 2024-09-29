<?php

//include connection file 
include "DB.php";
include_once('fpdf/fpdf.php');
$vgl_report_no = 23;

class PDF extends FPDF {

    function Header() {
        //Put the watermark
        $this->SetFont('Arial', 'B', 50);
        $this->SetTextColor(255, 192, 203);
        //$this->RotatedText(35, 190, 'W a t e r m a r k   d e m o', 45);
    }

    function RotatedText($x, $y, $txt, $angle) {
        //Text rotated around its origin
        //$this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        //$this->Rotate(0);
    }

}

$display_heading1 = array('vgl_report_no' => 'VGL REPORT NO.', 'date' => 'DATE', 'shape_style' => 'SHAPE STYLE', 'measurement' => 'MEASUREMENT');

//Landscape
//$pdf = new PDF('L');
//$pdf = new FPDF('P','mm',array(210,150));
$pdf = new PDF('P');
//header
$pdf->SetTitle('VGL Report');
$pdf->AddPage();
$qr_code_url = 'https://vellocity.in/verify-report?vgl_report_no=' . $vgl_report_no;
// Logo
//$pdf->Image('vlogo.png', 77, 10, 65);
//$pdf->Image("https://vellocity.in/generate_qrcode.php?code=$qr_code_url", 110, 117, 25, 25, "jpg");
$pdf->Image("https://octaveinfosys.com/assets1/img/logo.png", 110, 117, 25, 25, "png");
//$pdf->Image("https://vellocity.in/generate_qrcode.php?code=$qr_code_url");

$pdf->AddFont('Merriweather', '', 'Merriweather.php');
// Move to the right
$pdf->Cell(80);
// Title
$pdf->SetFont('Merriweather', '', 10);
$pdf->Cell(80, 15, 'VGL REPORT NO.', 0, 0, 'R');
$pdf->SetFont('Merriweather', '', 10);
$pdf->Ln(0);
$pdf->Cell(151, 25, $vgl_report_no, 0, 0, 'R');
//$pdf->Rect(5, 5, 100, 140, 'D');
//$pdf->Rect(105, 5, 100, 140, 'D');
// Line break
$pdf->Ln(40);
//foter page
$pdf->AliasNbPages();

$pdf->AddFont('Merriweather', '', 'Merriweather.php');
$pdf->SetFont('Merriweather', '', 8);
//font color
//$pdf->SetTextColor(0,0,255);
$pdf->SetY(29);
$pdf->SetFillColor(125, 111, 108);
$pdf->Cell(90, 10, 'VGL NATURAL DIAMOND', 0, 0, 'C', 'true');
$pdf->Cell(11);
$pdf->Cell(90, 10, 'DIAMOND PROPORTION', 0, 0, 'C', 'true');
$pdf->Ln();
//$pdf->Rect(112, 45, 88, 52, 'D');

//$pdf->Image('vlogo.png', 180, 80, 80);

$pdf->SetFont('Merriweather', '', 8);
$pdf->SetFillColor(224, 220, 217);
$pdf->SetTextColor(0, 0, 0);





$pdf->Output();
