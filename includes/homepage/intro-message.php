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

		<?php if ( '' != $settings['homepage_intro_message_content'] ): ?>
			<?php echo wpautop( stripslashes( esc_attr( $settings['homepage_intro_message_content'] ) ) ); ?>
		<?php endif; ?>		

		<?php if ( ( '' != $settings['homepage_intro_message_button_label'] ) && ( '' != $settings['homepage_intro_message_button_url'] ) ): ?>
			<a class="button" href="<?php echo esc_url( $settings['homepage_intro_message_button_url'] ); ?>"><?php echo esc_attr( $settings['homepage_intro_message_button_label'] ); ?></a>
		<?php endif; ?> 

	</div><!-- /.wrapper -->

</section><!-- /#intro-message -->