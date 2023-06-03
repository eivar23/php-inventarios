<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Edita Permiso</title>
</head>
<body>
<div align="center">
<h1>Modificación de Permiso</h1><br>
<form action="editPermiso.php" method="post">
<?php
$permiso = buscarPermisos($_POST['id']);
$result=mysqli_query($conn, $permiso);
$row=mysqli_fetch_array($result);
if (isset($_POST['eliminar'])) {
	$permiso = buscarPermisos($_POST['eliminar']);
	$result=mysqli_query($conn, $servidor);
	$row=mysqli_fetch_array($result);

	$eliminarPermiso = "DELETE FROM Permisos WHERE id =".$_POST['eliminar'];
	$result2=mysqli_query($conn, $eliminarPermiso);
	echo '<script> window.location="listaPermisos.php"; </script>';
}
?>
<table>
	<tr>
		<td> <input type="text" name="id" id="id" disabled="" value=<?php echo $row['id']; ?>> </td>
		<td> <input type="text" name="id" id="id" style="display: none;" value=<?php echo $row['id']; ?>> </td>
	</tr>
	<tr>
		<?php
		echo "<td> <input type='text' name='permiso' id='permiso' value='".$row['permiso']."'> </td>";
		?>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="EDITAR">
</form>
<br>
<a href="listaPermisos.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['permiso'])) {
	$id = $_POST['id'];
	$permiso = $_POST['permiso'];



	$editPermiso = "UPDATE Permisos SET permiso = '$permiso'  WHERE id = '$id'";
	if (mysqli_query($conn, $editPermiso)) {
		echo '<script> window.location="listaPermisos.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
