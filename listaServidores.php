<?php
include 'header.php';
include 'Libs/consultas.php';
?>
<html>
<head>
	<title>Lista de Servidores</title>
</head>
<body>
<div align="center">
<h1>Lista de Servidores</h1><br>
<form action="editServidor.php" method="post">
<table class="tablaDatos">
	<tr align="center" class="titulo">
		<td>EDITAR</td>
		<td>SERVIDOR</td>
    <td>UBICACIÓN</td>
    <td>TECNOLOGIA</td>
		<td>ELIMINAR</td>
	</tr>
	<?php
	$Servidores = listaServidores();
	$result=mysqli_query($conn, $Servidores);

	while ($row=mysqli_fetch_array($result)) {
		echo "<tr align='center' class='contenido'>";
			echo "<td> <button type='submit' name='id' id='id' value='".$row['id']."'><img src='img/edit.png'/></button></td>";
			echo "<td>".$row['servidor']."</td>";
      echo "<td>".$row['ubicacion']."</td>";
      echo "<td>".$row['tecnologia']."</td>";
			echo "<td> <button type='submit' name='eliminar' id='eliminar' value='".$row['id']."'><img src='img/delete.png'/></button></td>";
		echo "</tr>";
	}
	?>
</table>
</form>
</body>
</html>
