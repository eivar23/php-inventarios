<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Edita sedes</title>
</head>
<body>
<div align="center">
<h1>Modificación de sedes</h1><br>
<form action="editSedes.php" method="post">
<?php
$sedes = buscarSedes($_POST['id']);
$result=mysqli_query($conn, $sedes);
$row=mysqli_fetch_array($result);
if (isset($_POST['eliminar'])) {
	$sedes = buscarSedes($_POST['eliminar']);
	$result=mysqli_query($conn, $sedes);
	$row=mysqli_fetch_array($result);

	$eliminarSedes = "DELETE FROM sede WHERE id =".$_POST['eliminar'];
	$result2=mysqli_query($conn, $eliminarSedes);
	echo '<script> window.location="listaSedes.php"; </script>';
}
?>
<table>
	<tr>
		<td> <input type="text" name="id" id="id" disabled="" value=<?php echo $row['id']; ?>> </td>
		<td> <input type="text" name="id" id="id" style="display: none;" value=<?php echo $row['id']; ?>> </td>
	</tr>
	<tr>
		<?php
		echo "<td> <input type='text' name='sede' id='sede' value='".$row['sede']."'> </td>";
		?>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="EDITAR">
</form>
<br>
<a href="listaSedes.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['sede'])) {
	$id = $_POST['id'];
	$sede = $_POST['sede'];

	$editSede = "UPDATE sede SET sede = '$sede' WHERE id = '$id'";
	if (mysqli_query($conn, $editSede)) {
		echo '<script> window.location="listaSedes.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
