<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('customize_register', 'arre_customize_register');

function arre_customize_register($wp_customize) {
    
    /**
    * Logo 99
    */    
    include_once 'ticme_customize_logo.php'; 

    
}
?>