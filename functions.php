<?php 


	if(!is_admin()):
		// Register style
		function custom_styles(){
			wp_register_style( 'style', get_template_directory_uri() . '/css/app.css' );
			wp_enqueue_style( 'style' );
		}
		add_action('wp_enqueue_scripts', 'custom_styles');
		// Register script
		function custom_scripts(){
			wp_register_script( 'script', get_template_directory_uri() . '/js/app.js', array(), false, true );
			wp_enqueue_script( 'script' );
		}
		add_action('wp_enqueue_scripts', 'custom_scripts');
	endif;

?>