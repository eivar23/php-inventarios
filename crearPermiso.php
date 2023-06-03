<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Permiso</title>
</head>
<body>
<div align="center">
<h1>Creación de permisos en Servidores</h1><br>
<form action="crearPermiso.php" method="post">
<table>
	<tr>
		<td> <input type="text" name="permiso" id="permiso" placeholder="Permiso"> </td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaPermisos.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['permiso'])) {
	$permiso = $_POST['permiso'];

	$crearPermiso = "INSERT INTO Permisos (permiso) VALUES ('$permiso')";
	if (mysqli_query($conn, $crearPermiso)) {
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
