<?php
  $host_name = 'sql11.freemysqlhosting.net';
  $database = 'sql11393353';
  $user_name = 'sql11393353';
  $password = 'cV1lAxe2A3';

  $conexion = new mysqli($host_name, $user_name, $password, $database);

$conexion->set_charset( 'utf8' );

  if ($conexion->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $conexion->connect_error .'</p>');
  }
?>
