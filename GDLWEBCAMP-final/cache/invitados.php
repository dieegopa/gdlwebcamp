<html>

<head>
    <meta charset="utf-8">
    <title>GDLWebCamp</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css?v=1597801618">

    <link rel="stylesheet" href="css/colorbox.css?v=<?php echo time(); ?>">    <link rel="stylesheet" href="css/main.css?v=1597801618">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css?v=1597801618" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=PT+Sans&display=swap?v=1597801618" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css?v=1597801618" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js?v=1597801618" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


    <meta name="theme-color" content="#fafafa">
</head>

<body class="invitados">

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>

                <div class="informacion-evento">
                    <p class="fecha"><i class="far fa-calendar-alt"></i> 10-12-Dic</p>
                    <p class="ciudad"> <i class="fas fa-map-marker-alt"></i> Quito, EC</p>
                </div>


                <div class="titulo">
                    <h1 class="nombre-sitio">GdlWebCamp</h1>

                    <p class="slogan">La mejor conferencia de <span>Diseño Web</span></p>
                </div>

            </div>
        </div>
    </header>


    <div class="barra">
        <div class="contenedor clearfix">
            <div class="barra-menu">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.svg" alt="imagen logo"></a>
                </div>
                <div class="menu-movil">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <nav class="navegacion-principal clearfix">
                    <a href="conferencia.php">Conferencia</a>
                    <a href="calendario.php">Calendario</a>
                    <a href="invitados.php">Invitados</a>
                    <a href="registro.php">Reservaciones</a>
                </nav>
            </div>

        </div>
    </div>



<section class="invitados contenedor seccion">
   <h2>Invitados</h2>
    <ul class="lista-invitados clearfix">


            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado1">
                        <img src="img/invitados/invitado1.jpg" alt="imagen invitado">
                        <p>Rafael Bautista</p>
                    </a>
                </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado1">
                   <h2>Rafael Bautista</h2>
                     <img src="img/invitados/invitado1.jpg" alt="imagen invitado">
                    <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie.</p>
                </div>
            </div>
   
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado2">
                        <img src="img/invitados/invitado2.jpg" alt="imagen invitado">
                        <p>Shari Herrera</p>
                    </a>
                </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado2">
                   <h2>Shari Herrera</h2>
                     <img src="img/invitados/invitado2.jpg" alt="imagen invitado">
                    <p>Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>
            </div>
   
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado3">
                        <img src="img/invitados/invitado3.jpg" alt="imagen invitado">
                        <p>Gregorio Sanchez</p>
                    </a>
                </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado3">
                   <h2>Gregorio Sanchez</h2>
                     <img src="img/invitados/invitado3.jpg" alt="imagen invitado">
                    <p>placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>
            </div>
   
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado4">
                        <img src="img/invitados/invitado4.jpg" alt="imagen invitado">
                        <p>Susana Rivera</p>
                    </a>
                </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado4">
                   <h2>Susana Rivera</h2>
                     <img src="img/invitados/invitado4.jpg" alt="imagen invitado">
                    <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus</p>
                </div>
            </div>
   
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado5">
                        <img src="img/invitados/invitado5.jpg" alt="imagen invitado">
                        <p>Harold Garcia</p>
                    </a>
                </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado5">
                   <h2>Harold Garcia</h2>
                     <img src="img/invitados/invitado5.jpg" alt="imagen invitado">
                    <p>placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>
            </div>
   
            <li>
                <div class="invitado">
                    <a class="invitado-info" href="#invitado6">
                        <img src="img/invitados/invitado6.jpg" alt="imagen invitado">
                        <p>Susan Sanchez</p>
                    </a>
                </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado6">
                   <h2>Susan Sanchez</h2>
                     <img src="img/invitados/invitado6.jpg" alt="imagen invitado">
                    <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
                </div>
            </div>
   

    </ul>
</section>




<footer class="site-footer">
    <div class="contenedor clearfix">
        <div class="footer-informacion">
            <h3>Sobre <span>GDLWebCamp</span></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius tempore at ea quia officiis autem facilis illum pariatur rem quasi, dignissimos laborum cum saepe, deleniti, corporis impedit sit quisquam sequi?</p>
        </div>

        <div class="ultimos-tweets">
            <h3>Ultimos <span>Tweets</span></h3>
            <a class="twitter-timeline" data-lang="es" data-height="400" data-theme="light" href="https://twitter.com/dieegopaa?ref_src=twsrc%5Etfw">Tweets by dieegopaa</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        <div class="menu">
            <h3>Redes <span>Sociales</span></h3>
            <nav class="redes-sociales">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </nav>
        </div>
    </div>

    <p class="copy">Todos los derechos reservados. &copy;</p>

    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup {
            background: #fff;
            clear: left;
            font: 14px Helvetica, Arial, sans-serif;
        }

        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */

    </style>
    <div style="display:none;">
        <div id="mc_embed_signup">
            <form action="https://gmail.us17.list-manage.com/subscribe/post?u=f91c7f173c8c638a844e21ee2&amp;id=e089267ce8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <h2>Suscribete</h2>
                    <div class="indicates-required"><span class="asterisk">*</span> obligatorio</div>
                    <div class="mc-field-group">
                        <label for="mce-EMAIL">Email <span class="asterisk">*</span>
                        </label>
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f91c7f173c8c638a844e21ee2_e089267ce8" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
        </div>

        <!--End mc_embed_signup-->

    </div>

</footer>

<script src="js/vendor/modernizr-3.11.2.min.js?v=1597801618"></script>
<script src="js/plugins.js?v=1597801618"></script>
<script src="js/jquery-3.5.1.js?v=1597801618"></script>
<script src="js/jquery.animateNumber.min.js?v=1597801618"></script>
<script src="js/jquery.countdown.min.js?v=1597801618"></script>
<script src="js/jquery.lettering.js?v=1597801618"></script>
<script src="js/cotizador.js?v=1597801618"></script>

<script src="js/jquery.colorbox.js?v=<?php echo time(); ?>"></script><script src="js/main.js?v=1597801618"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')

</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
