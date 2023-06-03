<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Cargos</title>
</head>
<body>
<div align="center">
<h1>Creación de Cargos</h1><br>
<form action="crearCargos.php" method="post">
<table>
	<tr>
		<td> <input type="text" name="cargo" id="cargo" placeholder="Cargo"> </td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaCargos.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['cargo'])) {
	$cargo = $_POST['cargo'];

	$crearUsuario = "INSERT INTO cargos (cargo) VALUES ('$cargo')";
	if (mysqli_query($conn, $crearUsuario)) {
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
