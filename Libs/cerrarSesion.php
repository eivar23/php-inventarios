<?php 
session_start(); 

include ("conexion.php");

$cerrar = cerrarSession();
echo '<script> window.location="../index.php"; </script>';
?>