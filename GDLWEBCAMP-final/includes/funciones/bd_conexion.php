<?php
  $host_name_db = 'sql11.freemysqlhosting.net';
  $database_db = 'sql11393353';
  $user_name_db = 'sql11393353';
  $password_db = 'cV1lAxe2A3';

  $conexion = new mysqli($host_name_db, $user_name_db, $password_db, $database_db);

$conexion->set_charset( 'utf8' );

  if ($conexion->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $conexion->connect_error .'</p>');
  }
?>
