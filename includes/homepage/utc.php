<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$about_options = array(
	'homepage_about_title' => __( 'UTC?', 'woothemes' ),
	'homepage_about_byline' => __( 'What is this UTC+0 you speak of?!', 'woothemes' ),
	'homepage_about_number' => 9,
);
?>

<section id="utc" class="home-section">

	<div class="wrapper">

		<?php if ( ( '' != $about_options['homepage_about_title'] ) || ( '' != $about_options['homepage_about_byline'] ) ): ?>
		<header class="section-title">
			<?php if ( '' != $about_options['homepage_about_byline'] ): ?><span class="heading"><?php echo stripslashes( esc_html( $about_options['homepage_about_byline'] ) ); ?></span><?php endif; ?>
			<?php if ( '' != $about_options['homepage_about_title'] ): ?><h1><?php echo stripslashes( esc_html( $about_options['homepage_about_title'] ) ); ?></h1><?php endif; ?>
		</header>
		<?php endif; ?>
		
		<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/clock.png" width="100" height="100" /></p>
		<p>Since people will be tuning in to WordSesh from all over the globe we needed a way to standardize the time.</p>
		<p><a class="button" href="http://arewemeetingyet.com/UTC/2014-12-20/00:00/WordSesh" target="_blank">When Does WordSesh Start for You?</a></p>
		
	</div><!-- /.wrapper -->

</section>