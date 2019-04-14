<?php

	/* ***** ----------------------------------------------- ***** **
	** ***** Theme Setup
	** ***** ----------------------------------------------- ***** */

	// Set up the theme with the following...
	function nykoliuk_setup() {

		// Localisation Support
        load_theme_textdomain('nykoliuk', get_template_directory() . '/languages');

		// Add RSS links to head
		add_theme_support( 'automatic-feed-links' );

		// Allow WordPress to manage the document title
		add_theme_support( 'title-tag' );

		// Enable HTML5 markup support
		add_theme_support( 'html5', [ 'caption', 'gallery', 'search-form' ] );

		// Set Image Link URL default to none
		update_option( 'image_default_link_type', 'none' );

		// Set content width
		if ( !isset( $content_width ) ) $content_width = 800;

		// Remove admin bar when logged in
		// show_admin_bar( false );

		// Enable featured post and thumbnail sizes
		add_theme_support( 'post-thumbnails' );
        add_image_size('size40', 40, 21, true);
        remove_image_size( 'full' );
        remove_image_size( 'medium_large' );
        remove_image_size( 'thumbnail' );
        add_image_size('thumbnail', 480, 250, array('center', 'center' ));
        remove_image_size( 'medium' );
        add_image_size('medium', 600, 9999);
        remove_image_size( 'large' );
        add_image_size('large', 800, 9999);
        add_image_size('large_thumbnail', 800, 420, true);
        

	}
	add_action( 'after_setup_theme', 'nykoliuk_setup' );

	// On login page, update logo URL to site URL
	function nykoliuk_update_login_logo_url() {
		return home_url();
	}
	add_filter( 'login_headerurl', 'nykoliuk_update_login_logo_url' );

	// On login page, update logo title to site title
	function nykoliuk_update_login_logo_title() {
		return get_bloginfo();
	}
	add_filter( 'login_headertitle', 'nykoliuk_update_login_logo_title' );

	// Set maximum number of words on an excerpt
	function nykoliuk_custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'nykoliuk_custom_excerpt_length', 999 );

?>