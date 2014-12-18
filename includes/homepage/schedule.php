<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<section id="schedule" class="home-section">

	<?php include( 'clock.php' ); ?>

	<div class="wrapper">

		<header class="section-title">
			<span class="heading"><?php _e( 'A Kick-Ass', 'woothemes' ); ?></span>
			<h1><?php _e( 'Schedule', 'woothemes' ); ?></h1>
		</header>

		<div class="col-full">

			<?php

			$args = array( 'post_type' => 'wordsesh_slot', 'posts_per_page' => -1, 'order' => 'ASC' );
			$query = new WP_Query( $args );

			    if ( $query->have_posts() ) : $count = 0;

					while ( $query->have_posts() ) : $query->the_post(); $count++;

					$utc_hour = absint($count - 1); ?>

			    	<div class="timeline-post timeline-post-<?php echo $count; ?>" data-utctime="<?php echo sprintf( "%02u", $utc_hour ); ?>">

						<?php
						if ( $wordsesh_time_slot = get_post_meta( get_the_ID(), 'wordsesh_time', true ) ) :

							if ( wordsesh_is_live() ) {
								if ( $utc_hour == date( 'G' ) )
									$live_now = '<span class="live-now"> - Live Now</span>';
								else
									$live_now = '';
							}
						?>

						<span class="date date-<?php echo $utc_hour ?>"><?php echo $wordsesh_time_slot; ?> UTC <?php echo $live_now; ?></span>

						<?php endif; ?>

						<span class="title"><?php the_title(); ?></span>

						<?php if ( $count == 1 ) { ?>

							<div><a href="http://dradcast.com/" title="The DradCast" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/drad.png" width="100" height="100" alt="The DradCast" /></a></div>

						<?php } ?>

						<?php
						if ( $wordsesh_speakers = get_post_meta( get_the_ID(), 'wordsesh_speakers', true ) ) :
						?>

						<span class="date">with <?php echo $wordsesh_speakers; ?></span>

						<?php endif; ?>

					</div>

			    <?php endwhile; ?>

			<?php endif; wp_reset_postdata(); ?>

			<h2 class="widget-title schedule-kick-ass">We told you it was kick-ass!</h2>

		</div>

	</div><!-- /.wrapper -->

</section>