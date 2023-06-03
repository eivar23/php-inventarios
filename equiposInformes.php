<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Equipos informe</title>
</head>
<body>
<div align="center">
	<h1>Informe de equipos</h1><br>
	<form action="equiposInformes.php" method="post">
		<table>
			<tr>
				<td>Informe general</td>
				<td></td>
				<td>
					<input type="submit" name="infoG" value="VER INFO">
				</td>
			</tr>
			<tr>
				<td>Informe por area</td>
				<td>
					<select name="area" id="area" class="chosen-select">
						<option>--Seleccione el area--</option>
						<?php
						$selectArea = selectArea($conn, 0);
						?>
					</select>
				</td>
				<td>
					<input type="submit" name="infoA" value="VER INFO">
				</td>
			</tr>
			<tr>
				<td>Informe por sede</td>
				<td>
					<select name="sede" id="sede" class="chosen-select">
						<option>--Seleccione la sede--</option>
						<?php
						$selectSedes = selectSedes($conn, 0);
						?>
					</select>
				</td>
				<td>
					<input type="submit" name="infoS" value="VER INFO">
				</td>
			</tr>
		</table>
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
	$consulta ="";
	if (isset($_POST['infoG'])) {
		$consulta = listaEquipos();
		echo '<script> window.location="infoEquiposExcel.php"; </script>';
	}
	if (isset($_POST['infoA'])) {
		$area = $_POST['area'];
		$consulta = equiposPorArea($area);
		echo '<script> window.location="infoEquiposExcel.php"; </script>';
	}
	if (isset($_POST['infoS'])) {
		$sede = $_POST['sede'];
		$consulta = equiposPorSede($sede);
		echo '<script> window.location="infoEquiposExcel.php"; </script>';
	}
	$_SESSION["consulta"] = $consulta;
	?>
</div>
