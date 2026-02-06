<?php
// Post status and options
$post = array(
	'comment_status' => 'closed',
	'ping_status'    => 'closed',
	'post_author'    => 1,
	'post_date'      => current_time( 'mysql' ),
	'post_name'      => 'home',
	'post_status'    => 'publish',
	'post_title'     => 'Home',
	'post_type'      => 'page',
);

// Insert page
$newvalue = wp_insert_post( $post, false );

if ( $newvalue && ! is_wp_error( $newvalue ) ) {

	// Set page template
	update_post_meta( $newvalue, '_wp_page_template', 'templates/template-frontpage.php' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', absint( $newvalue ) );
}
