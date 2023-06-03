<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hoja de vida</title>
</head>
<body>
	<div align="center">
		<h1>Hoja de vida de los equipos</h1><br>
		<form action="hojaDeVidaInforme.php" method="post">
			<select name="personal" id="personal" class="chosen-select">
				<option>--Seleccione el usuario--</option>
				<?php
				$selectPersonal = selectPersonal($conn, 0);
				?>
			</select>
			<input type="submit" name="infoH" id="infoH" value="VER INFO">
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
	$consulta ="";
	$consulta2 ="";
	$consulta3 ="";
	if (isset($_POST['infoH'])) {
		$consulta = listaEquiposPorUsuario($_POST['personal']);
		$consulta2 = listaCaracteristicasUsuario($_POST['personal']);
		$consulta3 = revisionesPC($_POST['personal']);
		echo '<script> window.open("infoHojaDeVidaPDF.php"); </script>';
	}
	$_SESSION["consulta"] = $consulta;
	$_SESSION["consulta2"] = $consulta2;
	$_SESSION["consulta3"] = $consulta3;
	?>
</div>
