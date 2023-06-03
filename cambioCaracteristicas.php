<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cambio caracteristicas</title>
</head>
<body>
	<div align="center">
		<h1>Cambio de caracteristicas PC</h1><br>
		<form action="cambioCaracteristicas.php" method="post">
			<select name="personal" id="personal" class="chosen-select">
				<option>--Seleccione el usuario--</option>
				<?php
				$selectPersonal = selectPersonal($conn, 0);
				?>
			</select>
			<input type="submit" name="usuario" id="usuario" value="VALIDAR">
		</form>
		<br><br>
		<form action="nuevaCaracteristica.php" method="post">
		<table class="tablaDatos">
			<tr align="center" class="titulo">
				<td>Tipo</td>
				<td>Marca</td>
				<td>Modelo</td>
				<td>Serial</td>
				<td>Cambio</td>
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
					echo "<td> <button type='submit' name='equipo' id='equipo' value='".$row['id']."'><img src='img/change.png'/></button></td>";
				echo "</tr>";
			}
			?>
	</div>

	<!--SELECT CHOSEN-->
	<script src="Libs/chosen/chosen.jquery.js" type="text/javascript"></script>
	<script src="Libs/chosen/init.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
