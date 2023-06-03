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
<br>
<h1>Creación de permisos en Servidores</h1><br>
<div class="crear-permiso form-crear">
	<form action="crearPermiso.php" method="post">
	
	 <input type="text" name="permiso" id="permiso" placeholder="Permiso"> 

		<button type="submit" name="enviar" class="btn btn-Fcrear btn-Fcr">Crear</button>
	</form>
	<a href="listaPermisos.php"><button class="btn btn-Fmodificar">Mostrar</button></a>
</div>
<br><br>
</body>
</html>

<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['permiso'])) {
	$permiso = $_POST['permiso'];

	$crearPermiso = "INSERT INTO Permisos (permiso) VALUES ('$permiso')";
	if (mysqli_query($conn, $crearPermiso)) {
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-success" role="alert"> Se insetó correctamente</div></div>');
	}else{
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-danger" role="alert"> Error al insertar</div></div>');
	}
}
?>
</div>
