<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Listado de Eventos
            <small>Aqui podras editar o borrar los eventos</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Maneja los eventos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Categoria</th>
                                    <th>Invitado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                try {
                                    $sql = "SELECT e.evento_id, e.nombre_evento, e.fecha_evento, e.hora_evento, ce.cat_evento , CONCAT(i.nombre_invitado, ' ' ,i.apellido_invitado) AS invitado FROM eventos e JOIN categoria_evento ce ON (e.id_cat_evento = ce.id_categoria) JOIN invitados i ON (e.id_invitado_evento = i.id_invitado)";
                                    $resultado= $conexion->query($sql);
                                    
                                }catch (Exception $e){
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                
                                while($evento = $resultado->fetch_assoc()){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $evento['nombre_evento']; ?>
                                    </td>
                                    <td>
                                        <?php echo $evento['fecha_evento']; ?>
                                    </td>
                                    <td>
                                        <?php echo $evento['hora_evento']; ?>
                                    </td>
                                    <td>
                                        <?php echo $evento['cat_evento']; ?>
                                    </td>
                                    <td>
                                        <?php echo $evento['invitado']; ?>
                                    </td>
                                    <td>
                                        <a href="editar-evento.php?id=<?php echo $evento['evento_id'];?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" data-id="<?php echo $evento['evento_id'];?>" data-tipo="evento" class="btn bg-maroon btn-falt margin borrar-registro"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>


                                <?php
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Categoria</th>
                                    <th>Invitado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer.php';?>
