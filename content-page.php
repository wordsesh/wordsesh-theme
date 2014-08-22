<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wordsesh-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wordsesh-theme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'wordsesh-theme' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'wordsesh-theme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
