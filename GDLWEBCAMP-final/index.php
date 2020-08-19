<?php include_once 'includes/templates/header.php'?>


<section class="seccion contenedor">
    <h2>La mejor conferencia de Diseño Web en Español</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic placeat eligendi esse cupiditate, sed officiis odit! Neque dolorem beatae delectus accusamus autem, nesciunt quo eligendi aut in dignissimos, obcaecati! Porro.</p>
</section>

<section class="programa">
    <div class="contenedor-video">
        <video autoplay muted loop poster="img/bg-talleres.jpg">
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogv">

        </video>
    </div>
    <!--Contenedor video-->

    <div class="contenido-programa">
        <div class="contenedor">
            <div class="programa-evento">
                <h2>Programa del evento</h2>
                
                <?php

                try {

                    require_once( 'includes/funciones/bd_conexion.php' );

                    $sql = 'SELECT * FROM `categoria_evento`';
                    $resultado = $conexion->query( $sql );

                } catch ( Exception $e ) {
                    echo $e->getMessage();
                }

                ?>
                
                
                <nav class="menu-programa">
                   <?php 
                    
                        while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    
                    <a href="#<?php echo strtolower($cat['cat_evento']); ?>"><i class="<?php echo $cat['icono'] ?>"></i><?php echo $cat['cat_evento']; ?></a>
                         
                               
                    <?php        
                        }
                    
                    ?>
                </nav>
                
                <?php

                try {

                    require_once( 'includes/funciones/bd_conexion.php' );

                    $sql = 'SELECT e.evento_id, e.nombre_evento, e.fecha_evento, e.hora_evento, ce.cat_evento, ce.icono,  i.nombre_invitado, i.apellido_invitado, i.descripcion_invitado 
                                    FROM eventos e JOIN categoria_evento ce ON(e.id_cat_evento = ce.id_categoria) JOIN invitados i ON (e.id_invitado_evento = i.id_invitado) 
                                    WHERE e.id_cat_evento = 1
                                    ORDER BY e.evento_id LIMIT 2; ';
                    $sql .= 'SELECT e.evento_id, e.nombre_evento, e.fecha_evento, e.hora_evento, ce.cat_evento, ce.icono,  i.nombre_invitado, i.apellido_invitado, i.descripcion_invitado 
                                    FROM eventos e JOIN categoria_evento ce ON(e.id_cat_evento = ce.id_categoria) JOIN invitados i ON (e.id_invitado_evento = i.id_invitado) 
                                    WHERE e.id_cat_evento = 2
                                    ORDER BY e.evento_id LIMIT 2; ';
                    $sql .= 'SELECT e.evento_id, e.nombre_evento, e.fecha_evento, e.hora_evento, ce.cat_evento, ce.icono,  i.nombre_invitado, i.apellido_invitado, i.descripcion_invitado 
                                    FROM eventos e JOIN categoria_evento ce ON(e.id_cat_evento = ce.id_categoria) JOIN invitados i ON (e.id_invitado_evento = i.id_invitado) 
                                    WHERE e.id_cat_evento = 3
                                    ORDER BY e.evento_id LIMIT 2;';

                } catch ( Exception $e ) {
                    echo $e->getMessage();
                }

                ?>
                
                
                <?php 
                
                    $conexion->multi_query($sql);
                
                    do{
                        $resultado = $conexion->store_result();
                        $row = $resultado->fetch_all(MYSQLI_ASSOC);
                        $i=0;
                ?>
                
                <?php 
                  
                    foreach($row as $evento):
                        if($i % 2 == 0){
                ?>
                      
                      <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar clearfix">
                <?php 
                        }
                ?>
                            <div class="evento">
                                <h3><?php echo $evento['nombre_evento'];?></h3>
                                <p><i class="fa fa-clock"></i> <?php echo $evento['hora_evento']; ?></p>
                                <p><i class="fa fa-calendar"></i> <?php echo $evento['fecha_evento']; ?></p>
                                <p><i class="fa fa-user"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
                            </div>

                            
                <?php 
                        if($i %2 == 1 ) {
                ?>
                        <a href="calendario.php" class="boton float-right">Ver Todos</a>
                        </div>
                
                <?php
                        }          
                ?>
                      
                       
                <?php
                    $i++;
                    endforeach;
                    $resultado->free();
                ?>
                
                
                <?php        
                           
                    }while($conexion->more_results() && $conexion->next_result());
                    
                ?>

                
            </div>
            <!--programa-evento-->
        </div>
        <!--Contenedor-->
    </div>
    <!--contenido-programa-->
</section>

<?php include_once 'includes/templates/invitados.php'?>


<div class="contador parallax">
    <div class="contenedor">
        <ul class="resumen-evento clearfix">
            <li>
                <p class="numero"></p>Invitados
            </li>
            <li>
                <p class="numero"></p>Talleres
            </li>
            <li>
                <p class="numero"></p>Dias
            </li>
            <li>
                <p class="numero"></p>Conferencias
            </li>
        </ul>
    </div>
</div>


<section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
        <ul class="lista-precios clearfix">
            <li>
                <div class="tabla-precio">
                    <h3>Pase por dia</h3>
                    <p class="numero">$30</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                        <li><i class="fas fa-check"></i> Todas las conferencias</li>
                        <li><i class="fas fa-check"></i> Todos los talleres</li>
                    </ul>
                    <a href="registro.php" class="boton hollow">Comprar</a>
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
                    <a href="registro.php" class="boton">Comprar</a>
                </div>
            </li>

            <li>
                <div class="tabla-precio">
                    <h3>Pase por 2 dias</h3>
                    <p class="numero">$45</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                        <li><i class="fas fa-check"></i> Todas las conferencias</li>
                        <li><i class="fas fa-check"></i> Todos los talleres</li>
                    </ul>
                    <a href="registro.php" class="boton hollow">Comprar</a>
                </div>
            </li>
        </ul>
    </div>
</section>


<div id="mapa" class="mapa">

</div>

<section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">

        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, enim! Inventore iusto repellat soluta ratione neque debitis voluptates quam repellendus obcaecati reiciendis voluptatibus nam nisi, aspernatur delectus mollitia natus quos!</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador Web</span></cite>
                </footer>
            </blockquote>
        </div>
        <!--Testimonial-->

        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, enim! Inventore iusto repellat soluta ratione neque debitis voluptates quam repellendus obcaecati reiciendis voluptatibus nam nisi, aspernatur delectus mollitia natus quos!</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador Web</span></cite>
                </footer>
            </blockquote>
        </div>
        <!--Testimonial-->

        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, enim! Inventore iusto repellat soluta ratione neque debitis voluptates quam repellendus obcaecati reiciendis voluptatibus nam nisi, aspernatur delectus mollitia natus quos!</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo Aponte Escobedo <span>Diseñador Web</span></cite>
                </footer>
            </blockquote>
        </div>
        <!--Testimonial-->
    </div>
</section>

<div class="newsletter parallax">
    <div class="contenido contenedor">
        <p>Registrate al Newsletter</p>
        <h3>GDLWebCamp</h3>
        <a href="#mc_embed_signup" class="boton transparente boton_newsletter">Registro</a>
    </div>
</div>

<section class="seccion contenedor">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva">
        <ul class="clearfix">
            <li>
                <p class="numero" id="dias"></p> Dias
            </li>
            <li>
                <p class="numero" id="horas"></p> Horas
            </li>
            <li>
                <p class="numero" id="minutos"></p> Minutos
            </li>
            <li>
                <p class="numero" id="segundos"></p> Segundos
            </li>
        </ul>
    </div>
</section>


<?php include_once 'includes/templates/footer.php'?>
