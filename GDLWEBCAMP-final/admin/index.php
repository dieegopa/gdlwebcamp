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
            Dashboard
            <small>Informacion sobre el evento</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Compras Diarias</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="grafica_registros" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <h2 class="page-header">Resumen de Registrados</h2>
        <div class="row">

            <div class="col-lg-3 col-xs-6">
                <?php
                
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados";
                $resultado = $conexion->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php
                
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE pagado = 1";
                $resultado = $conexion->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php
                
                $sql = "SELECT COUNT(ID_Registrado) AS registros FROM registrados WHERE pagado = 0";
                $resultado = $conexion->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Sin Pagar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php
                
                $sql = "SELECT SUM(total_pagado) AS total FROM registrados WHERE pagado = 1";
                $resultado = $conexion->query($sql);
                $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo '$'.$registrados['total']; ?></h3>

                        <p>Ganancias</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <h2 class="page-header">Regalos</h2>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <?php
                
                $sql = "SELECT COUNT(regalo) AS pulseras FROM registrados WHERE regalo = 1 AND pagado = 1";
                $resultado = $conexion->query($sql);
                $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3><?php echo $regalo['pulseras']; ?></h3>

                        <p>Pulseras</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php
                
                $sql = "SELECT COUNT(regalo) AS etiquetas FROM registrados WHERE regalo = 2 AND pagado = 1";
                $resultado = $conexion->query($sql);
                $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3><?php echo $regalo['etiquetas']; ?></h3>

                        <p>Etiquetas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <?php
                
                $sql = "SELECT COUNT(regalo) AS plumas FROM registrados WHERE regalo = 3 AND pagado = 1";
                $resultado = $conexion->query($sql);
                $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-purple-active">
                    <div class="inner">
                        <h3><?php echo $regalo['plumas']; ?></h3>

                        <p>Plumas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Mas informacion <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'templates/footer.php';?>
