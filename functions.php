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
	 */
	require_once( get_template_directory() . '/includes/wp_bootstrap_menunav_walker.php' );

	/**
	 * CUSTOM WP Frontend and WP Backend - remove_and_modification
	 */
	require( get_template_directory() . '/includes/clean_up_wp_arre.php' );

	if(!is_admin()):
		// Register style
		function custom_styles(){
			wp_register_style( 'style', CSS_DIR . '/app.css' );
			wp_enqueue_style( 'style' );
		}
		add_action('wp_enqueue_scripts', 'custom_styles');
		// Register script
		function custom_scripts(){
			wp_register_script( 'script', JS_DIR . '/app.js', array(), false, true );
			wp_enqueue_script( 'script' );
		}
		add_action('wp_enqueue_scripts', 'custom_scripts');
	endif;

?>