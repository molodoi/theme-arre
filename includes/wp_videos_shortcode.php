<?php
/*
 * SHORTCODE
 */
add_shortcode('dailymotion', 'daily_shortcode');

function daily_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
        'height' => 340,
        'width' => 600,
        'start' => ''
            ), $atts);
    extract($atts);
    $start = (empty($start)) ? 0 : $start*60;
    return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" frameborder="0" width="' . $width . '" height="' . $height . '" src="http://www.dailymotion.com/embed/video/' . $id . '?logo=0&hideInfos=1&forcedQuality=hd720&start='. $start.'"></iframe></div>';
}

add_shortcode('youtube', 'youtube_shortcode');

function youtube_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
        'height' => 340,
        'width' => 600,
        'start' => ''
            ), $atts);
    extract($atts);
    $start = (empty($start)) ? 0 : $start*60;
    return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?rel=0&start='.$start.'" frameborder="0" allowfullscreen></iframe></div>';
}

add_shortcode('vimeo', 'vimeo_shortcode');

function vimeo_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
        'height' => 337,
        'width' => 600
            ), $atts);
    extract($atts);
    return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="http://player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="' . $width . '" height="' . $height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
}

add_shortcode('allocine', 'allocine_shortcode');

function allocine_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
        'height' => 340,
        'width' => 600
            ), $atts);
    extract($atts);
    return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="http://www.allocine.fr/_video/iblogvision.aspx?cmedia=' . $id . '" style="width:640px; height:300px"></iframe></div>';
}

?>