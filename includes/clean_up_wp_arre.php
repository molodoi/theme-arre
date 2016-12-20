<?php
$options = get_option('arre_custom_settings');
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


/**
 * HIDE CUSTOMIZE AND THEME FOR ROLE < ADMIN
 */
function hide_menu_theme_esa() {
    remove_submenu_page('themes.php', 'themes.php'); // hide the theme selection submenu
    //remove_submenu_page( 'themes.php', 'customize.php' );
}

function remove_esa_customize() {
    $customize_url_arr = array();
    $customize_url_arr[] = 'customize.php'; // 3.x
    $customize_url = add_query_arg('return', urlencode(wp_unslash($_SERVER['REQUEST_URI'])), 'customize.php');
    $customize_url_arr[] = $customize_url; // 4.0 & 4.1
    if (current_theme_supports('custom-header') && current_user_can('customize')) {
        //$customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
        //$customize_url_arr[] = 'custom-header'; // 4.0
    }
    if (current_theme_supports('custom-background') && current_user_can('customize')) {
        //$customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
        //$customize_url_arr[] = 'custom-background'; // 4.0
    }
    foreach ($customize_url_arr as $customize_url) {
        remove_submenu_page('themes.php', $customize_url);
    }
}

$user = wp_get_current_user();
$allowed_roles = array('editor', 'subscriber', 'author');
if (array_intersect($allowed_roles, $user->roles)) {
    add_action('admin_head', 'hide_menu_theme_esa');
    add_action('admin_menu', 'remove_esa_customize', 999);
}


/**
 * EMAIL FROM
 */
function new_email_from() {
    $email = (trim($options['arre_email_arre_coordonates']) != '')? $options['arre_email_arre_coordonates']: 'postmaster@arre-association.fr';
    return 'postmaster@maison-terrier.fr';
}

function new_email_from_name() {
    return 'ARRE - Association Ressource pour la Réussite Educative';
}

add_filter('wp_mail_from', 'new_email_from');
add_filter('wp_mail_from_name', 'new_email_from_name');

/**
 * TAILLE MINIMUM OBLIGATOIRE POUR LES IMAGES
 */
add_filter('wp_handle_upload_prefilter', 'tc_handle_upload_prefilter');

function tc_handle_upload_prefilter($file) {

    $imagetypes = array(
        'image/bmp',
        'image/bmp',
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/jpeg',
        'image/pjpeg',
        'image/jpeg',
        'image/pjpeg',
        'image/pict',
        'image/pict',
        'image/x-portable-pixmap',
        'image/tiff',
        'image/x-tiff',
        'image/tiff',
        'image/x-tiff',
        'image/png',
        'image/png',
        'image/jpeg',
        'image/jpeg',
        'image/jpeg',
        'image/gif',
        'image/bmp',
        'image/vnd.microsoft.icon',
        'image/tiff',
        'image/tiff',
        'image/svg+xml',
        'image/svg+xml',
        'image/vnd.adobe.photoshop',
        'image/vnd.rn-realflash'
    );

    if (!in_array($file['type'], $imagetypes))
        return $file;

    $img = getimagesize($file['tmp_name']);
    $minimum = array('width' => '1600', 'height' => '1600');
    $width = $img[0];
    $height = $img[1];

    if ($width < $minimum['width']):
        return array("error" => "Les dimensions de votre image sont trop petites. Largeur minimale doit être de {$minimum['width']}px et la hauteur minimale est {$minimum['height']}px. L'image que vous venez de télécharger est de largeur $width px et hauteur $height px");

    elseif ($height < $minimum['height']):
        return array("error" => "Les dimensions de votre image sont trop petites. Largeur minimale doit être de {$minimum['width']}px et la hauteur minimale est {$minimum['height']}px. L'image que vous venez de télécharger est de largeur $width px et hauteur $height px");
    else:
        return $file;
    endif;
}

/**
 * MIME TYPE AUTORISES
 */
add_filter('upload_mimes', 'add_custom_mime_types');

