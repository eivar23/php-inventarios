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
		<form action="cambioEquipo.php" method="post">
			<select name="personalAnt" id="personalAnt" class="chosen-select">
				<option>--Seleccione el usuario--</option>
				<?php
				$selectPersonal = selectPersonal($conn, $_POST['personalAnt']);
				?>
			</select>

			<input type="submit" name="usuario" id="usuario" value="VALIDAR">
		</form>
		<br><br>
		<form action="cambioPersonal.php" method="post">
		<input type="" name="personalAnt" id="personalAnt" style="display: none;" value= '<?php echo $_POST['personalAnt']; ?>'>
		<table class="tablaDatos">
			<tr align="center" class="titulo">
				<td>Tipo</td>
				<td>Marca</td>
				<td>Modelo</td>
				<td>Serial</td>
				<td>Cambio</td>
			</tr>
			<?php

			$listaEquiposPorUsuario = listaEquiposPorUsuario($_POST['personalAnt']);
			$result=mysqli_query($conn, $listaEquiposPorUsuario);

			while ($row=mysqli_fetch_array($result)) {
				echo "<tr align='center' class='contenido'>";
					echo "<td>".$row['tipo']."</td>";
					echo "<td>".$row['marca']."</td>";
					echo "<td>".$row['modelo']."</td>";
					echo "<td>".$row['serial']."</td>";
					echo "<td> <button type='submit' name='equipo' id='equipo' value='".$row['id']."'><img src='img/change.png'/></button></td>";
				echo "</tr>";
			}
			?>
		</table>
		</form>
	</div>

	<!--SELECT CHOSEN-->
	<script src="Libs/chosen/chosen.jquery.js" type="text/javascript"></script>
	<script src="Libs/chosen/init.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
