<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Equipos consulta</title>
</head>
<body>
<div align="center">
	<h1>Consulta de equipos</h1><br>
	<form action="consultasEquipos.php" method="post">
		<table>
			<tr>
				<td>Consulta por usuario</td>
				<td>
					<select name="personal" id="personal" class="chosen-select">
						<option>--Seleccione el usuario--</option>
						<?php
						$selectPersonal = selectPersonal($conn, 0);
						?>
					</select>
				</td>
				<td>
					<input type="submit" name="infoU" value="VER INFO">
				</td>
			</tr>
			<tr>
				<td>Consulta por area</td>
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
				<td>Consulta por sede</td>
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
	<br>
	<table class="tablaDatos">
		<tr align="center" class="titulo">
			<td># Activo</td>
			<td>Tipo</td>
			<td>Marca</td>
			<td>Modelo</td>
			<td>Serial</td>
			<td>Fecha de compra</td>
			<td>Usuario</td>
			<td>Area</td>
			<td>Cargo</td>
			<td>Sede</td>
			<td>Funcion</td>
		</tr>
		<?php
		$consulta ="";
		if (isset($_POST['infoU'])) {
			$personal = $_POST['personal'];
			$consulta = listaEquiposPorUsuario($personal);
		}
		if (isset($_POST['infoA'])) {
			$area = $_POST['area'];
			$consulta = equiposPorArea($area);
		}
		if (isset($_POST['infoS'])) {
			$sede = $_POST['sede'];
			$consulta = equiposPorSede($sede);
		}
		if (isset($_POST['infoP'])) {
			$proveedor = $_POST['proveedor'];
			$consulta = equiposPorProveedor($proveedor);
		}

		$result=mysqli_query($conn, $consulta);

		while ($row=mysqli_fetch_array($result)) {
			echo "<tr align='center' class='contenido'>";
				echo "<td>".$row['activo']."</td>";
				echo "<td>".$row['tipo']."</td>";
				echo "<td>".$row['marca']."</td>";
				echo "<td>".$row['modelo']."</td>";
				echo "<td>".$row['serial']."</td>";
				echo "<td>".$row['fechaCompra']."</td>";
				echo "<td>".$row['usuario']."</td>";
				echo "<td>".$row['area']."</td>";
				echo "<td>".$row['cargo']."</td>";
				echo "<td>".$row['sede']."</td>";
						
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

</div>
