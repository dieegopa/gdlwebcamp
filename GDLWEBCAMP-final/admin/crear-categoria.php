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
            Crear Categorias de Eventos
            <small>Llena el formulario para crear una categoria</small>
        </h1>
    </section>
    <div class="row">
        <div class="col-md-12">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Categoria</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" method="post" action="modelo-categoria.php" name="guardar-registro" id="guardar-registro">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="categoria">Nombre Categoria: </label>
                                    <input type="text" class="form-control" id="categoria" placeholder="Categoria" name="categoria">
                                </div>
                                <div class="form-group">
                                    <label for="icono">Icono: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fas fa-anchor"></i>
                                        </div>
                                        <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="crear">
                                <button type="submit" class="btn btn-primary">Añadir</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer.php';?>
