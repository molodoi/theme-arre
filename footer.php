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

    <?php 
    if(is_front_page()): 
    /*
    $options = get_option('arre_custom_settings');
    $google_api_key = (trim($options['arre_google_apikey_coordonates']) != '')? $options['arre_google_apikey_coordonates']: 'AIzaSyBcVcz5OZ6eNBi5d7CFYHIdtsEI5BQlm68';
    ?>
      <script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_api_key; ?>&libraries=places"></script>  
      <script type='text/javascript' src="<?php print JS_DIR; ?>/gmap3.min.js"></script>  
      <script type='text/javascript'>
        $(document).ready(function(){

            var geoloc = "<?php echo (trim($options['arre_geoloc_arre_coordonates']) != '')? $options['arre_geoloc_arre_coordonates']: '50.696437,3.1741172'; ?>";
            var addrr = "<?php echo (trim($options['arre_address_arre_coordonates']) != '')? $options['arre_address_arre_coordonates']: '14 rue Saint Antoine 59100 Roubaix, France'; ?>";
            
            //http://gmap3.net/
            $('.map')
            .gmap3({
                center: [geoloc],
                address: addrr,
                zoom: 18,
                mapTypeId : google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                },
                navigationControl: false,
                scrollwheel: false,
                streetViewControl: false
            })
            .marker(function (map) {
                return {
                position: map.getCenter(),
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                };
            });
        });
      </script>  

    <?php
    */
    endif; 
    ?>
</body>
</html>