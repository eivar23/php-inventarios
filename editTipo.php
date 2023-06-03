<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Editar tipo</title>
</head>
<body>
<div align="center">
<h1>Modificación de tipo de equipo</h1><br>
<form action="editTipo.php" method="post">
<?php
$tipo = buscarTipos($_POST['id']);
$result=mysqli_query($conn, $tipo);
$row=mysqli_fetch_array($result);
if (isset($_POST['eliminar'])) {
	$tipo = buscarTipos($_POST['eliminar']);
	$result=mysqli_query($conn, $tipo);
	$row=mysqli_fetch_array($result);

	$eliminarTipos = "DELETE FROM tipos WHERE id =".$_POST['eliminar'];
	$result2=mysqli_query($conn, $eliminarTipos);
	echo '<script> window.location="listaTipos.php"; </script>';
}
?>
<table>
	<tr>
		<td> <input type="text" name="id" id="id" disabled="" value=<?php echo $row['id']; ?>> </td>
		<td> <input type="text" name="id" id="id" style="display: none;" value=<?php echo $row['id']; ?>> </td>
	</tr>
	<tr>
		<?php
		echo "<td> <input type='text' name='tipo' id='tipo' value='".$row['tipo']."'> </td>";
		?>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="EDITAR">
</form>
<br>
<a href="listaTipos.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['tipo'])) {
	$id = $_POST['id'];
	$tipo = $_POST['tipo'];

	$editTipo = "UPDATE tipos SET tipo = '$tipo' WHERE id = '$id'";
	if (mysqli_query($conn, $editTipo)) {
		echo '<script> window.location="listaTipos.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
