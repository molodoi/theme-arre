<?php
/*
 * Masquer la top bar admin sur le front
 */
add_filter('show_admin_bar', '__return_false');


// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

