<?php
include 'header.php';
include 'Libs/consultas.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear usuario</title>
</head>
<body>
<div align="center">
<h1>Creación de Usuario</h1><br>
<form action="crearPersonal.php" method="post">
<table id="tabla">
	<tr>
		<td> <input type="text" name="personal" id="personal" placeholder="Usuario (Red)"> </td>
	</tr>
	<tr>
		<td> <input type="text" name="nombre" id="nombre" placeholder="Nombre"> </td>
	</tr>
	<tr>
		<td>
			<select name="area" id="area" class="chosen-select">
				<option>--Seleccione el area--</option>
				<?php
				$selectArea = selectArea($conn, 0);
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<select name="cargo" id="cargo" class="chosen-select">
				<option>--Seleccione el cargo--</option>
				<?php
				$selectArea = selectCargo($conn, 0);
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<select name="sede" id="sede" class="chosen-select">
				<option>--Seleccione la sede--</option>
				<?php
				$selectSedes = selectSedes($conn, 0);
				?>
			</select>
		</td>
	</tr>
</table>
<br>
	<input type="submit" name="enviar" value="CREAR">
</form>
<br>
<a href="listaPersonal.php"><button>Mostrar</button></a>
<br><br>

	<!--SELECT CHOSEN-->
	<script src="Libs/chosen/chosen.jquery.js" type="text/javascript"></script>
	<script src="Libs/chosen/init.js" type="text/javascript" charset="utf-8"></script>
</div>
</body>
</html>

<div align="center">
<?php
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['area']) && !empty($_POST['nombre']) && !empty($_POST['personal']) && !empty($_POST['sede'])) {
	$area = $_POST['area'];
	$cargo = $_POST['cargo'];
	$nombre = $_POST['nombre'];
	$personal = $_POST['personal'];
	$usuarioSer = $_POST['usuarioSer'];
	$sede = $_POST['sede'];

	$crearUsuario = "INSERT INTO personal (usuario, usuarioSer, nombre, idCargo, idArea, idSede) VALUES ('$personal', '$usuarioSer', '$nombre', '$cargo', '$area', '$sede')";
	$verificarUser="SELECT count(*) FROM personal WHERE usuario= '$personal'";
	$result=mysqli_query($conn, $verificarUser);
	$row = mysqli_fetch_array($result);
	$numUser = $row['count(*)'];
	if ($numUser == 0) {
		if (mysqli_query($conn, $crearUsuario)) {
			print("Se inserto correctamente");
		}else{
			print("Error al insertar");
		}
	}else {
		print("Error al insertar, el usuario(red) ya existe!");
	}

}
?>
</div>
