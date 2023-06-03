<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambio de clave</title>
</head>
<body>
<div align="center">
	<h1>Cambio de clave</h1><br>
	<form action="cambioClave.php" method="post">
		<table>
			<tr>
				<td> <input type="password" name="claveAnt" id="claveAnt" placeholder="Clave anterior"> </td>
			</tr>
			<tr>
				<td> <input type="password" name="claveNue" id="claveNue" placeholder="Clave nueva"> </td>
			</tr>
			<tr>
				<td> <input type="password" name="claveConf" id="claveConf" placeholder="Confimacion de clave"> </td>
			</tr>
		</table>
		<br>
		<input type="submit" name="enviar" value="Cambiar">
	</form>
</div>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['claveAnt']) && !empty($_POST['claveNue']) && !empty($_POST['claveConf'])) {
	$anterior = $_POST['claveAnt'];
	$nueva = $_POST['claveNue'];
	$confimacion = $_POST['claveConf'];

	$verifica = "SELECT id, usuario, clave FROM usuarios WHERE usuario = '$usuario' AND clave = SHA1('$anterior')";
	$result=mysqli_query($conn, $verifica);
	if ($row = mysqli_fetch_array($result)) {
		if ($nueva == $confimacion) {
			$editClave = "UPDATE usuarios SET clave = SHA1('$nueva') WHERE id = '".$row['id']."'";
			$result=mysqli_query($conn, $editClave);
			echo "Se cambio la clave";
		}else{
			echo "La clave nueva no coincide";
		}
	}else{
		echo "La clave anterior no coincide";
	}

	//$result=mysql_query($editEmpresas);
	/*if ($result) {
		echo '<script> window.location="listaEmpresas.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}*/
}
?>
</div>
