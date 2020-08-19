<?php include_once 'includes/templates/header.php'?>

<section class="seccion contenedor">
<h2>Calendario de Eventos</h2>

<?php

try {

    require_once( 'includes/funciones/bd_conexion.php' );

    $sql = 'SELECT e.evento_id, e.nombre_evento, e.fecha_evento, e.hora_evento, ce.cat_evento, ce.icono,  i.nombre_invitado, i.apellido_invitado, i.descripcion_invitado 
                    FROM eventos e JOIN categoria_evento ce ON(e.id_cat_evento = ce.id_categoria) JOIN invitados i ON (e.id_invitado_evento = i.id_invitado) 
                    ORDER BY e.evento_id';
    $resultado = $conexion->query( $sql );

} catch ( Exception $e ) {
    echo $e->getMessage();
}

?>

<div class="calendario">
<?php

$calendario =  array();

while( $eventos = $resultado->fetch_assoc() ) {
    //obtiene la fecha del evento

    $fecha = $eventos['fecha_evento'];
    $evento = array(
        'titulo' => $eventos['nombre_evento'],
        'fecha' => $eventos['fecha_evento'],
        'hora' => $eventos['hora_evento'],
        'categoria' => $eventos['cat_evento'],
        'icono' => $eventos['icono'],
        'invitado' => $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']
    );

    $calendario[$fecha][] = $evento;
}

?>

<?php

//Imprime todos los eventos

foreach ( $calendario as $dia => $lista_eventos ) {

    ?>

    <h3>
    <i class="fa fa-calendar"></i>
    <?php
    setlocale( LC_ALL, 'es_ES.utf8' );
    $dateutf = strftime( '%A, %d de %B del %Y', strtotime( $dia ) );
    $dateutf = ucfirst( iconv( 'ISO-8859-1', 'UTF-8', $dateutf ) );
    echo $dateutf;
    ?>
    </h3>

    <?php foreach ( $lista_eventos as $e ) {
        ?>
        <div class="dia">
        <p class="titulo"><?php  echo $e['titulo']?></p>
        <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $e['fecha'] . ' ' . $e['hora'];
        ?> </p>
        <p> <i class="<?php echo $e['icono']; ?>"></i>  <?php echo $e['categoria'];
        ?></p>
        <p> <i class="fa fa-user" aria-hidden="true"></i> <?php echo $e['invitado'];
        ?></p>

        </div>

        <?php
    }
    //fin for each eventos
    ?>
    <?php

}
//fin for each dias

?>

</div>

<?php $conexion->close();
?>

</section>

<?php include_once 'includes/templates/footer.php'?>
