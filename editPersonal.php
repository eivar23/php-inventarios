<?php
	include 'header.php';
	include 'Libs/consultas.php';
?>
<html>
	<head>
		<title>Editar Personal</title>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<body>
<?php
if (!empty($_POST['eliminarPer'])) {
	$eliminarPerSer = "DELETE FROM permisosServidores WHERE id =".$_POST['eliminarPer'];
	$result2=mysqli_query($conn, $eliminarPerSer);
}
if (!empty($_POST['eliminar'])) {
	$usuario = $_POST['eliminar'];
	$eliminarPersonal = "DELETE FROM personal WHERE id ='$usuario'";
	$result2=mysqli_query($conn, $eliminarPersonal);
	echo '<script> window.location="listaPersonal.php"; </script>';
}
if (!empty($_POST['servidores'])) {
	if (!empty($_POST['idservidor'])) {
		$idservidor = $_POST['idservidor'];
    $idusuario = $_POST['servidores'];
		$usuarioSer = $_POST['usuarioSer'];
		//verificar que no existan permisos ya dados a ese servidor
		$numservidor = "SELECT count(*) FROM permisosservidores WHERE idUsuario = '$idusuario' AND idServidor ='$idservidor' ";
		$result = mysqli_query($conn, $numservidor);
		$row = mysqli_fetch_array($result);
		$numSer = $row['count(*)'];
		if ($numSer == 0) {
			//contar # de permisos
			$numPermisos = "SELECT count(*) FROM permisos";
			$result = mysqli_query($conn, $numPermisos);
			$row = mysqli_fetch_array($result);
			$num = $row['count(*)'];
			//crear cadena de texto de todos los permisos
			$i = 1;
			$permisos = array();
			while ($i <= $num) {
				if (isset ($_POST['p'.$i])) {
					${"perNom" . $i} = $_POST['p'.$i];
				 	$permisos[] = ${"perNom" . $i} ;
				}
				$i++;
			}
			$cadena_permisos = implode(",", $permisos);
			//agregar los permisos de servidores
			$adicionarPer = "INSERT INTO `permisosServidores` (`idUsuario`,`idServidor`,`usuarioSer`, `permisos`) VALUES ('$idusuario', '$idservidor', '$usuarioSer', '$cadena_permisos');";
			if (mysqli_query($conn, $adicionarPer)) {
				print("<div  align='center'>Se inserto correctamente</div>");
			}else{
				print("<div  align='center'>Error al insertar1</div>");
			}
		}else {
				print("<div  align='center'>Ya existe permisos creados sobre este servidor</div>");
		}
	}
	$personal = buscarPersonal($_POST['servidores']);
	$result=mysqli_query($conn, $personal);
	$row=mysqli_fetch_array($result);
	?>
	<div class="container">
		<h1>Agregar permisos en servidores</h1><br>
		<div class="form-editPersonal">
		<?php echo "<h2>".$row['usuario']." - ".$row['nombre']." </h2><br>"; ?>
		<form action="editPersonal.php" method="post">
			<table class="tablaDatos">
				<tr align="center" class="titulo">
					<td>SERVIDOR</td>
					<td>USUARIO.SER</td>
					<td>PERMISOS</td>
					<td>ADICIONAR</td>
				</tr>
				<tr>
					<td>
						<select style="width: 100%" name="idservidor" id="idservidor" class="chosen-select">
							<option>--Seleccione el servidor--</option>
							<?php
								$selectservidor = selectServidor($conn, 0);
							?>
						</select>
					</td>
					<td>
						<input  class="usuarioSer"  type="text" name="usuarioSer" id="usuarioSer"  placeholder="Usuario del servidor"></input>
					</td>
					<td>
						<table class="subtabla" cellspacing="0">
							<?php
								$checkboxPermisos = checkboxPermisos($conn, 0);
							?>
						</table>
					</td>
					<?php
						echo "<td align='center'> <button type='submit' name='servidores' id='servidores' value='".$row['id']."'><img src='img/more.png'/></button></td>";
		 			?>
				</tr>
			</table>
			</form>
		</div>
	</div>
<div align="center">
	<h1>Permisos en servidores</h1><br>
	<table class="tablaDatos">
		<tr align="center" class="titulo">
			<td>SERVIDOR</td>
			<td>USUARIO.SER</td>
			<td>PERMISOS</td>
			<td>OPCIONES</td>
		</tr>
		<?php
		$perservidor = listaPerServidor($_POST['servidores']);
		$result=mysqli_query($conn, $perservidor);
		while ($row=mysqli_fetch_array($result)) {
			echo "<form action='editPersonal.php' method='post'>";
			echo "<tr align='center' class='contenido'>";
			echo "<td>".$row['servidor']."</td>";
			echo "<td>".$row['usuarioSer']."</td>";
			echo "<td>".$row['permisos']."</td>";
			echo "
			<td>
				<button type='submit' name='eliminarPer' id='eliminarPer' value='".$row['id']."'>
					<img src='img/delete.png'/>
					<input type='text' name='servidores' id='servidores' style='display: none;' value='".$row['idUsuario']."'>
					<input type='text' name='idEditSer' id='idEditSer' style='display: none;'  value='".$row['idServidor']."'>
					<input type='text' name='stringPermisos' id='stringPermisos' style='display: none;'  value='".$row['permisos']."'>
				</button>
			</td>";
			echo "</tr>";
			echo "</form>";
		}
	 	?>
	</table>
</div>
<?php
}
if (!empty($_POST['editar'])) {
	$personal = buscarPersonal($_POST['editar']);
	$result=mysqli_query($conn, $personal);
	$row=mysqli_fetch_array($result);
	?>
<div align="center">
<h1>Modificación de Usuarios</h1><br>
<form action="editPersonal.php" method="post">
	<table>
		<tr>
			<td> <input type="text" name="id" id="id" disabled="" value=<?php echo $row['id']; ?>> </td>
			<td> <input type="text" name="id" id="id" style="display: none;" value=<?php echo $row['id']; ?>> </td>
		</tr>
		
		<tr>
			<?php
			echo "<td> <input type='text' name='nombre' id='nombre' value='".$row['nombre']."'> </td>";
			?>
		</tr>
		<tr>
			<?php
			echo "<td> <input type='text' name='apellido' id='apellido' value='".$row['apellido']."'> </td>";
			?>
		</tr>
		<tr>
			<td>
				<select name="ar" id="ar" class="chosen-select">
					<option>--Seleccione el area--</option>
					<?php $selectArea = selectArea($conn, $row['idArea']); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
			<div class="form-group">
			<label for="cargo">Cargo</label>
			<select class="form-control" id="cargo" name="cargo">
				<option>Seleccione el cargo</option>
			</select>
		</div>
			</td>
		</tr>
		<tr>
			<td>
				<select name="sede" id="sede" class="chosen-select">
					<option>--Seleccione la sede--</option>
					<?php
					$selectSedes = selectSedes($conn, $row['idSede']);
					?>
				</select>
			</td>
		</tr>
	</table>
	<br>
		<input type="submit" name="enviar" value="EDITAR">
	</form>
	<br>
	<a href="listaPersonal.php"><button>Mostrar</button></a>
	<br><br>
	</div>
	
<?php
}
error_reporting(E_ALL ^ E_NOTICE);

if (!empty($_POST['personal']) && !empty($_POST['nombre']) && !empty($_POST['area']) && !empty($_POST['sede'])) {
	$id = $_POST['id'];
	$personal = $_POST['personal'];
	$usuarioSer = $_POST['usuarioSer'];
	$nombre = $_POST['nombre'];
	$sede = $_POST['sede'];
	$area = $_POST['area'];
	$cargo = $_POST['cargo'];

	$editPersonal = "UPDATE personal SET usuario = '$personal', usuarioSer = '$usuarioSer', nombre = '$nombre', idCargo = '$cargo', idArea = '$area', idSede = '$sede' WHERE id = '$id'";
	if (mysqli_query($conn, $editPersonal)) {
		echo '<script> window.location="listaPersonal.php"; </script>';
		print("Se inserto correctamente");
	}else{
		print("Error al insertar");
	}
}
?>
</div>
<!--SELECT CHOSEN-->
<script src="Libs/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="Libs/chosen/init.js" type="text/javascript" charset="utf-8"></script>

<script>	

$(document).ready(function() {
    $('#ar').on('change', function() {
		var ar = $(this).val();
		console.log(ar)
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

</body>
</html>
