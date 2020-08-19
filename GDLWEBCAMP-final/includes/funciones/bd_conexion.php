<?php 
    $conexion = new mysqli('remotemysql.com','9Wn2HYok0g','OAbm3kEWiu','9Wn2HYok0g');

    if($conexion->connect_error) {
        echo $error -> $conexion->connect_error;
    }

?>
