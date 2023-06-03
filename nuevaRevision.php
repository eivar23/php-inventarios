<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nueva revisión</title>
</head>
<body>
<div align="center">
	<h1>Agregar revisión</h1><br>
	<form action="nuevaRevision.php" method="post">
		<input type="" name="equipo" id="equipo" value= <?php echo $_POST['equipo']; ?> style="display: none;">

		<input type="date" name="fecha" id="fecha">
		<br><br>
		<textarea name="revision" id="revision"></textarea>
		<br><br>
		<input type="submit" name="enviar" id="enviar" value="AGREGAR">
	</form>
</div>
</body>
</html>

<br>
<div align="center">
	<?php
	if (!empty($_POST['equipo']) && !empty($_POST['fecha']) && !empty($_POST['revision'])) {
		$equipo = $_POST['equipo'];
		$fecha = $_POST['fecha'];
		$revision = $_POST['revision'];

		$nuevaRevision = "INSERT INTO revisiones (idEquipo, fecha, revision) VALUES ('$equipo', '$fecha', '$revision')";
		if (mysqli_query($conn, $nuevaRevision)) {
			echo "Se agrego la revision";
		}else{
			echo "Error al insertar";
		}
	}
	?>
</div>
