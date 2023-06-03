<?php
/////////////// SELECTS ///////////////

//CHECKBOX PERMISOS
function checkboxPermisos($conn, $per){
	$permiso = "SELECT id, permiso FROM permisos";
	$result = mysqli_query($conn, $permiso);
	while ($row = mysqli_fetch_array($result)) {
			echo "<tr><td><input type='checkbox' name = 'p".$row['id']."' id='p".$row['id']."' value='".$row['permiso']."'>".$row['permiso']." </input></td></tr>";
	}
}

/////////////// SELECTS ///////////////

//SELECT TIPO DE EQUIPO
function selectTipoEquipo($conn, $equ){
	$equipo = "SELECT id, tipo FROM tipos";
	$result = mysqli_query($conn, $equipo);
	while ($row = mysqli_fetch_array($result)) {
		if ($equ == $row['id']) {
			echo "<option value='".$row['id']."' selected> ".$row['tipo']." </option>";
		}else{
			echo "<option value='".$row['id']."'> ".$row['tipo']." </option>";
		}
	}
}

//SELECT AREA
function selectArea($conn, $ar){
	$area = "SELECT id, area FROM areas";
	$result = mysqli_query($conn, $area);
	while ($row = mysqli_fetch_array($result)) {
		if ($ar == $row['id']) {
			echo "<option value='".$row['id']."' selected> ".$row['area']." </option>";
		}else{
			echo "<option value='".$row['id']."'> ".$row['area']." </option>";
		}
	}
}

//SELECT CARGO
function selectCargo($conn, $ca){
	$cargo = "SELECT id, cargo FROM cargos";
	$result = mysqli_query($conn, $cargo);
	while ($row = mysqli_fetch_array($result)) {
		if ($ca == $row['id']) {
			echo "<option value='".$row['id']."' selected> ".$row['cargo']." </option>";
		}else{
			echo "<option value='".$row['id']."'> ".$row['cargo']." </option>";
		}
	}
}

//SELECT PERSONAL
function selectPersonal($conn, $per){
	$personal = "SELECT id, usuario FROM personal";
	$result = mysqli_query($conn, $personal);
	while ($row = mysqli_fetch_array($result)) {
		if ($per == $row['id']) {
			echo "<option value='".$row['id']."' selected> ".$row['usuario']." </option>";
		}else{
			echo "<option value='".$row['id']."'> ".$row['usuario']." </option>";
		}
	}
}

//SELECT SEDES
function selectSedes($conn, $sd){
	$sede = "SELECT id, sede FROM sedes";
	$result = mysqli_query($conn, $sede);
	while ($row = mysqli_fetch_array($result)) {
		if ($sd == $row['id']) {
			echo "<option value='".$row['id']."' selected> ".$row['sede']." </option>";
		}else{
			echo "<option value='".$row['id']."'> ".$row['sede']." </option>";
		}
	}
}

//SELECT SERVIDOR
function selectServidor($conn, $ser){
	$servidor = "SELECT id, servidor FROM Servidores";
	$result = mysqli_query($conn, $servidor);
	while ($row = mysqli_fetch_array($result)) {
		if ($ser == $row['id']) {
			echo "<option value='".$row['id']."' selected> ".$row['servidor']." </option>";
		}else{
			echo "<option value='".$row['id']."'> ".$row['servidor']." </option>";
		}
	}
}

//SELECT IMPRESORAS
function selectImpresora($conn, $imp){
	$nombre = "SELECT eq.id, eq.modelo, pr.nombre FROM equipos AS eq, personal AS pr WHERE pr.id = eq.idUsuario AND eq.idTipo = 5";
	$result = mysqli_query($conn, $nombre);
	while ($row = mysqli_fetch_array($result)) {
		if ($emp == $row['id']) {
			echo "<option value='".$row['id']."' selected> ".$row['modelo']." - ".$row['nombre']."</option>";
		}else{
			echo "<option value='".$row['id']."'> ".$row['modelo']." - ".$row['nombre']." </option>";
		}
	}
}
//SELECT eq.id, eq.modelo, pr.nombre FROM equipos AS eq, personal AS pr WHERE pr.id = eq.idUsuario AND eq.idTipo = 5

/////////////// EQUIPOS ///////////////

