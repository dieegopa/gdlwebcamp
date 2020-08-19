<?php

include_once 'funciones/funciones.php';
$titulo_evento = $_POST['titulo_evento'];
$categoria_evento = (int) $_POST['categoria_evento'];
$invitado_evento = (int) $_POST['invitado_evento'];
$fecha_evento = $_POST['fecha_evento'];
$fecha_formateada = date('Y-m-d', strtotime($fecha_evento));
$hora_evento = date('H:i:s',strtotime($_POST['hora_evento']));


$id_registro = (int) $_POST['id_registro'];


if($_POST['registro']=='crear'){
  
    $respuesta = array(
      '1' => $titulo_evento,
      '2' => $categoria_evento,
      '3' => $invitado_evento,
      '4' => $fecha_formateada,
      '5' => $hora_evento
    );
  
    die(json_encode($respuesta));
    
    try{
        $stmt = $conexion->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_invitado_evento ) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssii", $titulo_evento, $fecha_formateada, $hora_evento, $categoria_evento, $invitado_evento);
        $stmt->execute();
        
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $stmt->insert_id,
                'accion' => 'crear'
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

if($_POST['registro']=='editar'){
    
    try{
        $stmt = $conexion->prepare("UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_invitado_evento = ?, editado = NOW() WHERE evento_id = ?");
        $stmt->bind_param("sssiii",$titulo_evento,$fecha_formateada,$hora_evento,$categoria_evento, $invitado_evento, $id_registro);
        
        $stmt->execute();
        
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_modificado' => $id_registro,
                'accion' => 'editar'
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

if($_POST['registro']=='eliminar'){
    
    $id_borrar = (int) $_POST['id'];
    
    try{
        $stmt = $conexion->prepare('DELETE FROM eventos WHERE evento_id = ?');
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
