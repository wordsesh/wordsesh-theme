<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$about_options = array(
	'homepage_badges_title' => __( 'Badges', 'woothemes' ),
	'homepage_badges_byline' => __( 'Tell the World!', 'woothemes' ),
);
?>

<section id="badges" class="home-section">

	<div class="wrapper">

		<?php if ( ( '' != $about_options['homepage_badges_title'] ) || ( '' != $about_options['homepage_badges_byline'] ) ): ?>
		<header class="section-title">
			<?php if ( '' != $about_options['homepage_badges_byline'] ): ?><span class="heading"><?php echo stripslashes( esc_html( $about_options['homepage_badges_byline'] ) ); ?></span><?php endif; ?>
			<?php if ( '' != $about_options['homepage_badges_title'] ): ?><h1><?php echo stripslashes( esc_html( $about_options['homepage_badges_title'] ) ); ?></h1><?php endif; ?>
		</header>
		<?php endif; ?>
		
		<div class="badges-inner">
		
			<div class="badge-left">

				<img src="<?php echo get_stylesheet_directory_uri(); ?>/wordsesh-badge-watching.png" height="300" width="300">

				<pre>&lt;a href="http://wordsesh.org/" title="I'm Watching WordSesh 3 Live!"&gt;&lt;img width="300" height="300" title="I'm Watching WordSesh 3 Live!" alt="I'm Watching WordSesh 3 Live!" src="<?php echo get_stylesheet_directory_uri(); ?>/wordsesh-badge-watching.png"&gt;&lt;/a&gt;</pre>
				
			</div>
		
			<div class="badge-right">

				<img src="<?php echo get_stylesheet_directory_uri(); ?>/wordsesh-badge-speaking.png" height="300" width="300">

				<pre>&lt;a href="http://wordsesh.org/" title="I'm Speaking at WordSesh 3 Live!"&gt;&lt;img width="300" height="300" title="I'm Speaking at WordSesh 3 Live!" alt="I'm Speaking at WordSesh 2013 Live!" src="<?php echo get_stylesheet_directory_uri(); ?>/wordsesh-badge-speaking.png"&gt;&lt;/a&gt;</pre>

			</div>
		
		</div>
		
	</div><!-- /.wrapper -->

</section>