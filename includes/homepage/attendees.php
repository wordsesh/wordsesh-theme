<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Our Team Component
 *
 * Display Team Members. Requires "Our Team" by WooThemes.
 *
 * @author Tiago
 * @since 1.0.0
 * @package WooFramework
 * @subpackage Component
 */

	$settings = array(
			'homepage_our_team_title' => __( 'Attendees!', 'woothemes' ),
			'homepage_our_team_byline' => __( 'The Most Awesome', 'woothemes' ),
			'homepage_our_team_number' => '5'
		);

?>

<section id="our-team" class="home-section">

	<div id="attendees" class="wrapper">

		<?php if ( ( '' != $settings['homepage_our_team_title'] ) || ( '' != $settings['homepage_our_team_byline'] ) ): ?>
		<header class="section-title">
			<?php if ( '' != $settings['homepage_our_team_byline'] ): ?><span class="heading"><?php echo stripslashes( esc_html( $settings['homepage_our_team_byline'] ) ); ?></span><?php endif; ?>
			<?php if ( '' != $settings['homepage_our_team_title'] ): ?><h1><?php echo stripslashes( esc_html( $settings['homepage_our_team_title'] ) ); ?></h1><?php endif; ?>
		</header>
		<?php endif; ?>

	</div><!-- /.wrapper -->

	<?php
		$limit = intval( $settings['homepage_our_team_number'] );
		do_action( 'woothemes_our_team', array( 'limit' => $limit ) );
	?>

</section><!-- /#our-team -->