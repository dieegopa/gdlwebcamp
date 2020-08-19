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
            Listado de Registrados
            <small>Aqui podras editar o borrar las personas registradas</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Maneja las personas registradas en esta seccion</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha Registro</th>
                                    <th>Pases Articulos</th>
                                    <th>Talleres Registrados</th>
                                    <th>Regalo</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                try {
                                    $sql = "SELECT re.*, reg.nombre_regalo FROM registrados re JOIN regalos reg ON (re.regalo = reg.ID_regalo)";
                                    $resultado= $conexion->query($sql);
                                }catch (Exception $e){
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                
                                while($registrado = $resultado->fetch_assoc()){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $registrado['nombre_registrado'] . ' ' . $registrado['apellido_registrado']; 
                                            $pagado = $registrado['pagado'];
                                            if($pagado){
                                                echo '<span class="badge bg-green">Pagado</span>';
                                            }  else {
                                                echo '<span class="badge bg-red">No Pagado</span>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $registrado['email_registrado']; ?>
                                    </td>
                                    <td>
                                        <?php echo $registrado['fecha_registro']; ?>
                                    </td>
                                    <td>
                                        <?php $articulos = json_decode( $registrado['pases_articulos'], true);
                                        $arreglo_articulos = array(
                                            'un_dia' => 'Pase un dia',
                                            'pase_2dias' => 'Pase dos dias',
                                            'pase_completo' => 'Pase completo',
                                            'camisas' => 'Camisas',
                                            'etiquetas' => 'Etiquetas'
                                        );
                                    
                                        
                                        foreach($articulos as $key => $value){
                                            if(array_key_exists('cantidad', $value)){
                                            if($value['cantidad'] != '0'){
                                                 echo $value['cantidad'] . ' ' . $arreglo_articulos[$key] .  "<br>";   
                                                }
                                            } else {
                                            echo $value . ' ' . $arreglo_articulos[$key] .  "<br>";   
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php $eventos_resultado = $registrado['talleres_registrados']; 
                                        
                                        $talleres = json_decode($eventos_resultado, true);
                                        $talleres = implode("', '", $talleres['eventos']);
                                        $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos OR evento_id IN ('$talleres')";
                                        
                                        $resultado_talleres = $conexion->query($sql_talleres);
                                                                           
                                        while( $eventos = $resultado_talleres->fetch_assoc()){
                                            echo $eventos['nombre_evento'] . ' ' . $eventos['fecha_evento'] . ' ' . $eventos['hora_evento'] . '<br>';
                                            
                                        }
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $registrado['nombre_regalo']; ?>
                                    </td>
                                    <td>
                                        <?php echo '$ ' . $registrado['total_pagado']; ?>
                                    </td>
                                    <td>
                                        <a href="editar-registrado.php?id=<?php echo $registrado['ID_Registrado']?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" data-id="<?php echo $registrado['ID_Registrado']?>" data-tipo="registrado" class="btn bg-maroon btn-falt margin borrar-registro"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>


                                <?php
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha Registro</th>
                                    <th>Pases Articulos</th>
                                    <th>Talleres Registrados</th>
                                    <th>Regalo</th>
                                    <th>Total</th>
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
