<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;

?>

	<div id="footer-wrapper">

<?php

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( '' != $woo_options['woo_footer_sidebars'] ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>

		<?php woo_footer_before(); ?>

		<section id="footer-widgets">

			<div class="wrapper col-<?php echo esc_attr( $total ); ?> fix">

				<?php $i = 0; while ( $i < $total ) { $i++; ?>
					<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

				<div class="block footer-widget-<?php echo $i; ?>">
		        	<?php woo_sidebar( 'footer-' . $i ); ?>
				</div>

			        <?php } ?>
				<?php } // End WHILE Loop ?>

			</div><!-- /.wrapper -->

		</section><!-- /#footer-widgets  -->
<?php } // End IF Statement ?>
		<footer id="footer">

			<div class="wrapper">

				<div id="copyright">
				<?php if( isset( $woo_options['woo_footer_top'] ) && $woo_options['woo_footer_top'] == 'true' ) {
						echo wpautop( stripslashes( $woo_options['woo_footer_top_text'] ) );
				} else { ?>
					<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
				<?php } ?>
				</div>

				<div id="credit">
		        <?php if( isset( $woo_options['woo_footer_bottom'] ) && $woo_options['woo_footer_bottom'] == 'true' ) {
		        	echo wpautop( stripslashes( $woo_options['woo_footer_bottom_text'] ) );
				} else { ?>
					<p><a href="<?php echo esc_url( 'http://www.woothemes.com/products/hub/' ); ?>">Hub by <img src="<?php echo esc_url( get_template_directory_uri() . '/images/woothemes.png' ); ?>" alt="WooThemes" /></a></p>
				<?php } ?>
				</div>

			</div><!-- /.wrapper -->

		</footer><!-- /#footer  -->

	</div><!-- /#footer-wrapper -->

	</div><!-- /#inner-wrapper -->
</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>

<script type="text/javascript">
window.twttr = (function (d, s, id) {
  var t, js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src= "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
}(document, "script", "twitter-wjs"));
</script>

</body>
</html>