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
	<br>
	<h1>Creación de Cargos</h1>
	<br>
	<div class="crear-cargo form-crear">
		<form action="crearCargos.php" method="post">
			

			<select class="form-control" id="ar2" name="ar2">
				<option>Seleccione el area</option>
				<?php $selectArea = selectArea($conn, 0);?>
			</select>

			<input type="text" name="cargo" id="cargo" placeholder="Cargo">
			

				<button type="submit" name="enviar" id="btn-usuario" class="btn btn-Fcrear btn-Fcr">Crear</button>
			
		</form>
		<a href="listaCargos.php"><button class="btn btn-Fmodificar">Mostrar</button></a>
	</div>
</body>
</html>

<?php
error_reporting(E_ALL ^ E_NOTICE);


if (!empty($_POST['cargo']) && !empty($_POST['ar2'])) {
	$cargo = $_POST['cargo'];
	$area = $_POST['ar2'];

	$crearUsuario = "INSERT INTO cargo VALUES (null,'$cargo')";	 
	if (mysqli_query($conn, $crearUsuario)) {

		$id_cargo = "SELECT id FROM cargo";
		$result = mysqli_query($conn, $id_cargo);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row['id'];
		}
		$crearUsuario = "INSERT INTO cargo_area VALUES ('$id','$area')";
		if (mysqli_query($conn, $crearUsuario)) {
			print('<br><div class="d-flex justify-content-center"><div class="alert alert-success" role="alert"> Se insetó correctamente</div></div>');
			
		}else{
			print('<br><div class="d-flex justify-content-center"><div class="alert alert-danger" role="alert"> Error al insertar</div></div>');
		}

	}
	
}
?>

