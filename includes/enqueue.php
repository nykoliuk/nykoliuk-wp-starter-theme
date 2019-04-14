<?php

	/* ***** ----------------------------------------------- ***** **
	** ***** Enqueue styles and scripts
	** ***** ----------------------------------------------- ***** */

	// Enqueue theme stylesheet
	function nykoliuk_enqueue_styles() {
		$styles_uri = get_stylesheet_directory_uri() . '/assets/css/app-critical.min.css';
		$styles_path = get_stylesheet_directory() . '/assets/css/app-critical.min.css';

		wp_enqueue_style( 'style_app', $styles_uri, false, filemtime( $styles_path ) );
	}
	add_action( 'wp_enqueue_scripts', 'nykoliuk_enqueue_styles' );

	// Enqueue theme scripts
	function nykoliuk_enqueue_scripts() {
		$scripts_uri = get_stylesheet_directory_uri() . '/assets/js/app.min.js';
		$scripts_path = get_stylesheet_directory() . '/assets/js/app.min.js';

		// Replace jQuery
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', TEMPLATE_PATH . '/assets/js/jquery.min.js', '', '', true );

		// Scripts
		wp_enqueue_script( 'script_app', $scripts_uri, false, '0.0.1', true );
	}
    add_action( 'wp_enqueue_scripts', 'nykoliuk_enqueue_scripts' );
    
    //Defer Script
    function add_defer_attribute($tag, $handle) {
        $scripts_to_defer = array('jquery', 'script_app');
    
        foreach($scripts_to_defer as $defer_script) {
        if ($defer_script === $handle) {
            return str_replace(' src', ' defer src', $tag);
        }
        }
        return $tag;
    }
    add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

    // Add backend styles for Gutenberg.
    add_action( 'enqueue_block_editor_assets', 'nykoliuk_add_gutenberg_assets' );

    /**
     * Load Gutenberg stylesheet.
     */
    function nykoliuk_add_gutenberg_assets() {
        // Load the theme styles within Gutenberg.
        wp_enqueue_style( 'nykoliuk-gutenberg', get_theme_file_uri( '/assets/css/gutenberg-style.min.css' ), false );
    }

?>