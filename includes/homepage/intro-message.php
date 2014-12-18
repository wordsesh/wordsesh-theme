<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Intro Message Component
 *
 * Display a Intro Message
 *
 * @author Tiago
 * @since 1.0.0
 * @package WooFramework
 * @subpackage Component
 */

$settings = array(
				'homepage_intro_message_heading' => '',
				'homepage_intro_message_content' => '',
				'homepage_intro_message_button_label' => '',				
				'homepage_intro_message_button_url' => ''
			);
					
$settings = woo_get_dynamic_values( $settings );

?>

<section id="intro-message" class="home-section">

	<div class="wrapper">
		
		<?php if ( '' != $settings['homepage_intro_message_heading'] ): ?>
			<h2><?php echo esc_attr( $settings['homepage_intro_message_heading'] ); ?></h2>
		<?php endif; ?>
		
		<?php if ( wordsesh_is_live() ) : ?>

			<?php if ( ( '' != $settings['homepage_intro_message_button_label'] ) && ( '' != $settings['homepage_intro_message_button_url'] ) ): ?>
				<a class="button" href="<?php echo esc_url( $settings['homepage_intro_message_button_url'] ); ?>"><?php echo esc_attr( $settings['homepage_intro_message_button_label'] ); ?></a>
			<?php endif; ?>
			
		<?php else : ?>
			
			<div class="clock animated slideInRight">
				<div class="canvas">
					<canvas id="days" width="148" height="148"></canvas>
					<div class="info">
						<p class="days-val">0</p>
						<p class="text days-text">Days</p>
					</div>
				</div>
				<div class="canvas">
					<canvas id="hours" width="148" height="148"></canvas>
					<div class="info">
						<p class="hours-val">0</p>
						<p class="text hours-text">Hours</p>
					</div>
				</div>
				<div class="canvas">
					<canvas id="minutes" width="148" height="148"></canvas>
					<div class="info">
						<p class="minutes-val">0</p>
						<p class="text minutes-text">Minutes</p>
					</div>
				</div>
				<div class="canvas last-one">
					<canvas id="seconds" width="148" height="148"></canvas>
					<div class="info">
						<p class="seconds-val">0</p>
						<p class="text seconds-text">Seconds</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			
			<p class="blastoff"><a href="#schedule">Until Blastoff!</a></p>
		
		<?php endif; ?>

	</div><!-- /.wrapper -->

</section><!-- /#intro-message -->