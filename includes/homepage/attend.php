<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$about_options = array(
	'homepage_about_title' => __( 'Fill this out', 'woothemes' ),
	'homepage_about_byline' => __( 'Plan on tuning in?', 'woothemes' ),
	'homepage_about_number' => 9,
);
?>

<section id="attend" class="home-section">

	<div class="wrapper">

		<?php if ( ( '' != $about_options['homepage_about_title'] ) || ( '' != $about_options['homepage_about_byline'] ) ): ?>
		<header class="section-title">
			<?php if ( '' != $about_options['homepage_about_byline'] ): ?><span class="heading"><?php echo stripslashes( esc_html( $about_options['homepage_about_byline'] ) ); ?></span><?php endif; ?>
			<?php if ( '' != $about_options['homepage_about_title'] ): ?><h1><?php echo stripslashes( esc_html( $about_options['homepage_about_title'] ) ); ?></h1><?php endif; ?>
		</header>
		<?php endif; ?>
		
		<?php echo do_shortcode( '[gravityform id="1" name="Attendees" title="false" description="false" ajax="true"]' ) ?>
		
	</div><!-- /.wrapper -->

</section>