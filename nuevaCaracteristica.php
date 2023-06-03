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
		<h1>Ingresar equipo</h1><br>
		<form action="nuevaCaracteristica.php" method="post">
			<?php echo "<input type='text' name='equipo' id='equipo' value= '".$_POST['equipo']."' style='display: none'>"; ?>
			<table>
				<?php
				$listaCaracteristicasEquipo = listaCaracteristicasEquipo($_POST['equipo']);
				$result=mysqli_query($conn, $listaCaracteristicasEquipo);
				$row=mysqli_fetch_array($result);
				?>
				<tr>
					<td>Nombre</td>
					<td>
						<?php echo "<input type='text' name='nombre' id='nombre' value= '".$row['nombre']."' >"; ?>
					</td>
				</tr>
				<tr>
					<td>Procesador</td>
					<td>
						<?php echo "<input type='text' name='procesador' id='procesador' value= '".$row['procesador']."' >"; ?>
					</td>
				</tr>
				<tr>
					<td>Memoria</td>
					<td>
						<?php echo "<input type='text' name='memoria' id='memoria' value= '".$row['memoria']."' >"; ?>
					</td>
				</tr>
				<tr>
					<td>Disco duro</td>
					<td>
						<?php echo "<input type='text' name='discoDuro' id='discoDuro' value= '".$row['discoDuro']."' >"; ?>
					</td>
				</tr>
				<tr>
					<td>Sistema Operativo</td>
					<td>
						<?php echo "<input type='text' name='sOperativo' id='sOperativo' value= '".$row['sistemaOperativo']."' >"; ?>
					</td>
				</tr>
				<tr>
					<td>Licencia</td>
					<td>
						<?php echo "<input type='text' name='licencia' id='licencia' value= '".$row['licencia']."' >"; ?>
					</td>
				</tr>
			</table>
			<br>
			<input type="submit" name="ENVIAR">
		</form>
	</div>
</body>
</html>

<br>
<div align="center">
<?php
if (!empty($_POST['equipo']) && !empty($_POST['nombre']) && !empty($_POST['procesador']) && !empty($_POST['memoria']) && !empty($_POST['discoDuro'])) {
	$equipo = $_POST['equipo'];
	$nombre = $_POST['nombre'];
	$procesador = $_POST['procesador'];
	$memoria = $_POST['memoria'];
	$discoDuro = $_POST['discoDuro'];

	$caracteristicas = "UPDATE caracteristicas SET nombre = '$nombre', procesador = '$procesador', memoria = '$memoria', discoDuro = '$discoDuro' WHERE idEquipo = '$equipo'";
	if (mysqli_query($conn, $caracteristicas)) {
		echo "Se modificaron las caracteristicas del equipo";
		echo '<script> window.location="cambioCaracteristicas.php"; </script>';
	}else{
		echo "Error al insertar";
	}
}
?>
</div>
