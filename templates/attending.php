<?php
/*
Template Name: Attending
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wordsesh-theme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<div class="site-header-inner">
			
			<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/poly-logo.png" /></a>
			
			<nav id="site-navigation" class="main-navigation" role="navigation">
				
				<h1 class="menu-toggle"><?php _e( 'Menu', 'wordsesh-theme' ); ?></h1>
				
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wordsesh-theme' ); ?></a>
				
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'wordsesh-theme' ); ?></button>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				
			</nav><!-- #site-navigation -->	
		
			<div class="site-branding">
				
				<span class="event-dates"><?php _e( 'December 20, 2014 00:00 UTC+0', 'wordsesh' ); ?></span>
				
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				
			</div>
			
			<?php get_template_part( 'parts/newsletter-signup' ); ?>
		
		</div>
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<header class="entry-header">
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
						
						<?php get_template_part( 'parts/attendees' ); ?>

						<footer class="entry-footer">
							<?php edit_post_link( __( 'Edit', 'wordsesh-theme' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'wordsesh-theme' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
