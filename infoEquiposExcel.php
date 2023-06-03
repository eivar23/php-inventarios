<?php
session_start();
$usuario = $_SESSION["usuario"];
$consulta = $_SESSION["consulta"];

include ("Libs/conexion.php");

$conn = mysqlconn();

require 'Libs/Classes/PHPExcel.php';
require 'Libs/Classes/PHPExcel/Writer/Excel2007.php';


$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()
        ->setCreator("Códigos de Programación")
        ->setLastModifiedBy("Códigos de Programación")
        ->setTitle("Excel en PHP")
        ->setSubject("Documento de prueba")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("excel phpexcel php")
        ->setCategory("Ejemplos");

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Equipos');

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tipo de equipo');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Marca');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Modelo');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Serial');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Fecha de compra');
$objPHPExcel->getActiveSheet()->setCellValue('F1', '# Activo');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Area');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Usuario');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Sede');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Cargo');

$result=mysqli_query($conn, $consulta);
$i = 1;
while ($row=mysqli_fetch_array($result)) {
$i++;
$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $consulta);
$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $row['tipo']);
$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $row['marca']);
$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $row['modelo']);
$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $row['serial']);
$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $row['fechaCompra']);
$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $row['activo']);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $row['area']);
$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $row['usuario']);
$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $row['sede']);
$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $row['cargo']);
}

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Equipos.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
$objWriter->save('php://output');
?>
