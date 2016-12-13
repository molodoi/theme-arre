<?php
/*
 * Exemple de CUSTOM POST TYPE
 * Un custom post_type permet de créer ses propres POST et PAGES
 */

function services_custom_post_type() {
    // Cette fonction permet de rajouter les custom_post_type
    $labelsServices = array(
        'name' => ( 'Services' ), //nom
        'singular_name' => ( 'Service' ), // nom au singulier
        'menu_name' => ( 'Services' ), // nom du menu
        'parent_item_colon' => ( 'Services parent ' ),
        'all_items' => ( 'Tous les Services' ),
        'view_item' => ( 'Voir le Service' ),
        'add_new_item' => ( 'Ajouter un Service' ),
        'add_new' => ( 'Ajouter' ),
        'edit_item' => ( 'Editer' ),
        'update_item' => ( 'Mettre à jour' ),
        'search_items' => ( 'Rechercher' ),
        'not_found' => ( 'Aucun Service' ),
        'not_found_in_trash' => ( 'Aucun Service dans la corbeille' )
    );
    $rewriteServices = array(
        'slug' => 'services',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );

    $argsServices = array(
        // attributs de l'élément Service
        'label' => 'Service',
        // nom qu’on retrouvera dans la colonne de gauche de l’admin. Il est préférable de mettre un pluriel
        'description' => ( 'Ajouter des Services'),
        'labels' => $labelsServices,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        //'supports' est un array qui définit quels éléments d’un Post normal on veut avoir. Ici titre, fenêtre principale de contenu, extrait, aperçu, sauvegarde automatique de versions passées
        'hierarchical' => true, //définit si il peut y avoir une hiérarchie (comme pour les Pages).
        'public' => true, // définit si les posts seront publics ou non.
        'show_ui' => true, // définit si ce nouvel élément apparaît dans l’admin
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5, // indique la position de ce nouveau contenu dans la barre latérale du back-office WordPress
        'menu_icon' => 'dashicons-carrot', // indique l'icône par défaut
        'can_export' => true,
        'has_archive' => true, //définit si ce type de Post est accessible via une page d’archives où on peut lister tous les Posts
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'query_var' => 'arre_service',
        'capability_type' => 'post', /* définit si le nouvel élément est identique à un Post classique ou à une Page classique. Ici on veut un titre et une image miniature donc Post. En général, les Posts sont beaucoup plus intéressants car ils ont davantage de fonctions que les Pages.*/
        'rewrite' => $rewriteServices,
        'register_meta_box_cb' => 'add_prices_metaboxes'
    );
    register_post_type('service_arre', $argsServices);
    // permet d'ajouter l'élément service_arre à l'admin
}

add_action('init', 'services_custom_post_type');
//permet d'activer toutes les fonctions décrites dans 'services_custom_post_type'

// create two taxonomies, genres and writers for the post type "services"
function create_services_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => 'Catégories de services',
        'singular_name' => 'Catégorie de service',
        'search_items' => 'Recherche une Catégorie de service',
        'all_items' => 'Toutes les Catégories de services',
        'parent_item' => 'Parent Catégorie de service',
        'parent_item_colon' => 'Parent Catégorie de service:',
        'edit_item' => 'Editer une Catégorie de service',
        'update_item' => 'Mettre à jour une Catégorie de service',
        'add_new_item' => 'Ajouter une Catégorie de service',
        'new_item_name' => 'Nouvelle Catégorie de service',
        'menu_name' => 'Catégories',
    );

    $args = array(
        'hierarchical' => true, // définit s'il y a une relation parent-enfant
        'labels' => $labels, // nom descriptif qui s'affichera dans l'admin
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true, // peut permettre d'appeler cette taxonomie dans les templates
        'rewrite' => array('slug' => 'cat_services'), //chaîne de caractères présente dans les permaliens
    );


    register_taxonomy('servicestype', array('service_arre'), $args);
    /* 
    *   permet d'ajouter de nouvelles catégories et de nouveaux tags 
    *   Dans ce cas, 'servicestype' est le nom de la taxonomie
    *   array('service_arre') est l'élément sur lequel elle s'applique
    *   
    */
}

add_action('init', 'create_services_taxonomies', 0);
//permet d'activer toutes les fonctions décrites dans 'create_services_taxonomies'

//ADD POST FORMAT SUPPORT to post_type 'my_custom_post_type'
add_post_type_support( 'service_arre', 'post-formats' );

//ADD POST THUMBNAIL SUPPORT to post_type 'my_custom_post_type'
add_theme_support('post-thumbnails', array('service_arre'));