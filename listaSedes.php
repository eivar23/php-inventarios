<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Lista de sedes</title>
</head>
<body>
<div align="center">
<h1>Lista de sedes</h1><br>
<form action="editSedes.php" method="post">
<table class="tablaDatos">
	<tr align="center" class="titulo">
		<td>EDITAR</td>
		<td>SEDES</td>
		<td>ELIMINAR</td>
	</tr>
	<?php
	$sedes = listaSedes();
	$result=mysqli_query($conn, $sedes);

	while ($row=mysqli_fetch_array($result)) {
		echo "<tr align='center' class='contenido'>";
			echo "<td> <button type='submit' name='id' id='id' value='".$row['id']."'><img src='img/edit.png'/></button></td>";
			echo "<td>".$row['sede']."</td>";
			echo "<td> <button type='submit' name='eliminar' id='eliminar' value='".$row['id']."'><img src='img/delete.png'/></button></td>";
		echo "</tr>";
	}
	?>
</table>
</form>
</body>
</html>
