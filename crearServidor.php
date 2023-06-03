<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Servidor</title>
</head>
<body>
<div align="center">
<h1>Crear Servidor</h1><br>
<form action="crearServidor.php" method="post">
<table>
	<tr>
		<td> <input type="text" name="servidor" id="servidor" placeholder="Servidor"> </td>
	</tr>
  <tr>
    <td> <input type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación"> </td>
  </tr>
  <tr>
    <td> <input type="text" name="tecnologia" id="tecnologia" placeholder="Tecnologia"> </td>
  </tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaServidores.php"><button>Mostrar</button></a>
<br><br>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['servidor'])) {
	$servidor = $_POST['servidor'];
  $ubicacion = $_POST['ubicacion'];
  $tecnologia = $_POST['tecnologia'];

	$crearServidor = "INSERT INTO Servidores (servidor, ubicacion, tecnologia) VALUES ('$servidor', '$ubicacion', '$tecnologia')";
	if (mysqli_query($conn, $crearServidor)) {
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
