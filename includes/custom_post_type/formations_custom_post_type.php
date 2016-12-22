<?php
/*
 * Exemple de CUSTOM POST TYPE
 * Pour explications, se référer à services_custom_post_type
 */

function formations_custom_post_type() {
    $labelsFormations = array(
        'name' => ( 'Formations' ),
        'singular_name' => ( 'Formation' ),
        'menu_name' => ( 'Formations' ),
        'parent_item_colon' => ( 'Formation parente ' ),
        'all_items' => ( 'Toutes les Formations' ),
        'view_item' => ( 'Voir la Formation' ),
        'add_new_item' => ( 'Ajouter une Formation' ),
        'add_new' => ( 'Ajouter' ),
        'edit_item' => ( 'Editer' ),
        'update_item' => ( 'Mettre à jour' ),
        'search_items' => ( 'Rechercher' ),
        'not_found' => ( 'Aucune Formation' ),
        'not_found_in_trash' => ( 'Aucune Formation dans la corbeille' )
    );
    $rewriteFormations = array(
        'slug' => 'formations',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );

    $argsFormations = array(
        'label' => 'Formation',
        'description' => ( 'Ajouter des Formations'),
        'labels' => $labelsFormations,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'query_var' => 'arre_formation',
        'capability_type' => 'post',
        'rewrite' => $rewriteFormations
    );
    register_post_type('formation_arre', $argsFormations);
}

add_action('init', 'formations_custom_post_type');

// create two taxonomies, genres and writers for the post type "book"
function create_formations_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => 'Catégories de formations',
        'singular_name' => 'Catégorie de formation',
        'search_items' => 'Recherche une Catégorie de formation',
        'all_items' => 'Toutes les Catégories de formations',
        'parent_item' => 'Parent Catégorie de formation',
        'parent_item_colon' => 'Parent Catégorie de formation:',
        'edit_item' => 'Editer une Catégorie de formation',
        'update_item' => 'Mettre à jour une Catégorie de formation',
        'add_new_item' => 'Ajouter une Catégorie de formation',
        'new_item_name' => 'Nouvelle Catégorie de formation',
        'menu_name' => 'Catégories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        //'rewrite' => array('slug' => 'cat_formations/%category%'),
        'rewrite' => array('slug' => 'cat_formations'),
    );


    register_taxonomy('formationstype', array('formation_arre'), $args);
}

add_action('init', 'create_formations_taxonomies', 0);

//ADD POST FORMAT SUPPORT to post_type 'my_custom_post_type'
add_post_type_support( 'formation_arre', 'post-formats' );

//ADD POST THUMBNAIL SUPPORT to post_type 'my_custom_post_type'
add_theme_support('post-thumbnails', array('formation_arre'));