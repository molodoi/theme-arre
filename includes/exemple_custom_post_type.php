<?php
/*
 * Exemple de CUSTOM POST TYPE
 */

function produits_custom_post_type() {
    $labelsProduits = array(
        'name' => ( 'Produits' ),
        'singular_name' => ( 'Produit' ),
        'menu_name' => ( 'Produits' ),
        'parent_item_colon' => ( 'Produit parent ' ),
        'all_items' => ( 'Tous les Produits' ),
        'view_item' => ( 'Voir le Produit' ),
        'add_new_item' => ( 'Ajouter un Produit' ),
        'add_new' => ( 'Ajouter' ),
        'edit_item' => ( 'Editer' ),
        'update_item' => ( 'Mettre à jour' ),
        'search_items' => ( 'Rechercher' ),
        'not_found' => ( 'Aucun Produit' ),
        'not_found_in_trash' => ( 'Aucun Produit dans la corbeille' )
    );
    $rewriteProduits = array(
        'slug' => 'produits',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );

    $argsProduits = array(
        'label' => 'Produit',
        'description' => ( 'Ajouter des Produits'),
        'labels' => $labelsProduits,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'prix'),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-store',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'query_var' => 'mt_product_store',
        'capability_type' => 'post',
        'rewrite' => $rewriteProduits,
        'register_meta_box_cb' => 'add_prices_metaboxes'
    );
    register_post_type('produit_mt', $argsProduits);
}

add_action('init', 'produits_custom_post_type');

// create two taxonomies, genres and writers for the post type "book"
function create_produits_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => 'Catégories de produits',
        'singular_name' => 'Catégorie de produit',
        'search_items' => 'Recherche une Catégorie de produit',
        'all_items' => 'Toutes les Catégories de produits',
        'parent_item' => 'Parent Catégorie de produit',
        'parent_item_colon' => 'Parent Catégorie de produit:',
        'edit_item' => 'Editer un Catégorie de produit',
        'update_item' => 'Mettre à jour un Catégorie de produit',
        'add_new_item' => 'Ajouter une Catégorie de produit',
        'new_item_name' => 'Nouvelle Catégorie de produit',
        'menu_name' => 'Catégories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'cat_produits'),
    );


    register_taxonomy('produitstype', array('produit_mt'), $args);
}

add_action('init', 'create_produits_taxonomies', 0);

/* -------------------------------------------------- 
  :: METABOX
  ----------------------------------------------------- */
function add_myreferences_metaboxes() {
    add_meta_box('mymetabox_produits_reference', 'Reference du produit: <br />', 'mymetabox_produits_reference', 'produit_mt', 'side', 'low');
}

add_action('add_meta_boxes', 'add_myreferences_metaboxes');

function add_prices_metaboxes() {
    add_meta_box('mymetabox_produits_price', 'Prix du produit: <br /><small>(exemple: 6,20 - ne pas ajouter € )</small>', 'mymetabox_produits_price', 'produit_mt', 'side', 'low');
}

add_action('add_meta_boxes', 'add_prices_metaboxes');

function add_myrecommandations_metaboxes() {
    add_meta_box('mymetabox_produits_recommandation', 'Informations prix: <br /><small>(par personne, conditionnement, prix à l\'unité ou prix au kilos)</small>', 'mymetabox_produits_recommandation', 'produit_mt', 'side', 'low');
}

add_action('add_meta_boxes', 'add_myrecommandations_metaboxes');

/* ---------------------------------------------------- */

function mymetabox_produits_reference() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="produitreferencemeta_noncemenu" id="produitreferencemeta_noncemenu" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
    // Get the price data if its already been entered
    $produitreference = get_post_meta($post->ID, '_produitreference', true);
    // Echo out the field
    echo '<input type="text" name="_produitreference" value="' . $produitreference . '" class="widefat" />';
}

function mymetabox_produits_price() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="produitpricemeta_noncemenu" id="produitpricemeta_noncemenu" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
    // Get the price data if its already been entered
    $produitprice = get_post_meta($post->ID, '_produitprice', true);
    // Echo out the field
    echo '<input type="text" name="_produitprice" value="' . $produitprice . '" class="widefat" />';
}

function mymetabox_produits_recommandation() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="produitrecommandationmeta_noncemenu" id="produitrecommandationmeta_noncemenu" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
    // Get the price data if its already been entered
    $produitrecommandation = get_post_meta($post->ID, '_produitrecommandationmeta', true);
    // Echo out the field
    echo '<input type="text" name="_produitrecommandationmeta" value="' . $produitrecommandation . '" class="widefat" />';
}

/* ---------------------------------------------------- */

// Save the Metabox Data
function my_save_price_meta($post_id, $post) {
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (!wp_verify_nonce($_POST['produitpricemeta_noncemenu'], plugin_basename(__FILE__))
            && !wp_verify_nonce($_POST['produitrecommandationmeta_noncemenu'], plugin_basename(__FILE__))
    ) {
        return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $events_meta['_produitreference'] = $_POST['_produitreference'];
    $events_meta['_produitprice'] = $_POST['_produitprice'];
    $events_meta['_produitrecommandationmeta'] = $_POST['_produitrecommandationmeta'];
    // Add values of $events_meta as custom fields
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if ($post->post_type == 'revision')
            return; // Don't store custom data twice
        $value = implode(',', (array) $value); // If $value is an array, make it a CSV (unlikely)
        if (get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if (!$value)
            delete_post_meta($post->ID, $key); // Delete if blank
    }
    /*
      if (isset($_POST['_produitrecommandationmeta'])) {
      update_post_meta($post_id, '_produitrecommandationmeta', 'yes');
      } else {
      update_post_meta($post_id, '_produitrecommandationmeta', 'no');
      }
     * */
}

add_action('save_post', 'my_save_price_meta', 1, 2); // save the custom fields

/* -------------------------------------------------- 
  :: STICKY POST
  ----------------------------------------------------- */

add_action('admin_footer-post.php', 'gkp_add_sticky_post_support');
add_action('admin_footer-post-new.php', 'gkp_add_sticky_post_support');

function gkp_add_sticky_post_support() {
    global $post, $typenow;
    ?>

    <?php if ($typenow == 'produit_mt' && current_user_can('edit_others_posts')) : ?>
        <script>
            jQuery(function($) {
                var sticky = "<br/><span id='sticky-span'><input id='sticky' name='sticky' type='checkbox' value='sticky' <?php checked(is_sticky($post->ID)); ?> /> <label for='sticky' class='selectit'><?php _e("Stick this post to the front page"); ?></label><br /></span>";	
                $('[for=visibility-radio-public]').append(sticky);	
            });
        </script>
    <?php endif; ?>

    <?php
}
?>
