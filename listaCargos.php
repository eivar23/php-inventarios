<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Lista de Cargos</title>
</head>
<body>
<div align="center">
<h1>Lista de Cargoss</h1><br>
<form action="editCargo.php" method="post">
<table class="tablaDatos">
	<tr align="center" class="titulo">
		<td>EDITAR</td>
		<td>CARGO</td>
		<td>ELIMINAR</td>
	</tr>
	<?php
	$areas = listaCargos();
	$result=mysqli_query($conn, $areas);

	while ($row=mysqli_fetch_array($result)) {
		echo "<tr align='center' class='contenido'>";
			echo "<td> <button type='submit' name='id' id='id' value='".$row['id']."'><img src='img/edit.png'/></button></td>";
			echo "<td>".$row['cargo']."</td>";
			echo "<td> <button type='submit' name='eliminar' id='eliminar' value='".$row['id']."'><img src='img/delete.png'/></button></td>";
		echo "</tr>";
	}
	?>
</table>
</form>
</body>
</html>