function add_custom_mime_types($mimes) {
    $types = array(
        '3dm' => 'x-world/x-3dmf',
        '3dmf' => 'x-world/x-3dmf',
        'ai' => 'application/postscript',
        'aif' => 'audio/aiff',
        'aifc' => 'audio/aiff',
        'aiff' => 'audio/aiff',
        'avi' => 'application/x-troff-msvideo',
        'avi' => 'video/avi',
        'avi' => 'video/msvideo',
        'avi' => 'video/x-msvideo',
        'avs' => 'video/avs-video',
        'bm' => 'image/bmp',
        'bmp' => 'image/bmp',
        'doc' => 'application/msword',
        'dot' => 'application/msword',
        'dump' => 'application/octet-stream',
        'eps' => 'application/postscript',
        'gif' => 'image/gif',
        'h264' => 'video/h264',
        'jpe' => 'image/jpeg',
        'jpe' => 'image/pjpeg',
        'jpeg' => 'image/jpeg',
        'jpeg' => 'image/pjpeg',
        'jpg' => 'image/jpeg',
        'jpg' => 'image/pjpeg',
        'mjpg' => 'video/x-motion-jpeg',
        'moov' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'movie' => 'video/x-sgi-movie',
        'mp2' => 'audio/mpeg',
        'mp2' => 'audio/x-mpeg',
        'mp2' => 'video/mpeg',
        'mp2' => 'video/x-mpeg',
        'mp2' => 'video/x-mpeq2a',
        'mp3' => 'audio/mpeg3',
        'mp3' => 'audio/x-mpeg-3',
        'mp3' => 'video/mpeg',
        'mp3' => 'video/x-mpeg',
        'mp4' => 'video/mp4',
        'mpa' => 'audio/mpeg',
        'mpa' => 'video/mpeg',
        'mpc' => 'application/x-project',
        'mpe' => 'video/mpeg',
        'mpeg' => 'video/mpeg',
        'mpg' => 'audio/mpeg',
        'mpg' => 'video/mpeg',
        'mpga' => 'audio/mpeg',
        'ogg' => 'audio/ogg',
        'pdb' => 'chemical/x-pdb',
        'pdf' => 'application/pdf',
        'pic' => 'image/pict',
        'pict' => 'image/pict',
        'pot' => 'application/mspowerpoint',
        'pot' => 'application/vnd.ms-powerpoint',
        'pov' => 'model/x-pov',
        'ppa' => 'application/vnd.ms-powerpoint',
        'ppm' => 'image/x-portable-pixmap',
        'pps' => 'application/mspowerpoint',
        'pps' => 'application/vnd.ms-powerpoint',
        'ppt' => 'application/mspowerpoint',
        'ppt' => 'application/powerpoint',
        'ppt' => 'application/vnd.ms-powerpoint',
        'ppt' => 'application/x-mspowerpoint',
        'ppz' => 'application/mspowerpoint',
        'text' => 'application/plain',
        'text' => 'text/plain',
        'tgz' => 'application/gnutar',
        'tgz' => 'application/x-compressed',
        'tif' => 'image/tiff',
        'tif' => 'image/x-tiff',
        'tiff' => 'image/tiff',
        'tiff' => 'image/x-tiff',
        'txt' => 'text/plain',
        'w6w' => 'application/msword',
        'wav' => 'audio/wav',
        'wav' => 'audio/x-wav',
        'word' => 'application/msword',
        'wp' => 'application/wordperfect',
        'wp5' => 'application/wordperfect',
        'wp5' => 'application/wordperfect6.0',
        'wp6' => 'application/wordperfect',
        'wpd' => 'application/wordperfect',
        'wpd' => 'application/x-wpwin',
        'wq1' => 'application/x-lotus',
        'wri' => 'application/mswrite',
        'wri' => 'application/x-wri',
        'xl' => 'application/excel',
        'xla' => 'application/excel',
        'xla' => 'application/x-excel',
        'xla' => 'application/x-msexcel',
        'xlb' => 'application/excel',
        'xlb' => 'application/vnd.ms-excel',
        'xlb' => 'application/x-excel',
        'xlc' => 'application/excel',
        'xlc' => 'application/vnd.ms-excel',
        'xlc' => 'application/x-excel',
        'xld' => 'application/excel',
        'xld' => 'application/x-excel',
        'xlk' => 'application/excel',
        'xlk' => 'application/x-excel',
        'xll' => 'application/excel',
        'xll' => 'application/vnd.ms-excel',
        'xll' => 'application/x-excel',
        'xlm' => 'application/excel',
        'xlm' => 'application/vnd.ms-excel',
        'xlm' => 'application/x-excel',
        'xls' => 'application/excel',
        'xls' => 'application/vnd.ms-excel',
        'xls' => 'application/x-excel',
        'xls' => 'application/x-msexcel',
        'xlt' => 'application/excel',
        'xlt' => 'application/x-excel',
        'xlv' => 'application/excel',
        'xlv' => 'application/x-excel',
        'xlw' => 'application/excel',
        'xlw' => 'application/vnd.ms-excel',
        'xlw' => 'application/x-excel',
        'xlw' => 'application/x-msexcel',
        'x-png' => 'image/png',
        'zip' => 'application/x-compressed',
        'zip' => 'application/x-zip-compressed',
        'zip' => 'application/zip',
        'zip' => 'multipart/x-zip',
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'au' => 'audio/basic',
        'avi' => 'video/x-msvideo',
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        'swf' => 'application/x-shockwave-flash',
        'swf' => 'application/x-shockwave-flash2-preview',
        'swf' => 'application/futuresplash',
        'swf' => 'image/vnd.rn-realflash'
    );
    return array_merge($mimes, $types);
}

