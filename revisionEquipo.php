<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Revision Equipo</title>
</head>
<body>
	<div align="center">
		<h1>Agregar revision</h1><br>
		<form action="revisionEquipo.php" method="post">
			<select name="personal" id="personal" class="chosen-select">
				<option>--Seleccione el usuario--</option>
				<?php
				$selectPersonal = selectPersonal($conn, 0);
				?>
			</select>

			<input type="submit" name="usuario" id="usuario" value="VALIDAR">
		</form>
		<br><br>
		<form action="nuevaRevision.php" method="post">
		<table class="tablaDatos">
			<tr align="center" class="titulo">
				<td>Tipo</td>
				<td>Marca</td>
				<td>Modelo</td>
				<td>Serial</td>
				<td>Agregar Revision</td>
			</tr>
			<?php

			$listaEquiposPorUsuario = listaEquiposPorUsuario($_POST['personal']);
			$result=mysqli_query($conn, $listaEquiposPorUsuario);

			while ($row=mysqli_fetch_array($result)) {
				echo "<tr align='center' class='contenido'>";
					echo "<td>".$row['tipo']."</td>";
					echo "<td>".$row['marca']."</td>";
					echo "<td>".$row['modelo']."</td>";
					echo "<td>".$row['serial']."</td>";
					echo "<td> <button type='submit' name='equipo' id='equipo' value='".$row['id']."'><img src='img/setting.png'/></button></td>";
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
