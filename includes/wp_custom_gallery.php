<?php

// Remove built in shortcode
remove_shortcode('gallery', 'gallery_shortcode');



// Replace with custom shortcode
function shortcode_gallery($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if (!empty($attr['ids'])) {
        if (empty($attr['orderby'])) {
            $attr['orderby'] = 'post__in';
        }
        $attr['include'] = $attr['ids'];
    }

    $output = apply_filters('post_gallery', '', $attr);

    if ($output != '') {
        return $output;
    }

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby']) {
            unset($attr['orderby']);
        }
    }

    extract(shortcode_atts(array(
                'order' => 'ASC',
                'orderby' => 'menu_order ID',
                'id' => $post->ID,
                'itemtag' => '',
                'icontag' => '',
                'captiontag' => '',
                'columns' => 3,
                'size' => 'thumbnail',
                'include' => '',
                'exclude' => ''
                    ), $attr));

    $id = intval($id);

    if ($order === 'RAND') {
        $orderby = 'none';
    }

    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }

    if (empty($attachments)) {
        return '';
    }

    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment) {
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        }
        return $output;
    }

    $output = '<div class="row">';

    $i = 0;
    foreach ($attachments as $id => $attachment) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
        $image = get_post($id);
        $img = wp_get_attachment_image_src($id, 'thumbnail');
        $largeimg = wp_get_attachment_image_src($id, 'large');
        if($attachment->post_excerpt == '') $attachment->post_excerpt = $attachment->post_title;
        if($attachment->post_excerpt == $attachment->post_content) $attachment->post_content = '';
        
        $output .= '';
        $output .= '<a href="' . $largeimg[0] . '" alt="' . wptexturize($attachment->post_excerpt) . '" data-toggle="lightbox" data-title="' . wptexturize($attachment->post_excerpt). '" data-footer="' . wptexturize($attachment->post_content) . '" class="col-lg-4">';
        if (trim($attachment->post_excerpt)) {
            $output .= '<img src="' . $img[0] . '" alt="' . wptexturize($attachment->post_excerpt) . ' - ' . wptexturize($attachment->post_content) . '" class="img-rounded img-responsive" style="margin-bottom:5px;"/>';
         
            
        } else {
            $output .= '<img src="' . $img[0] . '"  class="img-rounded img-responsive" style="margin-bottom:5px;" />';
        }
        $output .= '</a>';
        $output .= '';
    }
    $output .= '</div>';

    return $output;
}

add_shortcode('gallery', 'shortcode_gallery');
?>