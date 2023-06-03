<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear areas</title>
</head>
<body>
<div align="center">
<h1>Creación de areas</h1><br>
<form action="crearAreas.php" method="post">
<table>
	<tr>
		<td> <input type="text" name="area" id="area" placeholder="Area"> </td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaAreas.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['area'])) {
	$area = $_POST['area'];

	$crearUsuario = "INSERT INTO areas (area) VALUES ('$area')";
	if (mysqli_query($conn, $crearUsuario)) {
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
