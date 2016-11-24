<?php 


	if(!is_admin()):
		// Register style
		function custom_styles(){
			wp_register_style( 'bootstrap', get_template_directory_uri() . '/vendor/components/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_style( 'bootstrap' );
			wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
			wp_enqueue_style( 'style' );
		}
		add_action('wp_enqueue_scripts', 'custom_styles');
		// Register script
		function custom_scripts(){
			wp_deregister_script('jquery');
			wp_register_script( 'jquery', get_template_directory_uri() . '/vendor/components/jquery/jquery.min.js', array(), false, true );
			wp_enqueue_script( 'jquery' );
			wp_register_script( 'bootstrap', get_template_directory_uri() . '/vendor/components/bootstrap/js/bootstrap.min.js', array(), false, true );
			wp_enqueue_script( 'bootstrap' );
			wp_register_script( 'script', get_template_directory_uri() . '/js/script.js', array(), false, true );
			wp_enqueue_script( 'script' );
		}
		add_action('wp_enqueue_scripts', 'custom_scripts');
	endif;

?>