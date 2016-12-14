<?php
/*
 * Masquer la top bar admin sur le front
 */
add_filter('show_admin_bar', '__return_false');


// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
* Add Next Page Button in First Row
*/
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 ); // 1st row

/**
* Add Next Page/Page Break Button
* in WordPress Visual Editor
* 
* @link https://shellcreeper.com/?p=889
*/
function my_add_next_page_button( $buttons, $id ){

    /* only add this for content editor */
    if ( 'content' != $id )
        return $buttons;

    /* add next page after more tag button */
    array_splice( $buttons, 13, 0, 'wp_page' );

    return $buttons;
}

/*
 * unregister all default WP Widgets
 */

function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    //unregister_widget('WP_Widget_Archives');
    //unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    //unregister_widget('WP_Widget_Text');
    //unregister_widget('WP_Widget_Categories');
    //unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    //unregister_widget('WP_Nav_Menu_Widget');
    //unregister_widget('WP_Widget_Tag_Cloud');
}

add_action('widgets_init', 'unregister_default_wp_widgets', 1);