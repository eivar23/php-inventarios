<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear tipo</title>
</head>
<body>
<div align="center">
<h1>Creación de tipos de equipo</h1><br>
<form action="crearTipo.php" method="post">
<table>
	<tr>
		<td> <input type="text" name="tipo" id="tipo" placeholder="Tipo"> </td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaTipos.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['tipo'])) {
	$tipo = $_POST['tipo'];

	$crearTipo = "INSERT INTO tipos (tipo) VALUES ('$tipo')";
	if (mysqli_query($conn, $crearTipo)) {
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