/**
 * ADD RESPONSIVE BS CLASS TO IMG htmltag
 */
function add_responsive_class($content) {
    global $post;
    $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<img$1class="$2 img-responsive img-hw-cent-pourcent img-rounded "$3>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}

add_filter('the_content', 'add_responsive_class');

/**
 * add a class to the attachment images
 */
function image_tag_class($class) {
    $class .= ' img-responsive img-hw-cent-pourcent img-rounded ';
    return $class;
}

add_filter('get_image_tag_class', 'image_tag_class');

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


/*
* Remove Theme Install In Menu
*/
function __block_caps($caps, $cap) {
    if ($cap === 'install_themes')
        $caps[] = 'do_not_allow';
    return $caps;
}

add_filter('map_meta_cap', '__block_caps', 10, 2);

/*
 * Remove Screen Option Dashboard
 */
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    //$wp_admin_bar->remove_menu('site-name');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    //$wp_admin_bar->remove_menu('new-content');
    //$wp_admin_bar->remove_menu('top-secondary');
}

add_action('wp_before_admin_bar_render', 'wps_admin_bar');

/*
 * Remove unnecessary dashboard widgets
 */
function jg_remove_dashboard_widgets() {
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');
    remove_meta_box('dashboard_custom_feed', 'dashboard', 'side');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');

    remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
    remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
    remove_meta_box( 'wpseo-dashboard-overview-hide', 'dashboard', 'side' );
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

add_action('wp_dashboard_setup', 'jg_remove_dashboard_widgets');

/*
 * To clear out the Network Admin Dashboard
 */
function hhs_remove_network_dashboard_widgets() {
    //remove_meta_box ( 'network_dashboard_right_now', 'dashboard-network', 'normal' ); // Right Now
    remove_meta_box('dashboard_plugins', 'dashboard-network', 'normal'); // Plugins
    remove_meta_box('dashboard_primary', 'dashboard-network', 'side'); // WordPress Blog
    remove_meta_box('dashboard_secondary', 'dashboard-network', 'side'); // Other WordPress News
}

add_action('wp_network_dashboard_setup', 'hhs_remove_network_dashboard_widgets');

/*
 * To clear out the Global Dashboard:
 */
function hhs_remove_user_dashboard_widgets() {
    remove_meta_box('dashboard_primary', 'dashboard-user', 'normal'); //WordPress Blog
    remove_meta_box('dashboard_secondary', 'dashboard-user', 'normal'); //Other WordPress News
}

add_action('wp_user_dashboard_setup', 'hhs_remove_user_dashboard_widgets');

/*
 * Remove Page meta box
 */
function my_remove_meta_box_page() {
    // Custom Fields
    remove_meta_box('postcustom', 'page', 'normal');
    // Discussion
    remove_meta_box('commentsdiv' , 'page', 'normal');
    // Comments
    remove_meta_box('commentstatusdiv', 'page', 'normal');
    // Revisions
    remove_meta_box('revisionsdiv', 'page', 'normal');
    // Author
    remove_meta_box('authordiv', 'page', 'normal');
    // Page Attributes
    //remove_meta_box( pageparentdiv ,'page', 'normal');
    // Publish
    //remove_meta_box( submitdiv ,'page', 'normal');  
    remove_meta_box('slugdiv', 'page', 'normal'); // Slug Metabox
}

add_action('admin_menu', 'my_remove_meta_box_page');

/*
 * Remove Post meta box
 */
function my_remove_meta_box_post() {
    remove_meta_box('slugdiv', 'post', 'normal');
    remove_meta_box('sqpt-meta-tags', 'post', 'normal');
    // Custom Fields
    remove_meta_box('postcustom', 'post', 'normal');
    // Excerpt
    //remove_meta_box('postexcerpt' , 'post' , 'normal' );
    // Trackbacks
    remove_meta_box('trackbacksdiv', 'post', 'normal');
    // Discussion
    remove_meta_box('commentstatusdiv', 'post', 'normal');
    remove_meta_box('commentsdiv', 'post', 'normal');
    // Revisions
    //remove_meta_box('revisionsdiv' , 'post' , 'normal' );
    // Author
    remove_meta_box('authordiv', 'post', 'normal');
    // Categories
    //remove_meta_box('categorydiv' , 'post' , 'normal' );
    // Tags
    remove_meta_box('tagsdiv-post_tag', 'post', 'normal');
    // Publish
    //remove_meta_box('submitdiv', 'post', 'normal' ); 
    remove_meta_box('content-permissions-meta-box', 'page', 'advanced' ); 
      
}

add_action('admin_menu', 'my_remove_meta_box_post');

/*
 * Remove  WordPress Welcome Panel
 */
remove_action('welcome_panel', 'wp_welcome_panel');


/*
 * Remove Parent Hierarchic Dropdown for Category 
 */

function wpse_58799_remove_parent_category() {
    if ('category' != $_GET['taxonomy'])
        return;

    $parent = 'parent()';

    if (isset($_GET['action']))
        $parent = 'parent().parent()';
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($)
        {     
            $('label[for=parent]').<?php echo $parent; ?>.remove();       
        });
    </script>
    <?php
}

