<?php
    $wp_customize->add_section('arre_coordonates', array(
        'title' => 'Coordonnées',
        'description' => 'Configurer vos coordonées.',
        'priority' => 101
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[display_arre_coordonates]', array(
        'default' => 1,
        'type' => 'option'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_address_arre_coordonates]', array(
        'default' => '14 rue Saint Antoine 59100 Roubaix, France',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_address_arre_coordonates]', array(
        'label' => 'Votre adresse postale (ex: 14 rue Saint Antoine 59100 Roubaix, France)',
        'section' => 'arre_coordonates',
        'settings' => 'arre_custom_settings[arre_address_arre_coordonates]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_geoloc_arre_coordonates]', array(
        'default' => '50.696437,3.1741172',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_geoloc_arre_coordonates]', array(
        'label' => 'Vos géo coordonées (ex: 50.696437,3.1741172)',
        'section' => 'arre_coordonates',
        'settings' => 'arre_custom_settings[arre_geoloc_arre_coordonates]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_phone_arre_coordonates]', array(
        'default' => '0333600000000',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_phones_arre_coordonates]', array(
        'label' => 'Votre numéro de téléphone (ex: 0333600000000)',
        'section' => 'arre_coordonates',
        'settings' => 'arre_custom_settings[arre_phone_arre_coordonates]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_email_arre_coordonates]', array(
        'default' => 'arrenord@gmail.com',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_email_arre_coordonates]', array(
        'label' => 'Votre adresse email (ex: contact@arre-association.fr/)',
        'section' => 'arre_coordonates',
        'settings' => 'arre_custom_settings[arre_email_arre_coordonates]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_google_apikey_coordonates]', array(
        'default' => 'AIzaSyBcVcz5OZ6eNBi5d7CFYHIdtsEI5BQlm68',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_google_apikey_coordonates]', array(
        'label' => 'Votre clé api google maps (Obtenir une clé sur https://developers.google.com/maps/documentation/javascript/)',
        'section' => 'arre_coordonates',
        'settings' => 'arre_custom_settings[arre_google_apikey_coordonates]',
        'type' => 'text'
    ));
?>