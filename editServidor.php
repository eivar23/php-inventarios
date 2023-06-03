<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Edita Servidor</title>
</head>
<body>
<div align="center">
<h1>Modificación de Servidor</h1><br>
<form action="editServidor.php" method="post">
<?php
$servidor = buscarServidores($_POST['id']);
$result=mysqli_query($conn, $servidor);
$row=mysqli_fetch_array($result);
if (isset($_POST['eliminar'])) {
	$servidor = buscarServidores($_POST['eliminar']);
	$result=mysqli_query($conn, $servidor);
	$row=mysqli_fetch_array($result);

	$eliminarServidor = "DELETE FROM Servidores WHERE id =".$_POST['eliminar'];
	$result2=mysqli_query($conn, $eliminarServidor);
	echo '<script> window.location="listaServidores.php"; </script>';
}
?>
<table>
	<tr>
		<td> <input type="text" name="id" id="id" disabled="" value=<?php echo $row['id']; ?>> </td>
		<td> <input type="text" name="id" id="id" style="display: none;" value=<?php echo $row['id']; ?>> </td>
	</tr>
	<tr>
		<?php
		echo "<td> <input type='text' name='servidor' id='servidor' value='".$row['servidor']."'> </td>";
		?>
	</tr>
  <tr>
    <?php
    echo "<td> <input type='text' name='ubicacion' id='ubicacion' value='".$row['ubicacion']."'> </td>";
    ?>
  </tr>
  <tr>
    <?php
    echo "<td> <input type='text' name='tecnologia' id='tecnologia' value='".$row['tecnologia']."'> </td>";
    ?>
  </tr>
</table>
<br>
	<input type="submit" name="enviar" value="EDITAR">
</form>
<br>
<a href="listaServidores.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['servidor']) && !empty($_POST['ubicacion']) && !empty($_POST['tecnologia'])) {
	$id = $_POST['id'];
	$servidor = $_POST['servidor'];
  $ubicacion = $_POST['ubicacion'];
  $tecnologia = $_POST['tecnologia'];


	$editServidor = "UPDATE Servidores SET servidor = '$servidor', ubicacion = '$ubicacion', tecnologia = '$tecnologia'  WHERE id = '$id'";
	if (mysqli_query($conn, $editServidor)) {
		echo '<script> window.location="listaServidores.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
