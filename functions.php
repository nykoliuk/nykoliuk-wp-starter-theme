<?php

    define('TEMPLATE_PATH', get_template_directory_uri());
    define('TEMPLATE_DIR', get_template_directory());

	/* ***** ----------------------------------------------- ***** **
	** ***** Load All Functions
	** ***** ----------------------------------------------- ***** */

	// Load custom post types
	// require_once( TEMPLATE_DIR . '/includes/cpt-books.php' );

	// Clean up Wordpress markup from unnecessary bloat
	require_once( TEMPLATE_DIR . '/includes/markup_cleanup.php' );

	// Set up all theme features
	require_once( TEMPLATE_DIR . '/includes/theme_setup.php' );

	// Enqueue styles and scripts
	require_once( TEMPLATE_DIR . '/includes/enqueue.php' );

	// Enable Advanced Custom Fields theme option pages
	require_once( TEMPLATE_DIR . '/includes/acf.php' );

	// Optimize front-end admin display options
	require_once( TEMPLATE_DIR . '/includes/admin_display.php' );
    
    // Custom shortcodes
    require_once( TEMPLATE_DIR . '/includes/shortcodes.php' );
    
    // Custom functions
    require_once( TEMPLATE_DIR . '/includes/functions.php' );
    
    // Include tags
	require_once( TEMPLATE_DIR . '/includes/template-tags.php' );

?>