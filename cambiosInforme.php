<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cambios informe</title>
</head>
<body>
<div align="center">
	<h1>Informe de equipos cambiados</h1><br>
	<br>
	<table class="tablaDatos">
		<tr align="center" class="titulo">
			<td>Fecha cambio</td>
			<td>Usuario anterior</td>
			<td>Usuario nuevo</td>
			<td>Equipo</td>
			<td>Modelo</td>
		</tr>
		<?php
		$consulta = listaCambios($conn, 0);
		$result=mysqli_query($conn, $consulta);

		while ($row=mysqli_fetch_array($result)) {
			echo "<tr align='center' class='contenido'>";
				echo "<td>".$row['fechaCambio']."</td>";
				echo "<td>".$row['usuarioAnt']."</td>";
				$consulta2 = "SELECT usuario FROM personal WHERE id = ".$row['idUsuarioNue'];
				$result2=mysqli_query($conn, $consulta2);
				$row2=mysqli_fetch_array($result2);
				echo "<td>".$row2['usuario']."</td>";
				echo "<td>".$row['tipo']."</td>";
				echo "<td>".$row['modelo']."</td>";
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
