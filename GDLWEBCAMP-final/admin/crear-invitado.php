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
            Crear Invitado
            <small>Llena el formulario para crear un invitado</small>
        </h1>
    </section>
    <div class="row">
        <div class="col-md-12">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Invitado</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" method="post" action="modelo-invitado.php" name="guardar-registro" id="guardar-registro-archivo" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre: </label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido: </label>
                                    <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion: </label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="8" placeholder="Biografia"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen: </label>
                                    <input class="form-control" type="file" id="imagen" name="imagen">
                                    <p class="help-block">Agrega la imagen del invitado aqui.</p>
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
