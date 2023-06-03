Descripción

Este es un sistema de inventarios de equipos creado en php.

Características 
- Registro y consulta de usuarios con información detallada (nombre, apellido, area, cargo, sede).
- Registro y consulta de areas, cargos y sedes
- Registro y consulta de servidores y permisos para los usuarios
- Creación de administradores del sitio según permisos otorgados(operadores, administradores o consultores)
- Creacion de equipos de acuerdo a las diferentes características (marca, modelo, fecha de incorporación, procesador, SO, etc)
- Asignación de equipos a los usuarios registrados 
- Gestión de sesiones para los diferentes perfiles 
- Generación de informes según filtros

Requisitos de instalación 
- Descarga el proyecto
- Accede a la carpeta BD y descarga la base de datos, luego cargala en tu servidor
- Al ingresar al sistema habrá un login, puedes ingresar con las credenciales cargadas por defecto usuario: admin contraseña:12345
- Puedes cambiar la contraseña desde el menú principal o crear un nuevo usuario.
- Ten en cuenta que las contraseñas se almacenarán en la BD con el método SHA1, si insertas manualmente un usuario asegurate de que la contraseña esté encriptada 

Arquitectura de la BD
![image](https://github.com/eivar23/php-inventarios/assets/97815911/2ccc989e-de44-4521-92fa-8f1242228d9e)

