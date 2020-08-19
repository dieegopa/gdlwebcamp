<?php 
    define( 'DB_USUARIO', '9Wn2HYok0g' );
    define( 'DB_PASSWORD', 'OAbm3kEWiu' );
    define( 'DB_HOST', 'remotemysql.com' );
    define( 'DB_NOMBRE', '9Wn2HYok0g' );

    $conexion = new mysqli( DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE );

    if($conexion->connect_error) {
        echo $error -> $conexion->connect_error;
    }

?>
