<?php

function woo_load_frontend_css () {
	$ver = time();
	wp_register_style( 'theme-stylesheet', get_stylesheet_uri(), false, '1.2.2' );
	wp_register_style( 'woo-layout', get_template_directory_uri() . '/css/layout.css' );
	wp_enqueue_style( 'theme-stylesheet' );
	wp_enqueue_style( 'woo-layout' );
}

function wordsesh_is_live() {
	$wordsesh_live = 1;
	if ( $wordsesh_live == 1 ) {
		return true;
	} else {
		return false;
	}
}

function wordsesh_enqueue_scripts() {
	wp_enqueue_script( 'countdown', get_stylesheet_directory_uri() . '/js/countdown.js', array( 'jquery' ),'1.2.2', false );
	wp_enqueue_script( 'scrollbar', get_stylesheet_directory_uri() . '/js/plugin/jquery.jscrollpane.min.js', array( 'jquery' ), '1.2.2', false );
	wp_enqueue_script( 'mwheelsupport', get_stylesheet_directory_uri() . '/js/plugin/jquery.mousewheel.js', array( 'jquery' ), '1.2.2', false );
	wp_enqueue_script( 'mwheelintent', get_stylesheet_directory_uri() . '/js/plugin/mwheelIntent.js', array( 'jquery' ), '1.2.2', false );
	wp_enqueue_script( 'wordsesh-js', get_stylesheet_directory_uri() . '/js/wordsesh.js', array( 'jquery', 'countdown' ), '1.2.2', false );
	if ( is_front_page() ) {
		wp_enqueue_script( 'utc-clock', get_stylesheet_directory_uri() . '/includes/homepage/js/clock.js', array( 'jquery' ), '1.2.2', true );
	}
}
add_action( 'wp_enqueue_scripts', 'wordsesh_enqueue_scripts' );

add_action( 'init', function() {

	remove_action( 'homepage', 'woo_display_popular_posts', 20 );
	remove_action( 'homepage', 'woo_display_testimonials', 30 );
	remove_action( 'homepage', 'woo_display_sensei', 40 );
	remove_action( 'homepage', 'woo_display_recent_posts', 50 );
	remove_action( 'homepage', 'woo_display_our_team', 60 );
	remove_action( 'homepage', 'woo_display_featured_products', 70 );

	add_action( 'homepage', 'wordsesh_display_about', 20 );
	add_action( 'homepage', 'wordsesh_display_utc', 25 );
	add_action( 'homepage', 'wordsesh_display_schedule', 28 );
	add_action( 'homepage', 'woo_display_testimonials', 30 );
	add_action( 'homepage', 'woo_display_popular_posts', 35 );
	add_action( 'homepage', 'wordsesh_display_attendees', 40 );
	// add_action( 'homepage', 'wordsesh_display_attend', 90 );
	add_action( 'homepage', 'wordsesh_display_badges', 95 );

	$speakers_labels = array(
		'name'               => 'Speakers',
		'singular_name'      => 'Speaker',
		'menu_name'          => 'Speakers',
		'name_admin_bar'     => 'Speaker',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Speaker',
		'new_item'           => 'New Speaker',
		'edit_item'          => 'Edit Speaker',
		'view_item'          => 'View Speaker',
		'all_items'          => 'All Speakers',
		'search_items'       => 'Search Speakers',
		'parent_item_colon'  => 'Parent Speakers:',
		'not_found'          => 'No speakers found.',
		'not_found_in_trash' => 'No speakers found in Trash.'
	);

	$speakers_args = array(
		'labels'             => $speakers_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'speaker' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'custom-fields' )
	);

	register_post_type( 'speaker', $speakers_args );

	// Sessions for Room 1
	$sessions_labels = array(
		'name'               => 'Sessions',
		'singular_name'      => 'Session',
		'all_items'			 => 'All Sessions',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Session',
		'edit_item'          => 'Edit Session',
		'new_item'           => 'New Session',
		'all_items'          => 'All Sessions',
		'view_item'          => 'View Session',
		'search_items'       => 'Search Sessions',
		'not_found'          => 'No sessions found',
		'not_found_in_trash' => 'No sessions found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Sessions'
	);

	$sessions_args = array(
		'labels'             => $sessions_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'session' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
	);
	register_post_type( 'wordsesh_slot', $sessions_args );

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

	if ( is_page('live') ) {
		return $template;
	}

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

function wordsesh_display_schedule() {
	get_template_part( 'includes/homepage/schedule' );
}

function wordsesh_display_attendees() {
	get_template_part( 'includes/homepage/attendees' );
}

function wordsesh_display_attend() {
	get_template_part( 'includes/homepage/attend' );
}

function wordsesh_display_badges() {
	get_template_part( 'includes/homepage/badges' );
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

function ws_add_google_fonts () { ?>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<?php }
add_action( 'wp_head', 'ws_add_google_fonts' );

function ws_add_siteground_banner() { ?>

	<div id="siteground">

		<div class="sg-inner">

			<p><a href="http://wpsessions.com/wordsesh/?ref=183" target="_blank">Like WordSesh? Then check out WPSessions. It's like a small WordSesh <span>every month!</span></a></p>

		</div>

	</div>

<?php }
add_action( 'woo_top', 'ws_add_siteground_banner' );
