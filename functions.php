<?php 

	/**
	* DEFINE CONSTANTS
	*/
	define('THEME_ROOT', get_stylesheet_directory_uri());
	define('IMG_DIR', THEME_ROOT . '/img');
	define('CSS_DIR', THEME_ROOT . '/css');


	define('SWIPER_CSS_DIR', THEME_ROOT . '/bower_components/swiper/dist/css/swiper.min.css');


	define('JS_DIR', THEME_ROOT . '/js');	
	define('JQUERY_DIR', THEME_ROOT . '/bower_components/jquery/dist/jquery.min.js');
	define('SWIPER_JQUERY_DIR', THEME_ROOT . '/bower_components/swiper/dist/js/swiper.jquery.min.js');
	define('SWIPER_JS_DIR', THEME_ROOT . '/bower_components/swiper/dist/js/swiper.min.js');

	/**
	* CONFIG THEME
	*/
	add_theme_support('menus');
	add_theme_support('post-thumbnails', array('menus', 'post', 'page'));
	add_theme_support('post-formats');

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
	 * BOOTSTRAP NAV WALKER FOR MENU
	 * get_template_directory -> Retrieves the absolute path to the directory of the current theme. 
	 */
	require_once( get_template_directory() . '/includes/wp_bootstrap_menunav_walker.php' );

	/**
	* INCLURE LES CUSTOM POST TYPE
	*/
	//require_once( get_template_directory() . '/includes/formations_custom_post_type.php' );
	//require_once( get_template_directory() . '/includes/services_custom_post_type.php' );


	/**
	 * CUSTOM WP Frontend and WP Backend - remove_and_modification
	 */
	require( get_template_directory() . '/includes/clean_up_wp_arre.php' );

	/**
	* CRÉATION DES SIDEBARS & ZONE DE WIDGETS - barre latérale - homepage - pages - actualités
	*/
	require( get_template_directory() . '/includes/my_register_sidebars.php' );

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
			wp_enqueue_script('jquery', JQUERY_DIR, null, '3.1.1', true); 
			wp_enqueue_script('swiper-jquery-js', SWIPER_JQUERY_DIR, null, '3.1.1', true);
			wp_enqueue_script('swiper-js', SWIPER_JS_DIR, null, '3.1.1', true);
			wp_enqueue_script('app-js', JS_DIR.'/app.js', null, '3.1.1', true);
		}

		add_action('wp_enqueue_scripts', 'wpt_register_js');
		// Register style 
		function wpt_register_css() {
			wp_enqueue_style('style', CSS_DIR . '/app.css', null, '3.3.5', 'all');
			wp_enqueue_style('swiper-css', SWIPER_CSS_DIR, null, '3.3.5', 'all');
		}

		add_action('wp_enqueue_scripts', 'wpt_register_css');


	endif;

?>