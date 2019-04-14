<?php

	/* ***** ----------------------------------------------- ***** **
	** ***** ACF
	** ***** ----------------------------------------------- ***** */

	if ( function_exists( 'acf_add_options_page' ) ) {

		// Add Theme Options tab to WP Admin
		$parent = acf_add_options_page( array(
			'menu_title'	=> 'Theme Settings',
			'page_title' 	=> 'Theme Settings',
			'menu_slug' 	=> 'nykoliuk-options',
			'capability'	=> 'edit_posts',
			'icon_url'		=> 'dashicons-admin-tools',
		));

		// Add General Options section under the Theme Options tab
		acf_add_options_sub_page( array(
			'page_title' 	=> 'General Options',
			'menu_title'	=> 'General',
			'parent_slug'	=> $parent['menu_slug'],
        ));

	}

?>