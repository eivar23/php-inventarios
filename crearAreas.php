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
	<div class="container">
		<br>
		<h1>Creación de areas</h1>
		<br>
		<div class="crear-area form-crear">
			<form action="crearAreas.php" method="post" class="form">
				<input type="text" name="area" id="area" placeholder="Area" required>
				
				<button type="submit" name="enviar" id="btn-usuario" class="btn btn-Fcrear btn-Fcr">Crear</button>
			</form>
			<a href="listaAreas.php"><button class="btn btn-Fmodificar">Mostrar</button></a>
		</div>

	</div>
</body>
</html>


<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['area'])) {
	$area = $_POST['area'];

	$crearUsuario = "INSERT INTO area (area) VALUES ('$area')";
	if (mysqli_query($conn, $crearUsuario)) {
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-success" role="alert"> Se insetó correctamente</div></div>');
	}else{
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-danger" role="alert"> Error al insertar</div></div>');
			
	}
}
?>