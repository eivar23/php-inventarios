<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Lista de usuarios</title>
</head>
<body>
<div align="center">
<h1>Lista de usuarios</h1><br>
<form action="editUsuario.php" method="post">
<table class="tablaDatos">
	<tr align="center" class="titulo">
		<td>EDITAR</td>
		<td>USUARIO</td>
		<td>NOMBRE</td>
		<td>PERFIL</td>
		<td>ELIMINAR</td>
	</tr>
	<?php
	$usuarios = listaUsuarios();
	$result=mysqli_query($conn, $usuarios);

	while ($row=mysqli_fetch_array($result)) {
		echo "<tr align='center' class='contenido'>";
			echo "<td> <button type='submit' name='idUsuario' id='idUsuario' value='".$row['id']."'><img src='img/edit.png'/></button></td>";
			echo "<td>".$row['usuario']."</td>";
			echo "<td>".$row['nombre']."</td>";
			echo "<td>".$row['perfil']."</td>";
			echo "<td> <button type='submit' name='eliminar' id='eliminar' value='".$row['id']."'><img src='img/delete.png'/></button></td>";
		echo "</tr>";
	}
	?>
</table>
</form>
</body>
</html>
