<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<section id="attend" class="home-section">

	<div class="wrapper">

		<header class="section-title">
			<span class="heading"><?php _e( 'Plan on tuning in?', 'woothemes' ); ?></span>
			<h1><?php _e( 'Fill this out', 'woothemes' ); ?></h1>
		</header>
		
		<?php echo do_shortcode( '[gravityform id="1" name="Attendees" title="false" description="false" ajax="true"]' ) ?>
		
	</div><!-- /.wrapper -->

</section>