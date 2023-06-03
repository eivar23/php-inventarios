<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Edita usuario</title>
</head>
<body>
<div align="center">
<h1>Modificación de usuario</h1><br>
<form action="editUsuario.php" method="post">
<?php
$usuario = buscarUsuario($_POST['idUsuario']);
$result=mysqli_query($conn, $usuario);
$row=mysqli_fetch_array($result);
if (isset($_POST['eliminar'])) {
	$usuario = buscarUsuario($_POST['eliminar']);
	$result=mysqli_query($conn, $usuario);
	$row=mysqli_fetch_array($result);

	$eliminarUsu = "DELETE FROM usuarios WHERE id =".$_POST['eliminar'];
	$result2=mysqli_query($conn, $eliminarUsu);
	echo '<script> window.location="listaUsuarios.php"; </script>';
}
?>
<table>
	<tr>
		<td> <input type="text" name="idUsuario" id="idUsuario" disabled="" value=<?php echo $row['id']; ?>> </td>
		<td> <input type="text" name="idUsuario" id="idUsuario" style="display: none;" value=<?php echo $row['id']; ?>> </td>
	</tr>
	<tr>
		<td> <input type="text" name="usuario" id="usuario" value=<?php echo $row['usuario']; ?>> </td>
	</tr>
	<tr>
		<?php
		echo "<td> <input type='text' name='nombre' id='nombre' value='".$row['nombre']."'> </td>";
		?>
	</tr>
	<tr>
		<td> <input type="password" name="clave" id="clave" value=<?php echo $row['clave']; ?>> </td>
	</tr>
	<tr>
		<td>
			<select name="perfil" id="perfil">
				<option value="">--Seleccione el perfil--</option>
				<option value="1" <?php if ($row['perfil']==1) {echo "selected";}else {} ?> >Administrador</option>
				<option value="2" <?php if ($row['perfil']==2) {echo "selected";}else {} ?> >Operador</option>
				<option value="3" <?php if ($row['perfil']==3) {echo "selected";}else {} ?> >Consultor</option>
			</select>
		</td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="EDITAR">
</form>
<br>
<a href="listaUsuarios.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['usuario']) && !empty($_POST['clave']) && !empty($_POST['perfil'])) {
	$id = $_POST['idUsuario'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$nombre = $_POST['nombre'];
	$perfil = $_POST['perfil'];

	$editUsuario = "UPDATE usuarios SET usuario = '$usuario', clave = SHA1('".$clave."'), nombre = '$nombre', perfil = '$perfil' WHERE id = '$id'";
	if (mysqli_query($conn, $editUsuario)) {
		echo '<script> window.location="listaUsuarios.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
