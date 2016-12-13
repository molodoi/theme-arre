<?php
    $wp_customize->add_section('arre_social_platform', array(
        'title' => 'Réseaux sociaux',
        'description' => 'Configurer vos liens vers vos réseaux sociaux.',
        'priority' => 110
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[display_social_platform]', array(
        'default' => 1,
        'type' => 'option'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_facebook_social_platform]', array(
        'default' => 'https://www.facebook.com/association.ressource.reussite.educative/',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_facebook_social_platform]', array(
        'label' => 'Liens vers votre page facebook',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_facebook_social_platform]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_youtube_social_platform]', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_youtube_social_platform]', array(
        'label' => 'Liens vers votre page youtube',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_youtube_social_platform]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_twitter_social_platform]', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_twitter_social_platform]', array(
        'label' => 'Liens vers votre page twitter',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_twitter_social_platform]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_google_social_platform]', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_google_social_platform]', array(
        'label' => 'Liens vers votre page google',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_google_social_platform]',
        'type' => 'text'
    ));

    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_viadeo_social_platform]', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_viadeo_social_platform]', array(
        'label' => 'Liens vers votre page viadeo',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_viadeo_social_platform]',
        'type' => 'text'
    ));

    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_linkedin_social_platform]', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_linkedin_social_platform]', array(
        'label' => 'Liens vers votre page linkedIn',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_linkedin_social_platform]',
        'type' => 'text'
    ));

    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_pinterest_social_platform]', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_pinterest_social_platform]', array(
        'label' => 'Liens vers votre page pinterest',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_pinterest_social_platform]',
        'type' => 'text'
    ));
    /*****************/
    $wp_customize->add_setting('arre_custom_settings[arre_instagram_social_platform]', array(
        'default' => '',
        'type' => 'option'
    ));

    $wp_customize->add_control('arre_custom_settings[arre_instagram_social_platform]', array(
        'label' => 'Liens vers votre page instagram',
        'section' => 'arre_social_platform',
        'settings' => 'arre_custom_settings[arre_instagram_social_platform]',
        'type' => 'text'
    ));
?>