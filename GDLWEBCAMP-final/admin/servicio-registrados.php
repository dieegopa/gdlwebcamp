<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

$sql = "SELECT DATE(fecha_registro) AS fecha, COUNT(*) AS resultado FROM registrados GROUP BY fecha ORDER BY fecha";

$resultado = $conexion->query($sql);

$arreglo_registros = array();

while($registro_dia = $resultado->fetch_assoc()){
    $fecha = $registro_dia['fecha'];
    $registro['fecha'] = date('y-m-d', strtotime($fecha));
    $registro['cantidad']= $registro_dia['resultado'];
    $arreglo_registros[] = $registro;
}

echo json_encode($arreglo_registros);

?>
