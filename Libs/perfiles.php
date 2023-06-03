<?php
session_start();
$usuario = $_SESSION["usuario"];
$perfil = $_SESSION["perfil"];

print($_SESSION["perfil"]);



include ("conexion.php");
$session = validarSessionApp();
$conn = mysqlconn();
if ($perfil == 0 || !isset($_SESSION["perfil"])) {
	$cerrarSession = cerrarSession();
	echo '<script> window.location="../index.php"; </script>';
}elseif ($perfil == 1) {
	echo '<script> window.location="../inicio.php"; </script>';
}elseif ($perfil == 2) {
	echo '<script> window.location="../inicio.php"; </script>';
}elseif ($perfil == 3) {
	echo '<script> window.location="../inicio.php"; </script>';
}

?>