//Equipos por usuario
function listaEquiposPorUsuario($usu){
	$listaEquiposPorUsuario =
	"SELECT eq.id, eq.activo, tp.tipo, eq.marca, eq.modelo, eq.serial, eq.fechaCompra, ca.cargo, ar.area, ps.usuario, sd.sede
	FROM
	equipos as eq,
	tipos as tp,
	areas as ar,
	personal as ps,
	sedes as sd,
	cargos as ca
	WHERE eq.idTipo = tp.id
	AND ps.idArea = ar.id
	AND eq.idUsuario = ps.id
	AND ps.idSede = sd.id
	AND ps.idCargo = ca.id
	AND eq.idUsuario = '$usu'";
	return $listaEquiposPorUsuario;
}

//Lista de Equipos
function listaEquipos(){
	$listaEquipos =
	"SELECT eq.activo, tp.tipo, eq.marca, eq.modelo, eq.serial, eq.fechaCompra, ca.cargo, ar.area, ps.usuario, sd.sede
	FROM
	equipos as eq,
	tipos as tp,
	areas as ar,
	personal as ps,
	sedes as sd,
	cargos as ca
	WHERE eq.idTipo = tp.id
	AND ps.idArea = ar.id
	AND eq.idUsuario = ps.id
	AND ps.idSede = sd.id
	AND ps.idCargo = ca.id";
	return $listaEquipos;
}

//Lista de Equipos por sede
function equiposPorSede($sd){
	$equiposPorSede =
	"SELECT eq.activo, tp.tipo, eq.marca, eq.modelo, eq.serial, eq.fechaCompra, ca.cargo, ar.area, ps.usuario, sd.sede
	FROM
	equipos as eq,
	tipos as tp,
	areas as ar,
	personal as ps,
	sedes as sd,
	cargos as ca
	WHERE eq.idTipo = tp.id
	AND ps.idArea = ar.id
	AND eq.idUsuario = ps.id
	AND ps.idSede = sd.id
	AND ps.idCargo = ca.id
	AND ps.idSede = '$sd'";
	return $equiposPorSede;
}


//Lista de Equipos por area
function equiposPorArea($ar){
	$equiposPorArea =
	"SELECT eq.activo, tp.tipo, eq.marca, eq.modelo, eq.serial, eq.fechaCompra, ca.cargo, ar.area, ps.usuario, sd.sede
	FROM
	equipos as eq,
	tipos as tp,
	areas as ar,
	personal as ps,
	sedes as sd,
	cargos as ca
	WHERE eq.idTipo = tp.id
	AND ps.idArea = ar.id
	AND eq.idUsuario = ps.id
	AND ps.idSede = sd.id
	AND ps.idCargo = ca.id
	AND ps.idArea = '$ar'";
	return $equiposPorArea;
}

/////////////// CARACTERISTICAS ///////////////

//Caracteristicas por equipo
function listaCaracteristicasEquipo($equ){
	$listaCaracteristicasEquipo = "SELECT * FROM caracteristicas WHERE idEquipo = '".$equ."'";
	return $listaCaracteristicasEquipo;
}

//Caracteristicas por usuario
function listaCaracteristicasUsuario($usu){
	$listaCaracteristicasUsuario = "SELECT eq.id, tp.tipo, eq.serial, cr.nombre, cr.procesador, cr.memoria, cr.discoDuro, cr.sistemaOperativo, cr.licencia FROM equipos as eq, tipos as tp, caracteristicas as cr WHERE eq.idTipo = tp.id AND eq.idUsuario = '$usu' AND eq.id = cr.idEquipo";
	return $listaCaracteristicasUsuario;
}

/////////////// REVISIONES ///////////////

//Caracteristicas por usuario
function revisionesPC($usu){
	$revisionesPC = "SELECT eq.id, rv.revision, rv.fecha FROM equipos as eq, tipos as tp, revisiones as rv WHERE eq.idUsuario = '$usu' AND rv.idEquipo = eq.id AND tp.id = eq.idTipo AND eq.idTipo < 4";
	return $revisionesPC;
}

