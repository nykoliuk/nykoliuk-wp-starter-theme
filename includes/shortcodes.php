<?php
/**
 * Register all shortcodes
 *
 */
// function register_shortcodes() {
//     add_shortcode( 'anchor_block', 'shortcode_anchor_block' );
// }
// add_action( 'init', 'register_shortcodes' );


// ANCHOR Anchor block
// function shortcode_anchor_block($atts, $content = null) {
//     extract(shortcode_atts(array(
//         'id' => '',
//      ), $atts));

//     $id = $atts['id'];
//     $content = do_shortcode($content);

//     return '<div id="'.$id.'" class="anchor-block">'.$content.'</div>';
// }