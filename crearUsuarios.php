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
<br>
<h1>Creación de Operdores App</h1>
<br>
<div class="crear-usuarios form-crear">
	<form action="crearUsuarios.php" method="post">
		<input type="number" name="id" id="id" placeholder="identificación"> 
		<input type="text" name="usuario" id="usuario" placeholder="Usuario">
		<input type="password" name="clave" id="clave" placeholder="Clave"> 
		<input type="password" name="claveC" id="claveC" placeholder="Confirme la clave"> 
		<input type="text" name="nombre" id="nombre" placeholder="Nombre"> 
		<input type="text" name="apellido" id="apellido" placeholder="apellidos">
	
		<div class="form-group">
			<label for="sede"></label>
			<select name="perfil" id="perfil" class="form-control">
				<option value="">--Seleccione el perfil--</option>
				<option value="1">Administrador</option>
				<option value="2">Operador</option>
				<option value="3">Consultor</option>
			</select>
		</div>

		<button type="submit" name="enviar" class="btn btn-Fcrear">Crear</button>

	</form>
	
	<a href="listaUsuarios.php"><button class="btn btn-Fmodificar">Mostrar</button></a>
</div>

</body>
</html>
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['id']) && !empty($_POST['usuario']) && !empty($_POST['clave']) && !empty($_POST['claveC']) && !empty($_POST['nombre']) && !empty($_POST['perfil'])) {
	$id = $_POST['id'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$claveC = $_POST['claveC'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$perfil = $_POST['perfil'];

	if ($clave == $claveC) {
		$crearUsuario = "INSERT INTO usuario (id,usuario, nombre, apellido, id_perfil,clave)VALUES ('$id','$usuario','$nombre','$apellido', '$perfil', SHA1('$clave'))";
		if (mysqli_query($conn, $crearUsuario)) {
			print('<br><div class="d-flex justify-content-center"><div class="alert alert-success" role="alert"> Se insetó correctamente</div></div>');
		}else{
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-success" role="alert"> Se insetó correctamente</div></div>');
		}
	}else{
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-danger" role="alert"> Las claves no coinciden</div></div>');
	}
}
?>
</div>
