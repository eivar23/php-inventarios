CREATE DATABASE sistemasgyg_inventarios;

USE sistemasgyg_inventarios;

CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `area` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
);

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cargo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
);

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `sede` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
);

CREATE TABLE `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuarioSer` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idArea` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idSede` int(11) NOT NULL
);

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
);



CREATE TABLE `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idUsuario` int(11) NOT NULL,
  `activo` char(20) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `marca` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `modelo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `serial` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fechaCompra` date NOT NULL
);

CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idEquipo` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `procesador` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `memoria` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `discoDuro` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sistemaOperativo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `licencia` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
);

CREATE TABLE `cambioEquipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fechaCambio` date NOT NULL,
  `idUsuarioAnt` int(11) NOT NULL,
  `idUsuarioNue` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL
);

CREATE TABLE `revisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idEquipo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `revision` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
);

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL UNIQUE KEY,
  `clave` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` int(3) NOT NULL
);


CREATE TABLE `Servidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `servidor` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL UNIQUE KEY,
  `ubicacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci,
  `tecnologia` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci

);

CREATE TABLE `Permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `permiso` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL UNIQUE KEY
);

CREATE TABLE `permisosServidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idUsuario` int(11) NOT NULL,
  `idServidor` int(11) NOT NULL,
  `usuarioSer` CHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `permisos` CHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  foreign key(idUsuario) references personal(id),
  foreign key(idServidor) references Servidores(id)
);

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `perfil`) VALUES
(1, 'sbeltran', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Sandra Beltran', 1);

GRANT ALL ON sistemasgyg_inventarios.* TO sistemasgyg_invent@localhost IDENTIFIED BY 'S1st3m4s.2020' WITH GRANT OPTION;
