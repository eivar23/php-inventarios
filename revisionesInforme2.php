<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Revisiones informe</title>
</head>
<body>
<div align="center">
	<h1>Informe de revisiones</h1><br>
	<form action="revisionesInforme.php" method="post">
		<table>
			<tr>
				<td>Consulta por usuario</td>
				<td>
					<select name="personal" id="personal" class="chosen-select">
						<option>--Seleccione el usuario--</option>
						<?php
						$selectPersonal = selectPersonal($conn, $_POST['personal']);
						?>
					</select>
				</td>
				<td>
					<input type="submit" name="infoU" value="VER INFO">
				</td>
				<td>
					<input type="submit" name="infoG" value="VER INFO general">
				</td>
			</tr>
		</table>
	</form>
	<br>
	<table class="tablaDatos">
		<tr align="center" class="titulo">
			<td>Usuario</td>
			<td>Equipo</td>
			<td>Marca</td>
			<td>Fecha de revision</td>
			<td>Revision</td>
		</tr>
		<?php
		$personal = $_POST['personal'];
		$consulta = listaRevisiones($personal);
		$result=mysqli_query($conn, $consulta);

		while ($row=mysqli_fetch_array($result)) {
			echo "<tr align='center' class='contenido'>";
				echo "<td>".$row['usuario']."</td>";
				echo "<td>".$row['tipo']."</td>";
				echo "<td>".$row['marca']."</td>";
				echo "<td>".$row['fecha']."</td>";
				echo "<td>".$row['revision']."</td>";
			echo "</tr>";
		}
		?>
	</table>

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

	$_SESSION["consulta"] = $consulta;
	?>
</div>
