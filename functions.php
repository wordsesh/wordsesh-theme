<?php

add_action( 'init', function() {
	remove_action( 'homepage', 'woo_display_popular_posts', 20 );
	// remove_action( 'homepage', 'woo_display_testimonials', 30 );
	remove_action( 'homepage', 'woo_display_sensei', 40 );
	remove_action( 'homepage', 'woo_display_recent_posts', 50 );
	remove_action( 'homepage', 'woo_display_our_team', 60 );
	remove_action( 'homepage', 'woo_display_featured_products', 70 );
	
	add_action( 'homepage', 'wordsesh_display_about', 20 );
	add_action( 'homepage', 'wordsesh_display_utc', 30 );
	add_action( 'homepage', 'wordsesh_display_attendees', 40 );
	add_action( 'homepage', 'wordsesh_display_attend', 99 );
});

add_action( 'wp_head', function() { ?>
	<script>
	
		jQuery( function($) {
		
			$.fn.preload = function() {
			    this.each(function(){
			        $('<img/>')[0].src = this;
			    });
			}
		
			var logo1 = '<?php echo get_stylesheet_directory_uri(); ?>/ws-logo.png';
			var logo2 = '<?php echo get_stylesheet_directory_uri(); ?>/ws-logo.png';
			var icon1 = '<?php echo get_stylesheet_directory_uri(); ?>/icon-1.png';
			var icon2 = '<?php echo get_stylesheet_directory_uri(); ?>/icon-2.png';
			var icon3 = '<?php echo get_stylesheet_directory_uri(); ?>/icon-3.png';
			var icon4 = '<?php echo get_stylesheet_directory_uri(); ?>/icon-4.png';
			var clock = '<?php echo get_stylesheet_directory_uri(); ?>/clock.png';
		
			$([logo1, logo2, icon1, icon2, icon3, icon4]).preload();
		
		});
		
	</script>
<?php });

// Only Allow Access to Home
function wordsesh_403_error( $template ) {

	if ( ! is_front_page() ) {

		wp_redirect( home_url() );
		exit;

        header( 'HTTP/1.1 403 Forbidden' );
        return get_stylesheet_directory().'/403.php';
    }

    return $template;
}
add_filter( 'template_include', 'wordsesh_403_error', 1, 1 );

function wordsesh_display_about() {
	get_template_part( 'includes/homepage/about' );
}

function wordsesh_display_utc() {
	get_template_part( 'includes/homepage/utc' );
}

function wordsesh_display_attendees() {
	get_template_part( 'includes/homepage/attendees' );
}

function wordsesh_display_attend() {
	get_template_part( 'includes/homepage/attend' );
}

// Add Attendee from Gravity Form Entry
function ws_add_attendee( $entry, $form ){
	$attendee_first_name 	= ucfirst( $entry["1.3"] );
	$attendee_last_name		= ucfirst( $entry["1.6"] );
	$attendee_email 		= $entry['2'];
	$attendee_city 			= $entry['3'];
	$attendee_country 		= $entry['4'];
	$attendee_state 		= $entry['5'];
	$attendee_title = $attendee_first_name . ' ' . $attendee_last_name;
	$attendee = array(
	  'post_title'    => esc_html( $attendee_title ),
	  'post_content'  => '',
	  'post_status'   => 'pending',
	  'post_author'   => 1,
	  'post_type'     => 'team-member'
	);
	$attendee_id = wp_insert_post( $attendee );
	
	update_post_meta( $attendee_id, 'ws_attendee_first_name', esc_html( $attendee_first_name ) );
	update_post_meta( $attendee_id, 'ws_attendee_last_name', esc_html( $attendee_last_name ) );
	update_post_meta( $attendee_id, '_gravatar_email', esc_html( $attendee_email ) );
	update_post_meta( $attendee_id, 'ws_attendee_city', esc_html( $attendee_city ) );
	update_post_meta( $attendee_id, 'ws_attendee_country', esc_html( $attendee_country ) );
	update_post_meta( $attendee_id, 'ws_attendee_state', esc_html( $attendee_state ) );
	
}

function get_avatar_url( $author_id, $size ) {
    $get_avatar = get_avatar( $author_id, $size );
    preg_match( "/src='(.*?)'/i", $get_avatar, $matches );
    return ( $matches[1] );
}
add_action( 'gform_after_submission', 'ws_add_attendee', 10, 2 );
