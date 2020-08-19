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
            Listado de Categorias
            <small>Aqui podras editar o borrar las categorias</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Maneja las categorias en esta seccion</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Icono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                try {
                                    $sql = "SELECT id_categoria, cat_evento, icono FROM categoria_evento";
                                    $resultado= $conexion->query($sql);
                                }catch (Exception $e){
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                
                                while($cat_evento = $resultado->fetch_assoc()){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $cat_evento['cat_evento']; ?>
                                    </td>
                                    <td>
                                        <i class="<?php echo $cat_evento['icono']; ?>"></i>
                                    </td>
                                    <td>
                                        <a href="editar-categoria.php?id=<?php echo $cat_evento['id_categoria']?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" data-id="<?php echo $cat_evento['id_categoria']?>" data-tipo="categoria" class="btn bg-maroon btn-falt margin borrar-registro"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>


                                <?php
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Icono</th>
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
