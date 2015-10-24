<?php 

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

$content = get_the_content();
echo do_shortcode($content);

add_filter( 'comment_text', 'shortcode_unautop');
add_filter( 'comment_text', 'do_shortcode' );

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );

?>