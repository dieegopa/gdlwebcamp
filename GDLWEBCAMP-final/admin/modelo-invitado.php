<?php

include_once 'funciones/funciones.php';
$nombre_invitado = $_POST['nombre'];
$apellido_invitado = $_POST['apellido'];
$descripcion_invitado = $_POST['descripcion'];
$id_registro = $_POST['id_registro'];


if($_POST['registro']=='crear'){
    
//    $respuesta = array(
//                'post' => $_POST,
//                'files' => $_FILES
//            );
//    
//    die(json_encode($respuesta));
    
    $directorio = "../img/invitados/";
    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    
    if(move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio . $_FILES['imagen']['name'])){
        $imagen_url = $_FILES['imagen']['name'];
        $imagen_resultado = "Se subio correctamente";
    }else {
        $respuesta = array(
            'error' => error_get_last()
        );
    }
    
    try{
        $stmt = $conexion->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion_invitado, url_imagen ) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $nombre_invitado, $apellido_invitado, $descripcion_invitado, $imagen_url);
        $stmt->execute();
        
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $stmt->insert_id,
                'accion' => 'crear',
                'resultado_imagen' => $imagen_resultado
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
    
    $directorio = "../img/invitados/";
    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    
    if(move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio . $_FILES['imagen']['name'])){
        $imagen_url = $_FILES['imagen']['name'];
        $imagen_resultado = "Se subio correctamente";
    }else {
        $respuesta = array(
            'error' => error_get_last()
        );
    }
    
    try{
        if($_FILES['imagen']['size'] > 0){
            $stmt = $conexion->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion_invitado = ?, url_imagen = ?, editado = NOW() WHERE id_invitado = ?");
            $stmt->bind_param("ssssi",$nombre_invitado, $apellido_invitado, $descripcion_invitado, $imagen_url, $id_registro);
        
            $stmt->execute();
        } else {
            $stmt = $conexion->prepare("UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion_invitado = ?, editado = NOW() WHERE id_invitado = ?");
            $stmt->bind_param("sssi",$nombre_invitado, $apellido_invitado, $descripcion_invitado, $id_registro);
        
            $stmt->execute();
            
        }
        
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
        $stmt = $conexion->prepare('DELETE FROM invitados WHERE id_invitado = ?');
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
