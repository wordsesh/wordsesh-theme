<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$about_options = array(
	'homepage_about_title' => __( 'About WordSesh', 'woothemes' ),
	'homepage_about_byline' => __( 'Everything You Need To Know', 'woothemes' ),
	'homepage_about_number' => 9,
);
?>

<section id="about" class="home-section">

	<div class="wrapper">

		<?php if ( ( '' != $about_options['homepage_about_title'] ) || ( '' != $about_options['homepage_about_byline'] ) ): ?>
		<header class="section-title">
			<?php if ( '' != $about_options['homepage_about_byline'] ): ?><span class="heading"><?php echo stripslashes( esc_html( $about_options['homepage_about_byline'] ) ); ?></span><?php endif; ?>
			<?php if ( '' != $about_options['homepage_about_title'] ): ?><h1><?php echo stripslashes( esc_html( $about_options['homepage_about_title'] ) ); ?></h1><?php endif; ?>
		</header>
		<?php endif; ?>
		
		<div class="block">
			<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/icon-1.png" width="75" height="75" /></p>
			<h3>When?</h3>
			<p>WordSesh will take place on Saturday, December 20, 2014, 00:00 - 24:00 UTC.</p>
		</div>
		
		<div class="block">
			<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/icon-2.png" width="75" height="75" /></p>
			<h3>How?</h3>
			<p>24 sessions. 1 session every hour, on the hour, for 24 hours.</p>
		</div>
		
		<div class="block">
			<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/icon-3.png" width="75" height="75" /></p>
			<h3>Where?</h3>
			<p>Right here! So grab your coffee, sit back and relax! All you need to do is be by a computer.<p>
		</div>
		
		<div class="block">
			<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/icon-4.png" width="75" height="75" /></p>
			<h3>Why?</h3>
			<p>Because we love WordPress just as much as you do! So grab a pen and some paper and get ready to learn a ton of WordPress knowledge.</p>
		</div>
		
		<p><a class="button" href="http://second.wordsesh.org/" target="_blank">Missed Out Last Year?</a></p>

	</div><!-- /.wrapper -->

</section>