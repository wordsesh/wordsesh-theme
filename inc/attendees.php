<?php

// Register Attendee Post Type
function ws_attendee_register_post_type() {
	
	$args = array(
		'label' => __( 'Attendee', 'wordsesh' ),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'has_archive' => true,
		'rewrite' => true,
		'query_var' => true,
		'supports' => array( 'title', 'custom-fields' )
	);
	
	register_post_type( 'ws_attendee', $args );
}
add_action( 'init', 'ws_attendee_register_post_type' );

// Add Attendee from Gravity Form Entry
function ws_add_attendee( $entry, $form ){

	$attendee_first_name 	= $entry["1.3"];
	$attendee_last_name		= $entry["1.6"];
	$attendee_email 		= $entry['2'];
	$attendee_city 			= $entry['3'];
	$attendee_country 		= $entry['4'];

	$attendee_title = $attendee_first_name . ' ' . $attendee_last_name . ', ' . $attendee_country;

	$attendee = array(
	  'post_title'    => esc_html( $attendee_title ),
	  'post_content'  => '',
	  'post_status'   => 'pending',
	  'post_author'   => 1,
	  'post_type'     => 'ws_attendee'
	);
	$attendee_id = wp_insert_post( $attendee );
	
	update_post_meta( $attendee_id, 'ws_attendee_first_name', esc_html( $attendee_first_name ) );
	update_post_meta( $attendee_id, 'ws_attendee_last_name', esc_html( $attendee_last_name ) );
	update_post_meta( $attendee_id, 'ws_attendee_email', esc_html( $attendee_email ) );
	update_post_meta( $attendee_id, 'ws_attendee_city', esc_html( $attendee_city ) );
	update_post_meta( $attendee_id, 'ws_attendee_country', esc_html( $attendee_country ) );
	
}
add_action( 'gform_after_submission', 'ws_add_attendee', 10, 2 );

function get_avatar_url( $author_id, $size ) {
    $get_avatar = get_avatar( $author_id, $size );
    preg_match( "/src='(.*?)'/i", $get_avatar, $matches );
    return ( $matches[1] );
}