function listaRevisiones($usu){
	$listaRevisiones = "SELECT ps.usuario, tp.tipo, eq.marca, rv.fecha, rv.revision FROM personal as ps, equipos as eq, revisiones as rv, tipos as tp WHERE rv.idEquipo = eq.id AND eq.idTipo = tp.id AND eq.idUsuario = ps.id AND ps.id = '$usu'";
	return $listaRevisiones;
}

/////////////// USUARIOS ///////////////

//Lista de usuarios
function listaUsuarios(){
	$listaUsuarios = "SELECT * FROM usuarios";
	return $listaUsuarios;
}

//Busca un usuario en especifico
function buscarUsuario($usu){
	$usuario = "SELECT * FROM usuarios WHERE id= '$usu'";
	return $usuario;
}

/////////////// AREAS ///////////////

//Lista de areas
function listaAreas(){
	$listaAreas = "SELECT * FROM areas";
	return $listaAreas;
}

//Busca un area
function buscarAreas($ar){
	$buscarAreas = "SELECT * FROM areas WHERE id= '$ar'";
	return $buscarAreas;
}


/////////////// CARGOS ///////////////

//Lista de Cargos
function listaCargos(){
	$listaCargos = "SELECT * FROM cargos";
	return $listaCargos;
}

//Busca un cargo en especifico
function buscarCargos($ca){
	$buscarcargos = "SELECT * FROM cargos WHERE id= '$ca'";
	return $buscarcargos;
}

////////////////SERVIDOR////////////////

//Lista de servidores
function listaServidores(){
	$listaServidores = "SELECT * FROM Servidores";
	return $listaServidores;
}

//Busca un servidor
function buscarServidores($ser){
	$buscarServidores = "SELECT * FROM Servidores WHERE id= '$ser'";
	return $buscarServidores;
}

//Lista Permisos Servidor
function listaPerServidor($iduser){
	$listaPerServidor = "SELECT  ps.id, ps.idServidor,ps.usuarioSer, ps.idUsuario, s.servidor, ps.permisos  FROM permisosServidores as ps, Servidores as s WHERE ps.idServidor = s.id AND ps.idUsuario ='$iduser' ORDER BY s.servidor ";
	return $listaPerServidor;
}

////////////////PERMISOS////////////////

//Lista de permisos
function listaPermisos(){
	$listaPermisos = "SELECT * FROM Permisos";
	return $listaPermisos;
}

//Busca Permiso
function buscarPermisos($pe){
	$buscarPermisos = "SELECT * FROM Permisos WHERE id= '$pe'";
	return $buscarPermisos;
}

/////////////// PERSONAL ///////////////

//Lista de personal
function listaPersonal(){
	$listaPersonal = "SELECT ps.id, ps.usuario, ps.usuarioSer, ps.nombre, ar.area,ca.cargo, sd.sede FROM personal as ps, areas as ar, cargos as ca, sedes as sd WHERE ar.id = ps.idArea AND ca.id = ps.idCargo AND sd.id = ps.idSede ORDER BY id";
	return $listaPersonal;
}

//Busca un usuario en espesifico
function buscarPersonal($per){
	$buscarPersonal = "SELECT * FROM personal WHERE id= '$per'";
	return $buscarPersonal;
}

/////////////// SEDES ///////////////

//Lista de sedes
function listaSedes(){
	$listaSedes = "SELECT * FROM sedes";
	return $listaSedes;
}

//Busca una sede en especifico
function buscarSedes($sd){
	$buscarSedes = "SELECT * FROM sedes WHERE id= '$sd'";
	return $buscarSedes;
}

/////////////// TIPOS ///////////////

//Lista de tipos
function listaTipos(){
	$listaTipos = "SELECT * FROM tipos";
	return $listaTipos;
}

//Busca un usuario en espesifico
function buscarTipos($tp){
	$buscarTipos = "SELECT * FROM tipos WHERE id= '$tp'";
	return $buscarTipos;
}

/////////////// CAMARAS TIENDAS ///////////////

function listaCambios(){
	$listaCambios = "SELECT cm.id, cm.fechaCambio, ps.usuario as usuarioAnt, cm.idUsuarioNue, tp.tipo, eq.modelo FROM cambioEquipos as cm, personal as ps, equipos as eq, tipos as tp WHERE cm.idUsuarioAnt = ps.id AND cm.idEquipo = eq.id AND eq.idTipo = tp.id";
	return $listaCambios;
}
?>
