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
            Crear Evento
            <small>Llena el formulario para crear un evento</small>
        </h1>
    </section>
    <div class="row">
        <div class="col-md-12">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Evento</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" method="post" action="modelo-evento.php" name="guardar-registro" id="guardar-registro">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="titulo_evento">Titulo Evento: </label>
                                    <input type="text" class="form-control" id="titulo_evento" placeholder="Titulo Evento" name="titulo_evento">
                                </div>
                                <div class="form-group">
                                    <label for="categoria_evento">Categoria: </label>
                                    <select name="categoria_evento" id="categoria_evento" class="form-control seleccionar">
                                        <option value="0" disabled="true" selected>--Selecciona--</option>
                                        <?php 
                                        try{
                                            $sql = "SELECT * FROM categoria_evento";
                                            $resultado = $conexion->query($sql);
                                            while($cat_evento = $resultado->fetch_assoc()){?>
                                        <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                            <?php echo $cat_evento['cat_evento']; ?>
                                        </option>


                                        <?php    
                                            }
                                        }catch(Exception $e){
                                            echo $e->getMessage();
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_evento">Fecha Evento:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="fecha_evento" name="fecha_evento">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="hora_evento">Hora:</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control hora_evento" id="hora_evento" name="hora_evento">

                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="invitado_evento">Invitado: </label>
                                    <select name="invitado_evento" id="invitado_evento" class="form-control seleccionar">
                                        <option value="0" disabled="true" selected>--Selecciona--</option>
                                        <?php 
                                        try{
                                            $sql = "SELECT id_invitado, nombre_invitado, apellido_invitado FROM invitados";
                                            $resultado = $conexion->query($sql);
                                            while($invitado = $resultado->fetch_assoc()){?>
                                        <option value="<?php echo $invitado['id_invitado']; ?>">
                                            <?php echo $invitado['nombre_invitado'] . ' ' . $invitado['apellido_invitado']; ; ?>
                                        </option>


                                        <?php    
                                            }
                                        }catch(Exception $e){
                                            echo $e->getMessage();
                                        }
                                        ?>
                                    </select>
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
