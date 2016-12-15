<?php
    $options = get_option('arre_custom_settings');
?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <small>&copy; Tous droits réservés <?php echo bloginfo('name'); ?> | <a href="http://ticme.fr/" target="_blank" title="Ticme.fr - développement de site internet Lille Nord - Haut de France">www.ticme.fr</a></small>
                </div>
                <div class="col-lg-6">
                    <?php
                    if (has_nav_menu('menu-footer')) :
                        $defaults = array('menu' => 'menu-footer', 'menu_class' => 'breadcrumb footer-menu-breadcrumb');
                        wp_nav_menu($defaults);
                    endif;
                    ?> 
                </div>
            </div> 
        </div> 
    </footer>
    <a href="#" class="scrollup" style="display: inline;">
        <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
    </a>
    
    <?php wp_footer() ?>
</body>
</html>