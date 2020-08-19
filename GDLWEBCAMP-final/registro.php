<?php include_once 'includes/templates/header.php'?>

<section class="seccion contenedor">
    <h2>Registro de usuarios</h2>
    <form class="registro" id="registro" action="pagar.php" method="post">
        <div id="datos_usuario" class="registro caja clearfix">
            <div class="campo">
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
            </div>
            <div class="campo">
                <label for="apellido">Apellido: </label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu apellido">
            </div>
            <div class="campo">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" placeholder="Tu email">
            </div>
            <div id="error"></div>
        </div>
        <!--datos-usuario-->

        <div class="paquetes" id="paquetes">
            <h3>Elige el numero de boletos</h3>
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por dia (Viernes)</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dia">Boletos deseados: </label>
                            <input type="number" min="0" id="pase_dia" size="3" placeholder="0" name="boletos[un_dia][cantidad]">
                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                        </div>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>Todos los dias</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_completo">Boletos deseados: </label>
                            <input type="number" min="0" id="pase_completo" size="3" placeholder="0" name="boletos[completo][cantidad]">
                            <input type="hidden" value="50" name="boletos[completo][precio]">
                        </div>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 dias (Viernes y sabado)</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_2dia">Boletos deseados: </label>
                            <input type="number" min="0" id="pase_2dia" size="3" placeholder="0" name="boletos[dos_dias][cantidad]">
                            <input type="hidden" value="45" name="boletos[dos_dias][precio]">
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div id="eventos" class="eventos clearfix">
            <h3>Elige tus talleres</h3>
            <div class="caja">
                <?php
                
                try{
                    require_once('includes/funciones/bd_conexion.php');
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
                <?php
                setlocale( LC_ALL, 'spanish' );
                $dia_semana = strftime('%A', strtotime($dia));
                $dia_semana = ucfirst( iconv( 'ISO-8859-1', 'UTF-8', $dia_semana ) );
                ?>
                <div id="<?php echo str_replace('á','a',$dia_semana);?>" class="contenido-dia clearfix">
                    <h4><?php echo $dia_semana ?></h4>
                    <?php foreach($eventos['eventos'] as $categoria => $evento_dia){ ?>
                    <div>
                        <p><?php echo $categoria; ?></p>
                        <?php
                        foreach($evento_dia as $evento){
                        ?>
                        <label>
                            <input type="checkbox" name="registro[]" id="<?php echo $evento['id_evento']; ?>" value="<?php echo $evento['id_evento']; ?>">
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
        <!--#eventos-->

        <div class="resumen" id="resumen">
            <h3>Pago y extras</h3>
            <div class="caja clearfix">
                <div class="extras">
                    <div class="orden">
                        <label for="camisa_evento">Camisa del evento $10 <small>(Promocion 7% descuento)</small></label>
                        <input type="number" min="0" placeholder="0" id="camisa_evento" size="3" name="pedido_extra[camisas][cantidad]">
                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                    </div>
                    <!--orden-->

                    <div class="orden">
                        <label for="etiquetas_evento">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript)</small></label>
                        <input type="number" min="0" placeholder="0" id="etiquetas_evento" size="3" name="pedido_extra[etiquetas][cantidad]">
                        <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                    </div>
                    <!--orden-->
                    <div class="orden">
                        <label for="regalo">Seleccione un regalo</label>
                        <select id="regalo" name="regalo" required>
                            <option value="" selected disabled>--Seleccione un regalo--</option>
                            <option value="2">Etiquetas</option>
                            <option value="1">Pulsera</option>
                            <option value="3">Pluma</option>
                        </select>
                    </div>
                    <!--orden-->

                    <input type="button" id="calcular" class="boton" value="Calcular">
                </div>
                <!--extras-->

                <div class="total">
                    <p>Resumen: </p>
                    <div id="lista_productos" class="resumen_factura">

                    </div>
                    <p>Total: </p>
                    <div id="suma_total" class="resumen_factura">

                    </div>
                    <input type="hidden" name="total_pedido" id="total_pedido">
                    <input type="submit" id="botonRegistro" class='boton' Value="Pagar" name="submit">
                </div>
                <!--total-->
            </div>
            <!--caja-->
        </div>
        <!--resumen-->
    </form>
</section>

<?php include_once 'includes/templates/footer.php'?>
