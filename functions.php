<?php 

	/**
	* DEFINE CONSTANTS
	*/
	define('THEME_ROOT', get_stylesheet_directory_uri());
	define('IMG_DIR', THEME_ROOT . '/img');
	define('CSS_DIR', THEME_ROOT . '/css');


	//define('SWIPER_CSS_DIR', THEME_ROOT . '/bower_components/swiper/dist/css/swiper.min.css');


	define('JS_DIR', THEME_ROOT . '/js');	
	/*
	define('JQUERY_DIR', THEME_ROOT . '/bower_components/jquery/dist/jquery.min.js');
	define('JQUERY_BOOTSTRAP_DIR', THEME_ROOT . '/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js');
	define('SWIPER_JQUERY_DIR', THEME_ROOT . '/bower_components/swiper/dist/js/swiper.jquery.min.js');
	define('SWIPER_JS_DIR', THEME_ROOT . '/bower_components/swiper/dist/js/swiper.min.js');
*/
	/**
	* CONFIG THEME
	*/
	add_theme_support('menus');
	add_theme_support('post-thumbnails', array('menus', 'post', 'page'));
	add_theme_support(
	'post-formats', array(
			'aside',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
			'audio'
		)
	);

	/**
	* REGISTER MENU
	*/
	function register_my_menus() {
		register_nav_menus(array(
			'menu-principal' => 'Menu Principal',
			'menu-membres' => 'Menu Membres',
			'menu-footer' => 'Menu Footer',
		));
	}
	add_action('init', 'register_my_menus');

	/**
	* ADD IMAGE SIZE
	*/
	if (function_exists('add_theme_support')) {
		add_image_size('featured_1140_480', 1140, 480, true);
	}

	/**
	 * BOOTSTRAP NAV WALKER FOR MENU
	 * get_template_directory -> Retrieves the absolute path to the directory of the current theme. 
	 */
	
	require_once( get_template_directory() . '/includes/wp_bootstrap_menunav_walker.php' );
	require_once( get_template_directory() . '/includes/wp_bootstrap_navwalker.php' );

	/**
	* INCLURE LES CUSTOM POST TYPE
	*/
	require_once( get_template_directory() . '/includes/custom_post_type/formations_custom_post_type.php' );
	require_once( get_template_directory() . '/includes/custom_post_type/services_custom_post_type.php' );


	/**
	 * CUSTOM WP Frontend and WP Backend - remove_and_modification
	 */
	require( get_template_directory() . '/includes/clean_up_wp_arre.php' );

	/**
	* CRÉATION DES SIDEBARS & ZONE DE WIDGETS
	*/
	require( get_template_directory() . '/includes/my_register_sidebars.php' );

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	/**
	* GALLERIE
	*/
	require( get_template_directory() . '/includes/wp_custom_gallery.php' );

	/**
	* BOOTSTRAP LINKS PAGES
	*/
	require( get_template_directory() . '/includes/bootstrap_link_pages.php' );

	/**
	* CUSTOMIZE WORPDRESS
	*/
	require_once( get_template_directory() . '/includes/theme_customize.php' );
	

	if(!is_admin()):
		// Register script
		function wpt_register_js() {
			/*
			wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
			$handle is the name for the script.
			$src defines where the script is located.
			$deps is an array that can handle any script that your new script depends on, such as jQuery.
			$ver lets you list a version number.
			$in_footer is a boolean parameter (true/false) that allows you to place your scripts in the footer of your HTML document rather then in the header, so that it does not delay the loading of the DOM tree.

			*/
			wp_deregister_script( 'jquery' );  			 
			//wp_enqueue_script('jquery', JQUERY_DIR, null, '3.1.1', true); 
			//wp_enqueue_script('jquery-boot', JQUERY_BOOTSTRAP_DIR, null, '3.1.1', true); 
			

			/*
			if (is_plugin_active('gmap-embed/srm_gmap_embed.php')) {
				wp_deregister_script( 'srm_gmap_api' ); 
				wp_enqueue_script('srm_gmap_api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBcVcz5OZ6eNBi5d7CFYHIdtsEI5BQlm68&libraries=places', array(''), '3.1.1', true);
			}
			*/

			
			//wp_enqueue_script('swiper-jquery-js', SWIPER_JQUERY_DIR, null, '3.1.1', true);
			//wp_enqueue_script('swiper-js', SWIPER_JS_DIR, null, '3.1.1', true);
			wp_enqueue_script('app-js', JS_DIR.'/app.js', null, '3.1.1', true);
			wp_enqueue_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBcVcz5OZ6eNBi5d7CFYHIdtsEI5BQlm68&libraries=places', null, '3.1.1', true);
			wp_enqueue_script('jquery-gmaps', JS_DIR.'/gmap3.min.js', null, '3.1.1', true);
			//wp_enqueue_script('jasny-bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js', null, '3.1.1', true);


			function mycustom_script() {
				$options = get_option('arre_custom_settings');
				?>
				<script type='text/javascript'>
					$(document).ready(function(){
						<?php if(is_front_page()): ?>
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
						<?php endif; ?>
					});
				</script>
				<?php
				
			}

			add_action('wp_footer', 'mycustom_script', 29);
		}

		add_action('wp_enqueue_scripts', 'wpt_register_js');
		// Register style 
		function wpt_register_css() {
			wp_enqueue_style('font--awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', null, '4.2.0', 'all');
			wp_enqueue_style('style', CSS_DIR . '/app.css', null, '3.3.5', 'all');
			//wp_enqueue_style('jasny-bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css', null, '4.2.0', 'all');
			//wp_enqueue_style('jasny-bootstrap-map', 'https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css.map', null, '4.2.0', 'all');
			
			//wp_enqueue_style('swiper-css', SWIPER_CSS_DIR, null, '3.3.5', 'all');
		}

		add_action('wp_enqueue_scripts', 'wpt_register_css');


	endif;

	/*********************
	* re-order left admin menu
	**********************/
	function reorder_admin_menu( $__return_true ) {
		return array(
			'index.php', // Dashboard
			'edit.php?post_type=page', // Pages 
			'edit.php', // Posts
			'edit.php?post_type=service_arre', // Posts
			'edit.php?post_type=formation_arre', // Posts
			'edit.php?post_type=arreswiperslider', // Posts			
			'upload.php', // Media
			'separator1', // --Space--
			'themes.php', // Appearance
			'edit-comments.php', // Comments 
			'users.php', // Users
			
			'tools.php', // Tools
			'options-general.php', // Settings
			'plugins.php', // Plugins
		);
	}
	add_filter( 'custom_menu_order', 'reorder_admin_menu' );
	add_filter( 'menu_order', 'reorder_admin_menu' );
?>