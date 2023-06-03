<?php
session_start();
$usuario = $_SESSION["usuario"];
$consulta = $_SESSION["consulta"];
$consulta2 = $_SESSION["consulta2"];
$consulta3 = $_SESSION["consulta3"];

include ("Libs/conexion.php");

$conn = mysqlconn();

include 'Libs/fpdf/fpdf.php';

$pdf = new FPDF();
$pdf -> AddPage();

//HEADER
$pdf->Image('Img/logo1.png',10,8,33);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(45);
$pdf->Cell(100,12,'HOJA DE VIDA DE EQUIPOS',1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,4,'Fecha', 1);
$pdf->Ln(4);
$pdf->Cell(145);
$pdf->Cell(40,4,'Version 1', 1);
$pdf->Ln(4);
$pdf->Cell(145);
$pdf->Cell(40,4,'Documento controlado', 1);
$pdf->Ln(20);

$result=mysqli_query($conn, $consulta);
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(185,6,'EQUIPO ASIGNADO A: '.$row['usuario'],1,0);
$pdf->Ln(6);
$pdf->Cell(60,6,'AREA: '.$row['area'], 1);
$pdf->Cell(65,6,'CARGO: '.$row['cargo'], 1);
$pdf->Cell(60,6,'SEDE: '.$row['sede'], 1);
$pdf->Ln(6);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(185,6,'DATOS DEL HARDWARE:',1,0,'C');
$pdf->Ln(6);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'ACTIVO #', 1);
$pdf->Cell(30,6,'EQUIPO', 1);
$pdf->Cell(30,6,'MARCA', 1);
$pdf->Cell(30,6,'MODELO', 1);
$pdf->Cell(65,6,'SERIAL', 1);
$pdf->Ln(6);

$pdf->SetFont('Arial','',10);
$result=mysqli_query($conn, $consulta);
while ($row=mysqli_fetch_array($result)) {
	$pdf->Cell(30,6,$row['activo'], 1);
	$pdf->Cell(30,6,$row['tipo'], 1);
	$pdf->Cell(30,6,$row['marca'], 1);
	$pdf->Cell(30,6,$row['modelo'], 1);
	$pdf->Cell(65,6,$row['serial'], 1);
	$pdf->Ln(6);
}
$pdf->Ln(10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(185,6,'DATOS DEL PC:',1,0,'C');
$pdf->Ln(6);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,6,'EQUIPO', 1);
$pdf->Cell(40,6,'NOMBRE', 1);
$pdf->Cell(50,6,'PROCESADOR', 1);
$pdf->Cell(35,6,'MEMORIA', 1);
$pdf->Cell(25,6,'DISCO DURO', 1);
$pdf->Ln(6);

$pdf->SetFont('Arial','',10);
$result=mysqli_query($conn, $consulta2);
while ($row=mysqli_fetch_array($result)) {
	$pdf->Cell(35,6,$row['tipo'], 1);
	$pdf->Cell(40,6,$row['nombre'], 1);
	$pdf->Cell(50,6,$row['procesador'], 1);
	$pdf->Cell(35,6,$row['memoria'], 1);
	$pdf->Cell(25,6,$row['discoDuro'], 1);
	$pdf->Ln(6);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(40,6,'SISTEMA OPERATIVO', 1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(50,6,$row['sistemaOperativo'], 1);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(40,6,'LICENCIA', 1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(55,6,$row['licencia'], 1);
	$pdf->Ln(6);
}
$pdf->Ln(10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(185,6,'ULTIMA REVISION:',1,0,'C');
$pdf->Ln(6);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,6,'FECHA', 1);
$pdf->Cell(135,6,'REVISION', 1);
$pdf->Ln(6);

$pdf->SetFont('Arial','',10);
$result=mysqli_query($conn, $consulta3);
$row=mysqli_fetch_array($result);

$pdf->Cell(50,6,$row['fecha'],1);
$pdf->MultiCell(135,6,$row['revision'],1);
$pdf->Ln(40);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(50,6,'_____________________________');
$pdf->Cell(55);
$pdf->Cell(50,6,'_____________________________');
$pdf->Ln(5);

$pdf->Cell(10);
$pdf->Cell(50,6,'Recibido por:');
$pdf->Cell(55);
$pdf->Cell(50,6,'Entregado por:');

$pdf->SetFont('Arial','',10);
$pdf -> Output();
?>
