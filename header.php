<?php 

?>
<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?php print IMG_DIR; ?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php print IMG_DIR; ?>/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print IMG_DIR; ?>/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print IMG_DIR; ?>/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print IMG_DIR; ?>/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php print IMG_DIR; ?>/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php print IMG_DIR; ?>/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php print IMG_DIR; ?>/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php print IMG_DIR; ?>/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?php print IMG_DIR; ?>/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?php print IMG_DIR; ?>/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?php print IMG_DIR; ?>/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php print IMG_DIR; ?>/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php print IMG_DIR; ?>/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php print IMG_DIR; ?>/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="<?php print IMG_DIR; ?>/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="<?php print IMG_DIR; ?>/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="<?php print IMG_DIR; ?>/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="<?php print IMG_DIR; ?>/mstile-310x310.png" />
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,700%7CRoboto+Slab:400,300,700">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <?php //https://startbootstrap.com/template-overviews/simple-sidebar/ ?>
    <header class="header-top visible-md-block visible-lg-block">        
        <nav class="navbar navbar-default my-navbar navbar-fixed-top " role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1 class="site-title">
                        <?php echo bloginfo('name'); ?>
                    </h1>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                        wp_nav_menu(array(
                            'menu' => 'menu-principal', // identifiant du menu, défini dans functions.php
                            'depth' => 3, // profondeur de menu admise (0 pour no-limit)
                            'container' => false, // élément conteneur
                            'menu_class' => 'nav navbar-nav', // class du menu
                            'fallback_cb' => 'wp_page_menu', //fonction de substitution à utiliser si le menu n'existe pas
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', //défini la forme du menu (ul, ol, rien...)
                            'walker' => new wp_bootstrap_menunav_walker()) //le rôle du Walker est de redéfinir leur comportement, la façon dont elles vont créer ces listes.
                        );
                    ?>
                    <?php
                        if( is_user_logged_in() ):
                            wp_nav_menu(array(
                                'menu' => 'menu-membres', // identifiant du menu, défini dans functions.php
                                'depth' => 3, // profondeur de menu admise (0 pour no-limit)
                                'container' => false, // élément conteneur
                                'menu_class' => 'nav navbar-nav navbar-right', // class du menu
                                'fallback_cb' => 'wp_page_menu', //fonction de substitution à utiliser si le menu n'existe pas
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', //défini la forme du menu (ul, ol, rien...)
                                'walker' => new wp_bootstrap_menunav_walker()) //le rôle du Walker est de redéfinir leur comportement, la façon dont elles vont créer ces listes.
                            );
                        endif;
                    ?>
                    
                    <?php get_search_form(); ?>
                    
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <?php
            /*
            //EXEMPLE :
            wp_nav_menu(
                array(
                    'theme_location'  => 'menu_primaire', // identifiant du menu, défini dans functions.php
                    'container'       => 'nav', // élément conteneur
                    'container_class' => 'class_menu_primaire', // classe de cet élément
                    'container_id'    => 'ID_menu_primaire', // ID de cet élément
                    'menu_class'      => 'class_du_menu', // class du menu
                    'menu_id'         => 'ID_du_menu', // ID du menu
                    'echo'            => true, //true si on veut écrire le menu, false pour un simple return
                    'fallback_cb'     => 'wp_page_menu', //fonction de substitution à utiliser si le menu n'existe pas
                    'before'          => '', // texte à mettre devant le lien
                    'after'           => '', // texte à mettre après le lien
                    'link_before'     => '', // texte par lequel commence le lien
                    'link_after'      => '', // texte par lequel termine le lien
                    'items_wrap'      => '<ul id="\"%1$s\"" class="\"%2$s\"">%3$s</ul>', //défini la forme du menu (ul, ol, rien...)
                    'depth'           => 0, // profondeur de menu admise (0 pour no-limit)
                    'walker'          => new My_Walker() // C'EST CET ELEMENT QUI NOUS INTÉRESSE !!
                )
            );
            */
        ?>
    </header>