<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wordsesh-theme
 */
?><!DOCTYPE html>
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

	<div class="map-container">

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<img width="200" src="<?php echo get_stylesheet_directory_uri(); ?>/images/ws3-logo-outline.png"/>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">

				<button>I'm Attending</button>

				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wordsesh-theme' ); ?></a>

			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="map-canvas"></div>

	</div>

	<div id="content" class="site-content">
