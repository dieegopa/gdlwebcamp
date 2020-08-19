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
            Crear Administrador
            <small>Llena el formulario para crear un administrador</small>
        </h1>
    </section>
    <div class="row">
        <div class="col-md-12">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Admin</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" method="post" action="modelo-admin.php" name="guardar-registro" id="guardar-registro">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Usuario: </label>
                                    <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre: </label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña: </label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Repetir Contraseña: </label>
                                    <input type="password" class="form-control" id="repetir_password" placeholder="Password" name="repetir_password">
                                    <span id="resultado_password" class="help-block"></span>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="crear">
                                <button type="submit" class="btn btn-primary" id="crear">Añadir</button>
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
