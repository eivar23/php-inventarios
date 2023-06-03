<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Operadores App</title>
</head>
<body>
<div align="center">
<h1>Creación de Operdores App</h1><br>
<form action="crearUsuarios.php" method="post">
<table>
	<tr>
		<td> <input type="text" name="usuario" id="usuario" placeholder="Usuario"> </td>
	</tr>
	<tr>
		<td> <input type="password" name="clave" id="clave" placeholder="Clave"> </td>
	</tr>
	<tr>
		<td> <input type="password" name="claveC" id="claveC" placeholder="Confirme la clave"> </td>
	</tr>
	<tr>
		<td> <input type="text" name="nombre" id="nombre" placeholder="Nombre"> </td>
	</tr>
	<tr>
		<td>
			<select name="perfil" id="perfil">
				<option value="">--Seleccione el perfil--</option>
				<option value="1">Administrador</option>
				<option value="2">Operador</option>
				<option value="3">Consultor</option>
			</select>
		</td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaUsuarios.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['usuario']) && !empty($_POST['clave']) && !empty($_POST['claveC']) && !empty($_POST['perfil'])) {
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$claveC = $_POST['claveC'];
	$nombre = $_POST['nombre'];
	$perfil = $_POST['perfil'];

	if ($clave == $claveC) {
		$crearUsuario = "INSERT INTO usuarios (usuario, clave, nombre, perfil)VALUES ('$usuario', SHA1('$clave'), '$nombre', '$perfil')";
		if (mysqli_query($conn, $crearUsuario)) {
			print("Se inserto correctamente");
		}else{
			print("Error al insertar");
		}
	}else{
		echo "Las claves no coinciden";
	}
}
?>
</div>
