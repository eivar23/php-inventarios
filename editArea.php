<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Edita area</title>
</head>
<body>
<div align="center">
<h1>Modificación de area</h1><br>
<form action="editArea.php" method="post">
<?php
$area = buscarAreas($_POST['id']);
$result=mysqli_query($conn, $area);
$row=mysqli_fetch_array($result);
if (isset($_POST['eliminar'])) {
	
	$area = buscarAreas($_POST['eliminar']);
	$result=mysqli_query($conn, $area);
	$row=mysqli_fetch_array($result);

	$contarArea = "SELECT COUNT(id_area) as total FROM cargo_area WHERE id_area = ".$_POST['eliminar'];
	$result3=mysqli_query($conn, $contarArea);
	$row3=mysqli_fetch_array($result3);
	$areas = $row3['total'];
	if($areas>0){
		echo '<script> window.location="listaAreas.php"; </script>';
		mensajesArea();
	}else{
		$eliminarArea = "DELETE FROM area WHERE id =".$_POST['eliminar'];
		$result2=mysqli_query($conn, $eliminarArea);
		echo '<script> window.location="listaAreas.php"; </script>';
		mensajesArea();
	}

	
}
?>
<table>
	<tr>
		<td> <input type="text" name="id" id="id" disabled="" value=<?php echo $row['id']; ?>> </td>
		<td> <input type="text" name="id" id="id" style="display: none;" value=<?php echo $row['id']; ?>> </td>
	</tr>
	<tr>
		<?php
		echo "<td> <input type='text' name='area' id='area' value='".$row['area']."'> </td>";
		?>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="EDITAR">
</form>
<br>
<a href="listaAreas.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['area'])) {
	$id = $_POST['id'];
	$area = $_POST['area'];

	$editArea = "UPDATE area SET area = '$area' WHERE id = '$id'";
	if (mysqli_query($conn, $editArea)) {
		echo '<script> window.location="listaAreas.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
