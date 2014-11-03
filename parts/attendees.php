<section id="attendees">

    <article>

		<?php

		$attendees_args = array(
			'post_type' => 'ws_attendee',
			'posts_per_page' => -1
		);

		$attendees = new WP_Query( $attendees_args ); ?>

		<?php if ( $attendees->have_posts() ) : ?>

			<?php while ( $attendees->have_posts() ) : $attendees->the_post(); ?>

				<?php
				$attendee_first = get_post_meta( get_the_ID(), 'ws_attendee_first_name', true );
				$attendee_last = get_post_meta( get_the_ID(), 'ws_attendee_last_name',true );
				$attendee_email = get_post_meta( get_the_ID(), 'ws_attendee_email', true );
				$attendee_city = get_post_meta( get_the_ID(), 'ws_attendee_city', true );
				$attendee_country = get_post_meta( get_the_ID(), 'ws_attendee_country', true );
				$attendee_state = get_post_meta( get_the_ID(), 'ws_attendee_state', true );
				$attendee_avatar = get_avatar_url( $attendee_email, '200' );
				?>

				<div class="attendee_item">
				<div class="hexagon hexagon2">
				    <div class="hexagon-in1">
				        <div class="hexagon-in2" style="background-image: url('<?php echo $attendee_avatar; ?>');">
				        </div>
				     </div>
				 </div>
				</div>

	 		<?php endwhile; ?>

	 		<?php wp_reset_postdata(); ?>

	 	<?php endif; ?>

	</article>

</section>