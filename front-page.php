<?php
/**
 * The front page template (home).
 *
 * @package wordsesh-theme
 */

get_header( 'map' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'parts/attendees' ); ?>

			<?php get_template_part( 'parts/newsletter-signup' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
