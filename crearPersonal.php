<?php
include 'header.php';
include 'Libs/consultas.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body class = "us-select">

<div class="container">
	<br>		
	<h1>Creación de Usuario</h1>
	<br>
	<div class="form-usuario form-crear">
		<form method="post" action="crearPersonal.php">
			
			<div class="form-group">
				<label for="usuario"></label>
				<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario (Red)" required>
			</div>	

			<div class="form-group">
				<label for="nombre"></label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
			</div>

			<div class="form-group">
				<label for="apellido"></label>
				<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" required>
			</div>


			<div class="form-group">
				<label for="ar"></label>
				<select class="form-control" id="ar" name="ar">
					<option>Seleccione el area</option>
					<?php $selectArea = selectArea($conn, 0);?>
				</select>
			</div>

			<div class="form-group">
				<label for="cargo"></label>
				<select class="form-control" id="cargo" name="cargo">
					<option>Seleccione el cargo</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="sede"></label>
				<select class="form-control" id="sede" name="sede">
					<option>Seleccione la sede</option>
					<?php $selectSedes = selectSedes($conn, 0); ?>
				</select>
			</div>

			<button type="submit" name="enviar" id="btn-usuario" class="btn btn-Fcrear">Crear</button>
		</form>

		<a href="listaPersonal.php"><button class="btn btn-Fmodificar">Mostrar</button></a>
	</div>
</div>

</body>
</html>
<!--SELECT CHOSEN-->
<!-- 
<script src="Libs/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="Libs/chosen/init.js" type="text/javascript" charset="utf-8"></script> -->


<script>	

$(document).ready(function() {
    $('#ar').on('change', function() {
		var ar = $(this).val();
		console.log(ar);
        $.ajax({
            url: 'Libs/consultas.php',
            type: 'post',
            data: {ar:ar},
            success:function(res) { 
				$('#cargo').html(res);         	
            }
        });
    });
	
});

</script>





<?php
error_reporting(E_ALL ^ E_NOTICE);
if (!empty($_POST['ar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['usuario'])&& !empty($_POST['sede'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cargo = $_POST['cargo'];
	$area = $_POST['ar'];
	$sede = $_POST['sede'];
	$personal = $_POST['usuario'];

	

	$crearUsuario = "INSERT INTO personal (id,apellido, nombre, id_cargo, id_sede,id_area) VALUES ('$personal', '$apellido', '$nombre',$cargo, $sede,$area)";
	$verificarUser="SELECT count(*) FROM personal WHERE id= '$personal'";
	$result=mysqli_query($conn, $verificarUser);
	$row = mysqli_fetch_array($result);
	$numUser = $row['count(*)'];
	if ($numUser == 0) {
		if (mysqli_query($conn, $crearUsuario)) {
			print("<div class='alert alert-success' role='alert'>Se insertó correctamente</div");
		}else{
			print("<div class='alert alert-danger' role='alert'>Error al insertar</div>");
		}
	}else {
		print("<div class='alert alert-danger' role='alert'>Error al insertar, el usuario(red) ya existe!</div>");
	}

}
?>