add_action('admin_head-edit-tags.php', 'wpse_58799_remove_parent_category');

/**
 * Remove Tools/Comments MenuPage
 */
function my_remove_menu_pages() {
    remove_menu_page('tools.php');
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'my_remove_menu_pages');

/*
 * Replace Salutations par Loggué
 */

function replace_howdy($wp_admin_bar) {
    $my_account = $wp_admin_bar->get_node('my-account');
    $newtitle = str_replace('Salutations,', 'Loggué ', $my_account->title);
    $wp_admin_bar->add_node(array(
        'id' => 'my-account',
        'title' => $newtitle,
    ));
}

add_filter('admin_bar_menu', 'replace_howdy', 25);

/*
 * Fix chrome 45 admin bar diplay
 */

function force_display_block_dashoard_admin_menu() {
    echo '<style type="text/css">
        #menu-dashboard{ display:block!important;}
        #adminmenu div.wp-menu-name{ display:block!important;}
        #adminmenu { transform: translateZ(0); }
    </style>';
}

add_action('admin_head', 'force_display_block_dashoard_admin_menu');

/*
 * Cache l'onglet Aide du backend admin multisite
 */

function hide_help() {
    echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }            
          </style>';
}

add_action('admin_head', 'hide_help');

/*
 * Cocher "se souvenir de moi" par défaut
 */

function sf_check_rememberme() {
    global $rememberme;
    $rememberme = 1;
}

add_action("login_form", "sf_check_rememberme");

/*
 * modifier les attributs title et href du lien
 */
add_filter('login_headertitle', create_function(false, "return 'Admin';"));
add_filter('login_headerurl', create_function(false, "return '';"));


/* -------------------------------------------------- 
  :: SUPPRESSION D'ELEMENTS DU BACKEND VIA CSS
  ----------------------------------------------------- */

function remove_fn_admin_with_styles() {
    //echo '<style type="text/css">#wp-content-media-buttons, wp-media-buttons{display: none;}</style>';
}

add_action('admin_head', 'remove_fn_admin_with_styles');

/*
 * Cache Wordpress SEO Check
 */
if (is_plugin_active('wordpress-seo/wp-seo.php')) {

    function hide_seo_wordpress_misc() {
        echo '<style type="text/css">
            .misc-yoast{display:none;}
            li.toplevel_page_wpseo_dashboard ul li:last-child{display:none;}
            #sidebar-container{display:none;}
          </style>';
    }

    add_action('admin_head', 'hide_seo_wordpress_misc');
}

/*
 * Cache User Role Editor
 */
if (is_plugin_active('user-role-editor/user-role-editor.php')) {

    function hide_user_role_editor_wordpress_misc() {
        echo '<style type="text/css">
            #ure_pro_advertisement{display:none!important;}
            .ure-sidebar{display:none;}
          </style>';
    }

    add_action('admin_head', 'hide_user_role_editor_wordpress_misc');
}

/*
 * Remove Licensing and Featured Links Google Maps Plugin
 */
