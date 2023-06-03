<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cambio Equipo</title>
</head>
<body>
	<div align="center">
		<h1>Cambio de equipo</h1><br>
		<form action="cambioPersonal.php" method="post">
			<table>
				<tr>
					<td>Fecha de cambio</td>
					<td><input type="date" name="fecha" id="fecha"><br></td>
				</tr>
				<tr>
					<td>Usuario Nuevo</td>
					<td>
						<select name="personal" id="personal" class="chosen-select">
							<option>--Seleccione el usuario--</option>
							<?php
							$selectPersonal = selectPersonal($conn, 0);
							?>
						</select>
					</td>
				</tr>
			</table><br>
			<input type="" name="personalAnt" id="personalAnt" value= <?php echo $_POST['personalAnt']; ?> style="display: none;">
			<input type="" name="equipo" id="equipo" value= <?php echo $_POST['equipo']; ?> style="display: none;">
			<input type="submit" name="usuario" id="usuario" value="CAMBIO">
		</form>
	</div>

	<!--SELECT CHOSEN-->
	<script src="Libs/chosen/chosen.jquery.js" type="text/javascript"></script>
	<script src="Libs/chosen/init.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

<br>
<div align="center">
	<?php
	if (!empty($_POST['personal']) && !empty($_POST['equipo']) && !empty($_POST['equipo'])) {
		$personal = $_POST['personal'];
		$personalAnt = $_POST['personalAnt'];
		$equipo = $_POST['equipo'];
		$fecha = $_POST['fecha'];

		$cambioEquipo = "UPDATE equipos SET idUsuario = '$personal' WHERE id = '$equipo'";
		if (mysqli_query($conn, $cambioEquipo)) {
			$cambio = "INSERT INTO cambioEquipos (fechaCambio, idUsuarioAnt, idUsuarioNue, idEquipo) VALUES ('$fecha', '$personalAnt', '$personal', '$equipo')";
			if (mysqli_query($conn, $cambio)) {
				echo "Se cambio el equipo de usuario";
			}
		}else{
			echo "Error al insertar";
		}
	}
	?>
</div>
