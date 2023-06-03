<?php
session_start();
error_reporting(0);
$usuario = $_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$idUsuario = $_SESSION["id"];
$perfil = $_SESSION["perfil"];

//include 'log.php';
include ("Libs/conexion.php");
$session = validarSessionApp();
$conn = mysqlconn();
?>

<link rel="stylesheet" href="Libs/chosen/chosen.css">
<link rel="stylesheet" type="text/css" href="Estilos/estilosApp.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="Estilos/estilosMenu.css">

<div id="menu" align="center">
	<ul class="nav">
		<li> <img src="Img/logoMenu.png" width="200px" height="38px"> </li>
		<?php
		//Perfil Administrador Full
		switch ($perfil) {
			case '1': ?>
				<li> <a href="">Gestion</a>
					<ul>
						<li> <a href="crearPersonal.php">Usuarios</a> </li>
						<li> <a href="crearAreas.php">Area</a> </li>
						<li> <a href="crearcargos.php">Cargo</a> </li>
						<li> <a href="crearServidor.php">Servidores</a> </li>
						<li> <a href="crearPermiso.php">Permisos</a> </li>
						<li> <a href="crearSede.php">Sede</a> </li>
						<li> <a href="crearTipo.php">Tipo</a> </li>
						<li> <a href="crearUsuarios.php">Operadores</a> </li>
					</ul>
				</li>
				<li> <a href="">Equipos</a>
					<ul>
						<li> <a href="ingresarEquipo.php">Agregar Equipo</a> </li>
						<li> <a href="revisionEquipo.php">Agregar revision</a> </li>
					</ul>
				</li>
				<li> <a href="">Modificaciones</a>
					<ul>
						<li> <a href="cambioEquipo.php">Cambio equipos</a> </li>
						<li> <a href="cambioCaracteristicas.php">Cambio caracteristicas</a> </li>
					</ul>
				</li>
				<li> <a href="">Informes</a>
					<ul>
						<li> <a href="hojaDeVidaInforme.php">Hoja de vida</a> </li>
						<li> <a href="equiposInformes.php">Informes de Equipos</a> </li>
						<li> <a href="consultasEquipos.php">Consultas de Equipos</a> </li>
						<li> <a href="revisionesInforme.php">Informe Revisiones</a> </li>
						<li> <a href="cambiosInforme.php">Informe Cambios</a> </li>
					</ul>
				</li>
				<li> <a href=""> <?php echo $nombre; ?> </a>
					<ul>
						<li> <a href="cambioClave.php">Cambio de clave</a> </li>
						<li> <a href="Libs/cerrarSesion.php">Salir</a> </li>
					</ul>
				</li>
			<?php break; ?>
			<?php case '2': ?>
			<li> <a href="">Gestion</a>
			</li>
			<li> <a href="">Equipos</a>
				<ul>
					<li> <a href="ingresarEquipo.php">Agregar Equipo</a> </li>
					<li> <a href="revisionEquipo.php">Agregar revision</a> </li>
				</ul>
			</li>
			<li> <a href="">Modificaciones</a>
				<ul>
					<li> <a href="cambioEquipo.php">Cambio equipos</a> </li>
					<li> <a href="cambioCaracteristicas.php">Cambio caracteristicas</a> </li>
				</ul>
			</li>
			<li> <a href="">Informes</a>
				<ul>
					<li> <a href="hojaDeVidaInforme.php">Hoja de vida</a> </li>
					<li> <a href="equiposInformes.php">Informes de Equipos</a> </li>
					<li> <a href="consultasEquipos.php">Consultas de Equipos</a> </li>
					<li> <a href="revisionesInforme.php">Informe Revisiones</a> </li>
					<li> <a href="cambiosInforme.php">Informe Cambios</a> </li>
				</ul>
			</li>
			<li> <a href=""> <?php echo $nombre; ?> </a>
				<ul>
					<li> <a href="cambioClave.php">Cambio de clave</a> </li>
					<li> <a href="Libs/cerrarSesion.php">Salir</a> </li>
				</ul>
			</li>
			<?php break; ?>
			<?php case '3': ?>
			<li> <a href="">Gestion</a>
			</li>
			<li> <a href="">Equipos</a>
			</li>
			<li> <a href="">Modificaciones</a>
			</li>
			<li> <a href="">Informes</a>
				<ul>
					<li> <a href="hojaDeVidaInforme.php">Hoja de vida</a> </li>
					<li> <a href="equiposInformes.php">Informes de Equipos</a> </li>
					<li> <a href="consultasEquipos.php">Consultas de Equipos</a> </li>
					<li> <a href="revisionesInforme.php">Informe Revisiones</a> </li>
					<li> <a href="cambiosInforme.php">Informe Cambios</a> </li>
				</ul>
			</li>
			<li> <a href=""> <?php echo $nombre; ?> </a>
				<ul>
					<li> <a href="cambioClave.php">Cambio de clave</a> </li>
					<li> <a href="Libs/cerrarSesion.php">Salir</a> </li>
				</ul>
			</li>


			<?php break; ?>

			<?php default:?>
				// code...
			<?php break;
		} ?>
	</ul>
</div>


<script src="Libs/jquery.min.js" type="text/javascript"></script>



<body background="Img/fondo1.jpeg">
	<br><br><br><br>
