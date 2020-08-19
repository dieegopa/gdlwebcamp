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
            Crear Registtro
            <small>Llena el formulario para crear un registro</small>
        </h1>
    </section>
    <div class="row">
        <div class="col-md-12">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Registro</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" method="post" action="modelo-registrado.php" name="guardar-registro" id="guardar-registro">
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
                                    <label for="email">Email: </label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <div class="paquetes" id="paquetes">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Elige el numero de boletos</h3>
                                        </div>
                                        <ul class="lista-precios clearfix row">
                                            <li class="col-md-4">
                                                <div class="tabla-precio text-center">
                                                    <h3>Pase por dia (Viernes)</h3>
                                                    <p class="numero">$30</p>
                                                    <ul>
                                                        <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                                                        <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                                        <li><i class="fas fa-check"></i> Todos los talleres</li>
                                                    </ul>
                                                    <div class="orden">
                                                        <label for="pase_dia">Boletos deseados: </label>
                                                        <input type="number" class="form-control" min="0" id="pase_dia" size="3" placeholder="0" name="boletos[un_dia][cantidad]">
                                                        <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="col-md-4">
                                                <div class="tabla-precio text-center">
                                                    <h3>Todos los dias</h3>
                                                    <p class="numero">$50</p>
                                                    <ul>
                                                        <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                                                        <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                                        <li><i class="fas fa-check"></i> Todos los talleres</li>
                                                    </ul>
                                                    <div class="orden">
                                                        <label for="pase_completo">Boletos deseados: </label>
                                                        <input type="number" class="form-control" min="0" id="pase_completo" size="3" placeholder="0" name="boletos[completo][cantidad]">
                                                        <input type="hidden" value="50" name="boletos[completo][precio]">
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="col-md-4">
                                                <div class="tabla-precio text-center">
                                                    <h3>Pase por 2 dias (Viernes y sabado)</h3>
                                                    <p class="numero">$45</p>
                                                    <ul>
                                                        <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                                                        <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                                        <li><i class="fas fa-check"></i> Todos los talleres</li>
                                                    </ul>
                                                    <div class="orden">
                                                        <label for="pase_2dia">Boletos deseados: </label>
                                                        <input type="number" class="form-control" min="0" id="pase_2dia" size="3" placeholder="0" name="boletos[dos_dias][cantidad]">
                                                        <input type="hidden" value="45" name="boletos[dos_dias][precio]">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Elige los talleres</h3>
                                    </div>
                                            <div id="eventos" class="eventos clearfix">
                                                <div class="caja">
                                                    <?php

                                                    try{
                                                        
                                                        $sql = "SELECT e.*, ce.cat_evento, i.nombre_invitado, i.apellido_invitado FROM eventos e JOIN categoria_evento ce ON (e.id_cat_evento = ce.id_categoria) JOIN invitados i ON (i.id_invitado = e.id_invitado_evento) ORDER BY e.fecha_evento, e.id_cat_evento, e.hora_evento";
                                                        $resultado = $conexion->query($sql);

                                                        $eventos_dias = array();
                                                        while($evento = $resultado->fetch_assoc()){
                                                            $fecha = $evento['fecha_evento'];
                                                            setlocale( LC_ALL, 'spanish' );
                                                            $dia_semana = strftime('%A', strtotime($fecha));
                                                            $dia_semana = ucfirst( iconv( 'ISO-8859-1', 'UTF-8', $dia_semana ) );
                                                            $categoria = $evento['cat_evento'];

                                                            $dia = array(
                                                                'nombre_evento' => $evento['nombre_evento'],
                                                                'hora_evento' => $evento['hora_evento'],
                                                                'id_evento' => $evento['evento_id'],
                                                                'nombre_invitado' => $evento['nombre_invitado'],
                                                                'apellido_invitado' => $evento['apellido_invitado']
                                                            );
                                                            $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;

                                                        }     


                                                    }catch(Exception $e){
                                                        echo $e->getMessage();
                                                    }

                                                    ?>
                                                    <?php 
                                                    foreach($eventos_dias as $dia => $eventos){                
                                                    ?>
                                                    <div id="<?php echo str_replace('á','a',$dia);?>" class="contenido-dia clearfix row">
                                                        <h4 class="text-center nombre_dia"><?php echo $dia ?></h4>
                                                        <?php foreach($eventos['eventos'] as $categoria => $evento_dia){ ?>
                                                        <div class="col-md-4">
                                                            <p><?php echo $categoria; ?></p>
                                                            <?php
                                                            foreach($evento_dia as $evento){
                                                            ?>
                                                            <label class="col-md-12">
                                                                <input type="checkbox" class="flat-red" name="registro_evento[]" id="<?php echo $evento['id_evento']; ?>" value="<?php echo $evento['id_evento']; ?>">
                                                                <?php echo ' ' . $evento['nombre_evento']; ?> <br>
                                                                <span style="margin-left: 3rem" class="autor"><?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'] ?></span> <br>
                                                                <time style="margin-left: 3rem"><?php echo $evento['hora_evento']; ?></time>
                                                            </label>
                                                            <?php 
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <!--.caja-->
                                            </div>
                                            <div class="resumen" id="resumen">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Pagos y extras</h3>
                                                </div>
                                                <br>
                                                <div class="caja clearfix row">
                                                    <div class="extras col-md-6">
                                                        <div class="orden">
                                                            <label for="camisa_evento">Camisa del evento $10 <small>(Promocion 7% descuento)</small></label>
                                                            <input type="number" class="form-control" min="0" placeholder="0" id="camisa_evento" size="3" name="pedido_extra[camisas][cantidad]">
                                                            <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                                        </div>
                                                        <!--orden-->

                                                        <div class="orden">
                                                            <label for="etiquetas_evento">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript)</small></label>
                                                            <input type="number" class="form-control" min="0" placeholder="0" id="etiquetas_evento" size="3" name="pedido_extra[etiquetas][cantidad]">
                                                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                                        </div>
                                                        <!--orden-->
                                                        <br>
                                                        <div class="orden">
                                                            <label for="regalo">Seleccione un regalo</label> <br>
                                                            <select id="regalo" name="regalo" class="form-control seleccionar" required>
                                                                <option value="" selected disabled>--Seleccione un regalo--</option>
                                                                <option value="2">Etiquetas</option>
                                                                <option value="1">Pulsera</option>
                                                                <option value="3">Pluma</option>
                                                            </select>
                                                        </div>
                                                        <!--orden-->
                                                        <br>
                                                        <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                                                    </div>
                                                    <!--extras-->

                                                    <div class="total col-md-6">
                                                        <p>Resumen: </p>
                                                        <div id="lista_productos" class="resumen_factura">

                                                        </div>
                                                        <p>Total: </p>
                                                        <div id="suma_total" class="resumen_factura">

                                                        </div>
                                                    </div>
                                                    <!--total-->
                                                </div>
                                                <!--caja-->
                                            </div>
                                            <!--resumen-->
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="crear">
                                <input type="hidden" name="total_pedido" id="total_pedido">
                                <button type="submit" class="btn btn-primary" id="botonRegistro">Añadir</button>
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
