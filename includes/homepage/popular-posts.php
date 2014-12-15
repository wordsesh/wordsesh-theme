<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Popular Posts Component
 *
 * Display X Popular Posts
 *
 * @author Tiago
 * @since 1.0.0
 * @package WooFramework
 * @subpackage Component
 */

	$settings = array(
			'homepage_popular_posts_title' => __( '', 'woothemes' ),
			'homepage_popular_posts_byline' => __( '', 'woothemes' ),
			'homepage_popular_posts_number' => 3,
			'homepage_popular_posts_period' => 'week',

		);

	$settings = woo_get_dynamic_values( $settings );

?>

<section id="popular-posts" class="home-section">

	<div id="speakers" class="wrapper">

		<?php if ( ( '' != $settings['homepage_popular_posts_title'] ) || ( '' != $settings['homepage_popular_posts_byline'] ) ): ?>
		<header class="section-title">
			<?php if ( '' != $settings['homepage_popular_posts_byline'] ): ?><span class="heading"><?php echo stripslashes( esc_html( $settings['homepage_popular_posts_byline'] ) ); ?></span><?php endif; ?>
			<?php if ( '' != $settings['homepage_popular_posts_title'] ): ?><h1><?php echo stripslashes( esc_html( $settings['homepage_popular_posts_title'] ) ); ?></h1><?php endif; ?>
		</header>
		<?php endif; ?>

		<?php

			$args = array(
						'post_type' => 'speaker',
						'orderby' => 'title',
						'order' => 'ASC',
						'posts_per_page' => '-1',
						'ignore_sticky_posts' => 1
					);

			$popular_posts = new WP_Query( $args );

		?>

		<?php if ( $popular_posts->have_posts() ) : ?>

			<ul>

			<?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>

				<li <?php post_class(); ?>>
					
					<?php $image = get_avatar( get_post_meta( get_the_ID(), 'ws_speaker_email', true ), '300' ); ?>
					
					<?php if ( '' != $image ) { ?>

						<div class="image-wrap">
							
							<?php echo $image; ?>

						<div>
							
					<?php } ?>
					
					<h3><?php the_title(); ?></h3>
					
					<?php
					$company = get_post_meta( get_the_ID(), 'ws_speaker_company', true );
					if ( ! empty( $company) ) { ?>
					
						<p><?php echo $company; ?></p>
						
					<?php } ?>
					
				</li>

			<?php endwhile; ?>

			</ul>

		<?php endif; ?>

	</div><!-- /.wrapper -->

</section><!-- /#popular-posts -->