<?php

include_once 'funciones/funciones.php';
$nombre= $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$boletos_adquiridos = $_POST['boletos'];
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
$total = $_POST['total_pedido'];
$regalo = (int) $_POST['regalo'];
$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);
$fecha_registro = $_POST['fecha_registro'];
$id_registro = $_POST['id_registro'];

$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);



if($_POST['registro']=='crear'){
    
    try {
        $stmt = $conexion->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?,?,?,NOW(),?,?,?,?,1)");
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
        $stmt->execute();
        
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_registrado' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        
        $stmt->close();
        $conexion->close();
        
    } catch(Exception $e){
        $respuesta = array(
                'respuesta' => "Error:". $e->getMessage()
            );
    }
    
    die(json_encode($respuesta));
}

if($_POST['registro']=='editar'){
    
    try{
        
        $stmt = $conexion->prepare('UPDATE registrados SET nombre_registrado = ?, apellido_registrado = ?, email_registrado = ? , fecha_registro = ?, pases_articulos = ?, talleres_registrados = ? , regalo = ?, total_pagado = ?, pagado = 1, editado = NOW() WHERE ID_Registrado = ?');
        $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro);
        $stmt->execute();
        
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro,
                'accion' => 'editar'
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        
        
        $stmt->close();
        $conexion->close();
        
    } catch(Exception $e){
        $respuesta = array(
                'respuesta' => $e->getMessage()
        );
    }
        
    die(json_encode($respuesta));
}

if($_POST['registro']=='eliminar'){
    
    $id_borrar = (int) $_POST['id'];
    
    try{
        $stmt = $conexion->prepare('DELETE FROM registrados WHERE ID_Registrado = ?');
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar,
                'accion' => 'eliminar'
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        
        
        $stmt->close();
        $conexion->close();
    
        
    }catch(Exception $e){
        $respuesta = array(
                'respuesta' => $e->getMessage()
        );
    }
    
    die(json_encode($respuesta));
}

?>
