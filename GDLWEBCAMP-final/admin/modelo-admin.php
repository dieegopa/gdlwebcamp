<?php

include_once 'funciones/funciones.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];

if($_POST['registro']=='crear'){
    
    $opciones = array(
        'cost' => 12
    );
    
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
    
    try {
        $stmt = $conexion->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        
        $stmt->close();
        $conexion->close();
        
    } catch(Exception $e){
        echo "Error:". $e->getMessage();
    }
    
    die(json_encode($respuesta));
}

if($_POST['registro']=='editar'){
    
    $opciones = array(
        'cost' => 12
    );
    
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    
    try{
        
        if(empty($_POST['password'])){
            $stmt = $conexion->prepare('UPDATE admins SET usuario = ? , nombre = ?, editado = NOW()  WHERE id_admin = ?');
            $stmt->bind_param("ssi", $usuario, $nombre ,$id_registro);
            $stmt->execute();
        } else {
            $stmt = $conexion->prepare('UPDATE admins SET usuario = ? , nombre = ? , password = ?, editado = NOW() WHERE id_admin = ?');
            $stmt->bind_param("sssi", $usuario, $nombre, $password_hashed ,$id_registro);
            $stmt->execute();   
        }
        
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id,
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
        $stmt = $conexion->prepare('DELETE FROM admins WHERE id_admin = ?');
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