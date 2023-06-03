<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Edita cargo</title>
</head>
<body>
<div align="center">
<h1>Modificación de cargo</h1><br>
<form action="editCargo.php" method="post">

<?php
$cargo = buscarCargos($_POST['id']);
$result=mysqli_query($conn, $cargo);
$row=mysqli_fetch_array($result);
if (isset($_POST['eliminar'])) {
	
	$cargo = buscarCargos($_POST['eliminar']);
	$result=mysqli_query($conn, $cargo);
	$row=mysqli_fetch_array($result);

	$eliminarCargo = "DELETE FROM cargo WHERE id =".$_POST['eliminar'];
	$result2=mysqli_query($conn, $eliminarCargo);
	echo '<script> window.location="listaCargos.php"; </script>';
}
?>

<table>
	<tr>
		<td> <input type="text" name="id" id="id" disabled="" value=<?php echo $row['id']; ?>> </td>
		<td> <input type="text" name="id" id="id" style="display: none;" value=<?php echo $row['id']; ?>> </td>
	</tr>
	<tr>
		<?php
		echo "<td> <input type='text' name='cargo' id='cargo' value='".$row['cargo']."'> </td>";
		?>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="EDITAR">
</form>
<br>
<a href="listaCargos.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['cargo'])) {
	$id = $_POST['id'];
	$cargo = $_POST['cargo'];

	$editCargo = "UPDATE cargos SET cargo = '$cargo' WHERE id = '$id'";
	if (mysqli_query($conn, $editCargo)) {
		echo '<script> window.location="listaCargos.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
