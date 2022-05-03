<?php
require('fpdf/fpdf.php');
include('config.php');
$id = $_GET['id'];

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Fecha: '.date('d-m-Y').'',0,"R");
$pdf->Ln(14);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(140,10,'Sistema Inventario',1,0);

$query="SELECT * FROM users WHERE firstname='$id'";
$result = mysqli_query($mysqli, $query);
$no=0;
while($row = mysqli_fetch_array($result)){
	$no=$no+1;
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(50,8,'No.',1,0);
	$pdf->Cell(90,8,$no,1,1);
	
	$pdf->Cell(50,8,'ID Producto',1,0);
	$pdf->Cell(90,8,$row['firstname'],1,1);
	
	$pdf->Cell(50,8,'Nombre Producto',1,0);
	$pdf->Cell(90,8,$row['middlename'],1,1);
	
	$pdf->Cell(50,8,'Cantidad',1,0);
	$pdf->Cell(90,8,$row['lastname'],1,1);
	
	$pdf->Cell(50,8,'Fecha de Registro',1,0);
	$pdf->Cell(90,8,$row['birthdate'],1,1);
	
}

$pdf->Output();
?>