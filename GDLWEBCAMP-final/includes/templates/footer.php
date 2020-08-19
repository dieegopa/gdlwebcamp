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

<script src="js/vendor/modernizr-3.11.2.min.js?v=<?php echo time(); ?>"></script>
<script src="js/plugins.js?v=<?php echo time(); ?>"></script>
<script src="js/jquery-3.5.1.js?v=<?php echo time(); ?>"></script>
<script src="js/jquery.animateNumber.min.js?v=<?php echo time(); ?>"></script>
<script src="js/jquery.countdown.min.js?v=<?php echo time(); ?>"></script>
<script src="js/jquery.lettering.js?v=<?php echo time(); ?>"></script>
<script src="js/cotizador.js?v=<?php echo time(); ?>"></script>

<?php 
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<script src="js/jquery.colorbox.js?v=<?php echo time(); ?>"></script>';
}elseif ($pagina == 'conferencia') {
echo '<script src="js/lightbox.js?v=<?php echo time(); ?>"></script>';
}
?>
<script src="js/main.js?v=<?php echo time(); ?>"></script>

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
<?php
	// Guarda todo el contenido a un archivo
	$fp = fopen($archivoCache, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);
	// Enviar al navegador
	ob_end_flush();
?>

</body>

</html>