if (is_plugin_active('better-wp-security/better-wp-security.php')) {

    function hide_help_and_go_pro_links_security_plugin_security_wordpress_misc() {
        echo '<style type="text/css">
            li.toplevel_page_itsec ul li:last-child{display:none;}li.toplevel_page_itsec ul li:nth-of-type(7){display:none;}
            #itsec_security_updates{display:none;}
            #itsec_get_backup{display:none;}
            #itsec_sync_integration{display:none;}
            #itsec_need_help{display:none;}
            a[href="?page=toplevel_page_itsec_help"]{display:none;}
            </style>';
    }

    add_action('admin_head', 'hide_help_and_go_pro_links_security_plugin_security_wordpress_misc');
}

/*
 * Remove Mailchimp link and sidebar container
 */
if (is_plugin_active('mailchimp-for-wp/mailchimp-for-wp.php')) {

    function hide_links_and_sidebar_container_plugin_mailchimp_misc() {
        echo '<style type="text/css">
            #toplevel_page_mailchimp-for-wp ul li:last-child{display:none;}
            #mc4wp-sidebar{display:none;}
            </style>';
    }

    add_action('admin_head', 'hide_links_and_sidebar_container_plugin_mailchimp_misc');
}

/*
 * Masquer les erreurs de connexion
 */
add_filter('login_errors', create_function('$a', "return null;"));

/*
 * Remove text and version in admin footer
 */

function change_footer_admin() {
    return '&nbsp;';
}

add_filter('admin_footer_text', 'change_footer_admin', 9999);

function change_footer_version() {
    return '&nbsp;';
}

add_filter('update_footer', 'change_footer_version', 9999);

if (!current_user_can('edit_users')) {
    add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
    add_filter('pre_option_update_core', create_function('$a', "return null;"));
}

/*
 * Removing Admin Help Link Button
 */

class RemoveAdminHelpLinkButton {

    static function on_load() {
        add_filter('contextual_help', array(__CLASS__, 'contextual_help'));
        add_action('admin_notices', array(__CLASS__, 'admin_notices'));
    }

    static function contextual_help($contextual_help) {
        ob_start();
        return $contextual_help;
    }

    static function admin_notices() {
        echo preg_replace('#<div id="contextual-help-link-wrap".*>.*</div>#Us', '', ob_get_clean());
    }

}

RemoveAdminHelpLinkButton::on_load();

/*
 * Remove the metas version in front head
 */
remove_action('wp_head', 'wp_generator');

function my_theme_remove_generator() {
    return '';
}

add_filter('the_generator', 'my_theme_remove_generator');

/*
 * Remove Version Query Strings From JavaScript JS and CSS Stylesheet Files
 */

function _remove_script_version($src) {
    $parts = explode('?', $src);
    return $parts[0];
}

add_filter('script_loader_src', '_remove_script_version', 15, 1);
add_filter('style_loader_src', '_remove_script_version', 15, 1);


/*
 * Remove Update Notifications Core
 */

function sfx_null() {
    return null;
}

add_filter('pre_site_transient_update_core', 'sfx_null');

/*
 * Masquer les mises à jour des thèmes WordPress
 */
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', 'sfx_null');

/*
 * Masquer les mises à jour des plugins WordPress
 */
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', 'sfx_null');
add_action('admin_init', 'wpse_38111');

function wpse_38111() {
    remove_submenu_page('index.php', 'update-core.php');
}

/*
 * Remove meta balise generator flux RSS
 */
add_filter('get_the_generator_rss2', '__return_false');
add_filter('get_the_generator_atom', '__return_false');

/*
 * Disable Auto-save
 */

function no_autosave() {
    wp_deregister_script('autosave');
}

add_action('wp_print_scripts', 'no_autosave');

/*
 * Remove admin color scheme options from user profile
 */

function admin_color_scheme() {
    global $_wp_admin_css_colors;
    $_wp_admin_css_colors = 0;
}

add_action('admin_head', 'admin_color_scheme');

/*
 * Remove WP SEO in menu
 */

function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    if (!current_user_can('manage_options')) {
        $wp_admin_bar->remove_menu('wpseo-menu');
    }
}

add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');

/*
 * Hide enable_ssl checkbox in page post publish metabox installed by BetterWPSecurity  
 */

function hide_enable_ssl_publish_box() {
    if (is_plugin_active('better-wp-security/better-wp-security.php')) {
        global $current_screen;
        $css = '<style type="text/css">';
        $css .= '#bwps { display: none; }';
        $css .= '</style>';

        echo $css;
    }
}

add_action('admin_footer', 'hide_enable_ssl_publish_box');
























