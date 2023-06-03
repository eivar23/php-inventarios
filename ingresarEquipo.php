<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ingresar equipo
	</title>
	<style type="text/css">
	</style>
</head>
<body>
		<h1>Ingresar Equipo</h1><br>
		<form action="ingresarEquipo.php" method="post">
			
					Usuario
						<select name="personal" id="personal" class="chosen-select">
							<option>--Seleccione el usuario--</option>
							<?php
							$selectPersonal = selectPersonal($conn, 0);
							?>
						</select>
				
					Activo
						<input type="text" name="activo" id="activo">
					
				
					Marca
					
					<input type="text" name="marca" id="marca">
					Modelo
					
						<input type="text" name="modelo" id="modelo">
					
					Serial
						<input type="text" name="serial" id="serial">
					Fecha de compra
						<input type="date" name="fechaCompra" id="fechaCompra">
				<br> <b>Caracteristicas</b></td>
				
					Nombre
					
						<input type="text" name="nombre" id="nombre">
					
					Procesador
					
					<input type="text" name="procesador" id="procesador">
					Memoria
					<input type="text" name="memoria" id="memoria">
					
					Disco Duro					
						<input type="text" name="discoDuro" id="discoDuro">
				
					Sistema Operativo
						<input type="text" name="sOperativo" id="sOperativo">
					Licencia
						<input type="text" name="licencia" id="licencia">
					
			<br>
			<input type="submit" name="ENVIAR">
		</form>

	<!--SELECT CHOSEN-->
	<script src="Libs/chosen/chosen.jquery.js" type="text/javascript"></script>
	<script src="Libs/chosen/init.js" type="text/javascript" charset="utf-8"></script>
	</div>
</body>
</html>

<br>
<div align="center">
	<?php
	if (!empty($_POST['personal']) && !empty($_POST['activo']) && !empty($_POST['tipo']) && !empty($_POST['marca']) && !empty($_POST['modelo'])) {

		$personal = $_POST['personal'];
		$activo = $_POST['activo'];
		$tipo = $_POST['tipo'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$serial = $_POST['serial'];
		$fechaCompra = $_POST['fechaCompra'];

		$nombre = $_POST['nombre'];
		$procesador = $_POST['procesador'];
		$memoria = $_POST['memoria'];
		$discoDuro = $_POST['discoDuro'];
		$sOperativo = $_POST['sOperativo'];
		$licencia = $_POST['licencia'];

			$equipo = "INSERT INTO equipos
			(idUsuario, activo, idTipo, marca, modelo, serial, fechaCompra)
			VALUES
			('$personal', '$activo', '$tipo', '$marca', '$modelo', '$serial', '$fechaCompra')";
			if (mysqli_query($conn, $equipo)) {
				$id = "SELECT MAX(id) as id FROM equipos WHERE 1";
				$result = mysqli_query($conn, $id);
				$row = mysqli_fetch_array($result);
				$caracteristicas = "INSERT INTO `caracteristicas`
				(idEquipo, nombre, procesador, memoria, discoDuro, sistemaOperativo, licencia)
				VALUES
				('".$row['id']."','$nombre', '$procesador', '$memoria', '$discoDuro', '$sOperativo', '$licencia')";
				if (mysqli_query($conn, $caracteristicas)) {
					$fecha = date("Y-m-d");
					$primerRevision = "INSERT INTO `revisiones`
					(idEquipo, fecha, revision)
					VALUES
					('".$row['id']."','$fecha', 'Equipo ingresado al sistema')";
					if (mysqli_query($conn, $primerRevision)) {
						// code...
						echo "Se inserto el equipo correctamente";
					}else {
						echo "Error al insertar ( revisión)";
					}
				}
			}else{
				echo "Error al insertar (caracteristicas)";
			}

	}
	?>
</div>
