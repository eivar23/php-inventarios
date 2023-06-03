<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Servidor</title>
</head>
<body>
	<br>
	<h1>Crear Servidor</h1><br>
	<div class="crear-servidor form-crear">
		<form action="crearServidor.php" method="post">

		<input type="text" name="servidor" id="servidor" placeholder="Servidor"> </td>
		<input type="text" name="ip" id="ip" placeholder="ip"> </td>


			<button type="submit" name="enviar" class="btn btn-Fcrear btn-Fcr">Crear</button>
			
		</form>
		<a href="listaServidores.php"><button class="btn btn-Fmodificar">Mostrar</button></a>
	</div>
</body>
</html>

<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['servidor'])&&!empty($_POST['ip'])) {
	$servidor = $_POST['servidor'];
  	$ip = $_POST['ip'];


	$crearServidor = "INSERT INTO servidor(id, servidor, ip) VALUES (null, '$servidor', '$ip')";
	if (mysqli_query($conn, $crearServidor)) {
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-success" role="alert"> Se insetó correctamente</div></div>');
	}else{
		print('<br><div class="d-flex justify-content-center"><div class="alert alert-danger" role="alert">Error al insertar</div></div>');
	}
}
?>
</div>
