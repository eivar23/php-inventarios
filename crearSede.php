<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear sede</title>
</head>
<body>
<div align="center">
<h1>Creación de sede</h1><br>
<form action="crearSede.php" method="post">
<table>
	<tr>
		<td> <input type="text" name="sede" id="sede" placeholder="Sede"> </td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaSedes.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['sede'])) {
	$sede = $_POST['sede'];

	$crearSede = "INSERT INTO sedes (sede) VALUES ('$sede')";
	if (mysqli_query($conn, $crearSede)) {
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
