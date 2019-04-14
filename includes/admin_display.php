<?php

	/* ***** ----------------------------------------------- ***** **
	** ***** Admin Display
	** ***** ----------------------------------------------- ***** */

	// Add thumbnails column to admin post view
	function nm_posts_columns( $defaults ){
		$defaults[ 'my_post_thumbs' ] = 'Image';
		return $defaults;
	}
	add_filter( 'manage_posts_columns', 'nm_posts_columns', 5 );

	// Add thumbnails for each post to admin post view
	function nm_posts_custom_columns( $column_name, $id ){
		if ( $column_name === 'my_post_thumbs' ){
			echo the_post_thumbnail( 'size40' );
		}
	}
	add_action( 'manage_posts_custom_column', 'nm_posts_custom_columns', 5, 2 );

	// Remove widgets from dashboard
	function nm_remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	}
	add_action( 'wp_dashboard_setup', 'nm_remove_dashboard_widgets' );

	// Remove comment support from posts and pages
	function nm_remove_comments_support() {
		remove_post_type_support('post', 'comments');
		remove_post_type_support('page', 'comments');
	}
	add_action( 'init', 'nm_remove_comments_support' );

	// Remove comments tab from the admin
	function nm_remove_comments_menu_page() {
		remove_menu_page( 'edit-comments.php' );
	}
	add_action( 'admin_menu', 'nm_remove_comments_menu_page' );

	// Remove comments meta boxes on post and page edit screens
	function nm_remove_comment_meta_boxes() {
		remove_meta_box( 'commentsdiv', 'page', 'normal' );
		remove_meta_box( 'commentsdiv', 'post', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
	}
	add_action( 'do_meta_boxes', 'nm_remove_comment_meta_boxes' );

	// Remove comments activity on dashboard
	function nm_remove_dashboard_comment_activity() {
		echo '<style type="text/css">li.comment-count, li.comment-mod-count, #latest-comments, #wp-admin-bar-comments { display:none; }</style>';
	}
	add_action( 'admin_head', 'nm_remove_dashboard_comment_activity' );

	// Remove comments from admin bar
	function nm_remove_comments_from_admin_bar() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('comments');
	}
	add_action( 'wp_before_admin_bar_render', 'nm_remove_comments_from_admin_bar' );

?>