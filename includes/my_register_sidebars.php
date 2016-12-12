<?php

/*
 * REGISTER SIDEBAR
 */
if (function_exists('register_sidebar')) {

    register_sidebar(
            array(
                'name' => 'Google map section',
                'id' => 'googlemap-sidebar',
                'description' => 'Cette Zone se situe uniquement sur la page d\'accueil, en dessous de la zone "Notre sélection du traiteur" et peut accueillir 1 Widget maximum de dimension L:1200px H:450px. Respecter le nombre de widgets pour ne pas destructurer le site.',
                'before_widget' => '<div class="col-lg-12"><div id="%1$s" class="widget %2$s"><br />',
                'after_widget' => '</div></div>',
                'before_title' => '',
                'after_title' => ''
            )
    );

    register_sidebar(
            array(
                'name' => 'Pied de Page',
                'id' => 'footer-sidebar',
                'description' => 'Cette Zone se situe uniquement sur la page d\'accueil, en dessous de la zone "Notre sélection du traiteur" et peut accueillir 1 Widget maximum de dimension L:1200px H:450px. Respecter le nombre de widgets pour ne pas destructurer le site.',
                'before_widget' => '<div class="col-lg-4"><div id="%1$s" class="widget %2$s"><br />',
                'after_widget' => '</div></div>',
                'before_title' => '',
                'after_title' => ''
            )
    );

    /*

    register_sidebar(
            array(
                'name' => 'Accueil Zone 2 - Notre savoir faire',
                'id' => 'homezone2-sidebar',
                'description' => 'Cette Zone se situe uniquement sur la page d\'accueil, en dessous de la zone 1 précédente et peut accueillir jusque 4 Widgets Image maximum de dimension L:1200px H:1200px. Respecter le nombre de 4 widgets pour ne pas destructurer le site.',
                'before_widget' => '<div class="item"><div class="panel panel-default">
                            <div class="panel-body">',
                'after_widget' => '</div></div></div>',
                'before_title' => '<h2 class="none">',
                'after_title' => '</h2>'
            )
    );
    
    register_sidebar(
            array(
                'name' => 'Accueil Zone 3 - Image large',
                'id' => 'homezone3-sidebar',
                'description' => 'Cette Zone se situe uniquement sur la page d\'accueil, en dessous de la zone "Notre Savoir faire" et peut accueillir 1 seul et unqiue Widget Image de dimension L:1200px H:310 ou 560px. Respecter le nombre de 1 widget pour ne pas destructurer le site.',
                'before_widget' => '<div class="col-lg-12"><div id="%1$s" class="widget %2$s"><br />',
                'after_widget' => '</div></div>',
                'before_title' => '<h2>',
                'after_title' => '</h2>'
            )
    );

    register_sidebar(
            array(
                'name' => 'Pied de page Zone 1',
                'id' => 'footerzone1-sidebar',
                'description' => 'Cette Zone se situe sur la page d\'accueil, en dessous de la "Zone Accueil 2" ainsi que sur l\'ensemble du site et peut accueillir jusque 2 Widgets maximum. Respecter le nombre de widgets pour ne pas destructurer le site.',
                'before_widget' => '<div class="col-lg-6 %2$s"><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<h2 class="chip-title"><i class="icon-chip650f3a"></i>',
                'after_title' => '</h2>'
            )
    );

    register_sidebar(
            array(
                'name' => 'Pied de page Zone 2',
                'id' => 'footerzone2-sidebar',
                'description' => 'Cette Zone se situe juste en dessous de la "Pied de page Zone 1" ainsi que sur l\'ensemble du site et peut accueillir jusque 2 Widgets maximum. Respecter le nombre de widgets pour ne pas destructurer le site.',
                'before_widget' => '<div class="col-lg-6 %2$s"><div id="%1$s" class="widget %2$s"><br />',
                'after_widget' => '</div></div>',
                'before_title' => '<h2 class="chip-title"><i class="icon-chip650f3a"></i>',
                'after_title' => '</h2>'
            )
    );

    register_sidebar(
            array(
                'name' => 'Zone Barre Latérale',
                'id' => 'produitstype-sidebar',
                'description' => 'Cette Zone se situe sur la barre latérale des pages "Produits" et peut accueillir la majorité des Widgets.',
                'before_widget' => '<div id="%1$s" class="widget %2$s"><br />',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="chip-title"><i class="icon-chip650f3a"></i>',
                'after_title' => '</h2>'
            )
    );
    */
}
?>