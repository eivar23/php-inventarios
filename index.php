<?php
session_start();
error_reporting(0);

include ("Libs/conexion.php");
$session = validarSessionIndex();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="Estilos/estilosApp.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<head>
	<title>	Inicio </title>
</head>
<body>
<img src="Img/logo.png" width="250px" height="250px" class="img_logo">
	<form action="index.php" method="post" class=form-login>
			<h1>SISTEMAS</h1>
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" id="usuario">
				
					<label for="clave">Contraseña</label>
					<input type="password" name="clave" id="clave">

			<input type="submit" name="login" value="INGRESAR">
		</div>
	</form>
	<br><br>
</body>
</html>

<div align="center">
<?php
$conn = mysqlconn();

if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
	
	$usuario=$_POST['usuario'];
	$pass=$_POST['clave'];

	 //= $usuario;
	$login ="SELECT u.id,usuario,clave,p.id AS n_perfil,nombre FROM usuario u INNER JOIN perfil p ON p.id = u.id_perfil 
	WHERE usuario='".$usuario."' and clave= SHA1('".$pass."')";
	
	//$login= "SELECT id,usuario,clave,perfil, nombre FROM usuarios 
	//WHERE usuario='".$usuario."' and clave= SHA1('".$pass."')";
	$result=mysqli_query($conn, $login);
	$row=mysqli_fetch_array($result);
	$_SESSION["perfil"] = $row['n_perfil'];
	$_SESSION["id"] = $row['u.id'];
	$_SESSION["usuario"] = $row['usuario'];
	$_SESSION["nombre"] = $row['nombre'];

	$num=mysqli_num_rows($result);
	if ($num > 0) {
		echo '<script> window.location="Libs/perfiles.php"; </script>';
	}else{
		print("Usuario o clave no válidos");
		echo "<br>";
		//echo "<a href='MANUAL SRPF V1.2.pdf'>Ver manual</a>";
	}
}else{
	print("<p class='txt-alert'>Ingrese el usuario y la clave.</p>");
	echo "<br>";
	//echo "<a href='MANUAL SIEF V1.pdf'>Ver manual</a>";
}
?>
</div>
