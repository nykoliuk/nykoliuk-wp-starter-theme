<?php

    // Remove Yoast SEO Comments
    if (defined('WPSEO_VERSION')) {
        add_action('wp_head',function() { ob_start(function($o) {
        return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi','',$o);
        }); },~PHP_INT_MAX);
    }

    add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
    // Remove default image sizes here. 
    function prefix_remove_default_images( $sizes ) {
        unset( $sizes['full']); // 1024px
        unset( $sizes['medium_large']); // 768px
        return $sizes;
    }

    /**
     * Remove empty <p> tag.
     *
     * @param type $content
     * @return type
     */
    function pd_remove_unwanted_p($content){
        $content = force_balance_tags( $content );
        $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
        $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
        return $content;
    }
    add_filter('the_content', 'pd_remove_unwanted_p', 20, 1);

    /**
     * Lazy Images
     */
    function add_image_responsive_class($content) {
        global $post;
        $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
        $replacement = '<img$1class="$2 lazy"$3>';
        $content = preg_replace($pattern, $replacement, $content);
        return $content;
    }
    add_filter('the_content', 'add_image_responsive_class');

    add_filter('the_content', 'filter_src');
    function filter_src($content) {
        $content = str_replace('src="', 'data-src="', $content);
        $content = str_replace('srcset="', 'data-srcset="', $content);
        return $content;
    }

    /**
     * Remove Category Title
     */
    add_filter( 'get_the_archive_title', function ($title) {
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
        return $title;
    });
?>