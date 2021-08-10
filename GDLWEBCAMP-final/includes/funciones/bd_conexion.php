<?php
  $host_name_db = 'hosting';
  $database_db = 'name';
  $user_name_db = 'username';
  $password_db = 'password';

  $conexion = new mysqli($host_name_db, $user_name_db, $password_db, $database_db);

$conexion->set_charset( 'utf8' );

  if ($conexion->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $conexion->connect_error .'</p>');
  }
?>
