<?php

include_once 'funciones/funciones.php';
$categoria = $_POST['categoria'];
$icono = $_POST['icono'];
$id_registro = $_POST['id_registro'];

if($_POST['registro']=='crear'){
    
    try {
        $stmt = $conexion->prepare("INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?)");
        $stmt->bind_param("ss", $categoria, $icono);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_categoria' => $stmt->insert_id
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
        
        $stmt = $conexion->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW()  WHERE id_categoria = ?');
        $stmt->bind_param("ssi", $categoria, $icono ,$id_registro);
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
        $stmt = $conexion->prepare('DELETE FROM categoria_evento WHERE id_categoria = ?');
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
