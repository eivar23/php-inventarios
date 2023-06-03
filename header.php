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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="Libs/chosen/chosen.css">
<link rel="stylesheet" type="text/css" href="Estilos/estilosApp.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="Estilos/estilosMenu.css">


<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #213C95; color:#fff">
	<a class="navbar-brand" href="#"><img src="Img/logoMenu.png" width="200px" height="38px"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   	 <span class="navbar-toggler-icon"></span>
  	</button>
		
		<?php
		//Perfil Administrador Full
		switch ($perfil) {
			case '1': ?>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
    			<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Gestión
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="CrearPersonal.php">Usuarios</a>
							<a class="dropdown-item" href="CrearAreas.php">Area</a>
							<a class="dropdown-item" href="crearcargos.php">Cargo</a>
							<a class="dropdown-item" href="crearServidor.php">Servidores</a>
							<a class="dropdown-item" href="crearPermiso.php">Permisos</a>
							<a class="dropdown-item" href="crearSede.php">Sede</a>
							<a class="dropdown-item" href="crearUsuarios.php">Operadores</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Equipos
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="ingresarEquipo.php">Agregar equipo</a>
							<a class="dropdown-item" href="revisionEquipo.php">Agregar revisión</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Modificaciones
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="cambioEquipo.php">Cambio de equipos</a>
							<a class="dropdown-item" href="cambioCaracteristicas.php">Cambio características</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Informes
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="hojaDeVidaInforme.php">Hoja de vida</a>
							<a class="dropdown-item" href="cambioEquipo.php">Informes de equipos</a>
							<a class="dropdown-item" href="consultasEquipos.php">Consultas de equipos</a>
							<a class="dropdown-item" href="revisionesInforme.php">Informe de revisiones</a>
							<a class="dropdown-item" href="cambiosInforme.php">Informe de cambios</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $nombre; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="cambioClave.php">Cambio de clave</a>
							<a class="dropdown-item" href="Libs/cerrarSesion.php">Salir</a>
						</div>
					</li>
				</ul>
			</div>
			
			<?php break; ?>
			<?php case '2': ?>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
    			<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Gestión
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Equipos
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="ingresarEquipo.php">Agregar equipo</a>
							<a class="dropdown-item" href="revisionEquipo.php">Agregar revisión</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Modificaciones
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="cambioEquipo.php">Cambio de equipos</a>
							<a class="dropdown-item" href="cambioCaracteristicas.php">Cambio características</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Informes
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="cambioEquipo.php">Hoja de vida</a>
							<a class="dropdown-item" href="hojaDeVidaInforme.php">Informes de equipos</a>
							<a class="dropdown-item" href="consultasEquipos.php">Consultas de equipos</a>
							<a class="dropdown-item" href="revisionesInforme.php">Informe de revisiones</a>
							<a class="dropdown-item" href="cambiosInforme.php">Informe de cambios</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $nombre; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="cambioClave">Cambio de clave</a>
							<a class="dropdown-item" href="Libs/cerrarSesion.php">Salir</a>
						</div>
					</li>
				</ul>
			</div>
			<?php break; ?>
			<?php case '3': ?>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
    			<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Gestión
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Equipos
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Modificaciones
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Informes
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="cambioEquipo.php">Hoja de vida</a>
							<a class="dropdown-item" href="hojaDeVidaInforme.php">Informes de equipos</a>
							<a class="dropdown-item" href="consultasEquipos.php">Consultas de equipos</a>
							<a class="dropdown-item" href="revisionesInforme.php">Informe de revisiones</a>
							<a class="dropdown-item" href="cambiosInforme.php">Informe de cambios</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $nombre; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="cambioClave">Cambio de clave</a>
							<a class="dropdown-item" href="Libs/cerrarSesion.php">Salir</a>
						</div>
					</li>
				</ul>
			</div>

			<?php break; ?>

			<?php default:?>
				// code...
			<?php break;
		} ?>
	</ul>
</nav>

</body>

