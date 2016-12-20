<?php 
	
	/**
	* DEFINE CONSTANTS
	*/
	define('THEME_ROOT', get_stylesheet_directory_uri());
	define('IMG_DIR', THEME_ROOT . '/img');
	define('CSS_DIR', THEME_ROOT . '/css');
	define('JS_DIR', THEME_ROOT . '/js');	

	/**
	* CONFIG THEME
	*/
	add_theme_support('menus');
	add_theme_support('post-thumbnails', array('menus', 'post', 'page'));
	add_theme_support('post-formats', array('aside','chat','gallery','image','link','quote','status','video','audio'));

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
	* My Videos Shorcode
	*/
	require( get_template_directory() . '/includes/wp_videos_shortcode.php' );

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
	

	/**
	* ADD CUSTOM POST TYPE TO SEARCH
	*/
	function my_filter_search($query) {
		if ($query->is_search) {
			$query->set('post_type', array('post', 'page', 'formation_arre', 'service_arre'));
		};
		return $query;
	}

	add_filter('pre_get_posts', 'my_filter_search');

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

			wp_enqueue_script('app-js', JS_DIR.'/app.js', null, '3.1.1', true);
			if(is_front_page()):
			$google_api_key = (trim($options['arre_google_apikey_coordonates']) != '')? $options['arre_google_apikey_coordonates']: 'AIzaSyBcVcz5OZ6eNBi5d7CFYHIdtsEI5BQlm68';
			//var_dump($google_api_key);
			wp_enqueue_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key='.$google_api_key.'&libraries=places', null, '3.1.1', true);
			wp_enqueue_script('jquery-gmaps', JS_DIR.'/gmap3.min.js', null, '3.1.1', true);

			function mycustom_script() {
				$options = get_option('arre_custom_settings');
				?>
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
				
				
			}

			add_action('wp_footer', 'mycustom_script', 29);
			endif;//end is_front_page
		}

		add_action('wp_enqueue_scripts', 'wpt_register_js');

		// Register style 
		function wpt_register_css() {
			wp_enqueue_style('font--awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', null, '4.2.0', 'all');
			wp_enqueue_style('style', CSS_DIR . '/app.css', null, '3.3.5', 'all');
		}

		add_action('wp_enqueue_scripts', 'wpt_register_css');


	endif;

	
?>