<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Lista usuarios</title>
</head>
<body>
<div class="row justify-content-center">
<div class="col-auto">
<h1>Lista de Usuarios</h1><br>
<form action="editPersonal.php" method="post">
<table class="tablaDatos table table-primary">
  <thead>
	<tr class="titulo">
		<td>EDITAR</td>
		<td>USUARIO(RED)</td>
		<td>NOMBRE</td>
		<td>AREA</td>
		<td>CARGO</td>
		<td>SEDE</td>
		<td>ELIMINAR</td>
		<td>PER.SERVIDORES</td>
	</tr>
   </thead>
	<?php
	$personal = listaPersonal();
	$result=mysqli_query($conn, $personal);

	while ($row=mysqli_fetch_array($result)) {
		echo "<tr align='center' class='contenido'>";
			echo "<td> <button type='submit' name='editar' id='editar' value='".$row['id']."'><img src='img/edit.png'/></button></td>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['nombre']."</td>";
			echo "<td>".$row['area']."</td>";
			echo "<td>".$row['cargo']."</td>";
			echo "<td>".$row['sede']."</td>";
			echo "<td> <button type='submit' name='eliminar' id='eliminar' value='".$row['id']."'><img src='img/delete.png'/></button></td>";
			echo "<td> <button type='submit' name='servidores' id='servidores' value='".$row['id']."'><img src='img/more.png'/></button></td>";
			echo "</tr>";
	}
	?>
</table>
</form>
</div>
</div>
</body>
</html>
