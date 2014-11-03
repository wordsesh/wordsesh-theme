<?php
/**
 * The front page template (home).
 *
 * @package wordsesh-theme
 */

get_header( 'map' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h3 class="section-title"><?php _e( 'Attendees', 'wordsesh' ); ?></h3>
			<?php get_template_part( 'parts/attendees' ); ?>

			<h3 class="section-title"><?php _e( 'Be a Part of WordSesh', 'wordsesh' ); ?></h3>
			<?php get_template_part( 'parts/newsletter-signup' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
