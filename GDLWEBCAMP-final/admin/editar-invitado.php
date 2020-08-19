<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

$id = $_GET['id'];

if(!filter_var($id, FILTER_VALIDATE_INT)){
    die('error');
}

include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Invitado
            <small>Llena el formulario para editar un invitado</small>
        </h1>
    </section>
    <div class="row">
        <div class="col-md-8">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Invitado</h3>
                    </div>
                    <div class="box-body">
                        <?php 
                        $sql = "SELECT * FROM invitados WHERE id_invitado = $id";
                        $resultado = $conexion->query($sql);
                        $invitado = $resultado->fetch_assoc();
                        ?>
                        <!-- form start -->
                        <form role="form" method="post" action="modelo-invitado.php" name="guardar-registro" id="guardar-registro-archivo" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre: </label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $invitado['nombre_invitado']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido: </label>
                                    <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" value="<?php echo $invitado['apellido_invitado']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion: </label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="8" placeholder="Biografia"><?php echo $invitado['descripcion_invitado']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imagen_actual">Imagen Actual: </label>
                                    <br>
                                    <img src="../img/invitados/<?php echo $invitado['url_imagen']; ?>" alt="imagen_actual" width="200">
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen: </label>
                                    <input class="form-control" type="file" id="imagen" name="imagen">
                                    <p class="help-block">Agrega la imagen del invitado aqui.</p>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="editar">
                                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-primary">Editar</button>
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
