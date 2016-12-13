<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/

$args = array(
		'default-color' => '000000',
		'default-image' => IMG_DIR.'/bg-body.jpg',
	);
add_theme_support( 'custom-background', $args );

add_action('customize_register', 'arre_customize_register');

function arre_customize_register($wp_customize) { 
    /**
    * Coordonnées 
    */    
    include_once 'customize/arre_customize_coordonates.php'; 

    /**
    * Réseaux sociaux
    */    
    include_once 'customize/arre_customize_social_network.php'; 

    
}
?>