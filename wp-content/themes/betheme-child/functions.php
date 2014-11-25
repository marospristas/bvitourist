<?php
wp_enqueue_script( 'mp_js', get_stylesheet_directory_uri().'/js/mp_js.js', array( 'jquery' ) );
add_action('wp_enqueue_scripts', 'prefix_enqueue_awesome');

function prefix_enqueue_awesome() {
    wp_enqueue_style('prefix-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.0.3');
}

add_image_size('netflix', 170, 240, true);
add_image_size('netflix2', 380, 322, true);

function netflix($atts) {

    // Attributes
    extract(shortcode_atts(
                    array(
        'category' => '',
                    ), $atts)
    );
    // WP_Query arguments
    $args = array(
        'post_type' => 'activity',
        'category_name' => '',
        'posts_per_page'=> -1
    );

// The Query
    $myquery = new WP_Query($args);
    if ($myquery->have_posts()) {
        $code = '<div class="slider">
                    <div id="left1" class="left">&lt;</div>
                    <div id="right1" class="right">&gt;</div>
                    <div class="track" id="track1">';
        while ($myquery->have_posts()) {
            $myquery->the_post();
            $img_id = get_post_thumbnail_id($post->ID); // This gets just the ID of the img
            $image = wp_get_attachment_image_src($img_id, 'netflix2'); // Get URL of the image, and size can be set here too (same as with get_the_post_thumbnail, I think)
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            //$code .= '<div class = "column one-fourth column_sliding_box">';
            $code .= '<div class = "box">';
            $code .= '<div class = "sliding_box"><a href = "' . get_the_permalink() . '">';
            $code .= '<div class = "photo_wrapper"><img alt = "'.$alt_text.'" src = "'. $image[0] .'" class = "scale-with-grid">';
            $code .= '</div>';
            $code .= '<div class = "desc_wrapper">';
            $code .= '<h4>'.get_the_title().'</h4>';
            $code .= '</div>';
            $code .= '</a>';
            $code .='</div>';
            $code .='</div>';
        } // end while
        $code .= '</div></div>'; //end track, endslider
    } // end if
    return $code;
}

add_shortcode('netflix', 'netflix');
