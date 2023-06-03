<?php
//conecta con la base de datos
function mysqlconn(){
	$server='localhost';
	$user='root';
	$pass='';
	$db='inventario_gyg';
	$conectID = mysqli_connect($server,$user,$pass,$db);
	if (!$conectID) {
		echo "No funciona la conexion";
	}
	return $conectID;
}

//valida si el usuario esta logueado en la pagina de inicio
function validarSessionIndex(){
	if (isset($_SESSION['usuario'])) {
		echo '<script> window.location="Libs/perfiles.php"; </script>';
	}
}

//valida si el usuario esta logueado dentro de la aplicacion
function validarSessionApp(){
	if (!isset($_SESSION['usuario'])) {
		echo '<script> window.location="../index.php"; </script>';
	}
}

//cierra sesion
function cerrarSession(){
	session_destroy();
}
?>
