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
<br>
<h1>Creación de sede</h1><br>
<div class="crear-sede form-crear">
	<form action="crearSede.php" method="post">
	 <input type="text" name="sede" id="sede" placeholder="Sede">
	 <button type="submit" name="enviar" class="btn btn-Fcrear btn-Fcr">Crear</button>
	</form>
	<a href="listaSedes.php"><button class="btn btn-Fmodificar">Mostrar</button></a>
</div>
<br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['sede'])) {
	$sede = $_POST['sede'];

	$crearSede = "INSERT INTO sede(id,sede) VALUES (null,'$sede')";
	if (mysqli_query($conn, $crearSede)) {
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-success" role="alert"> Se insetó correctamente</div></div>');
	}else{
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-danger" role="alert"> Error al insertar</div></div>');
	}
}
?>
</div>
