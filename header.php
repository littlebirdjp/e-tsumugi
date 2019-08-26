<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tsumugi
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tsumugi' ); ?></a>

	<div class="container">

	<div class="row">

	<div class="site-header-wrap col-lg-3">

	<header id="masthead" class="site-header" role="banner">

		<div class="row"><!-- .row -->

		<div class="site-navigation-wrap col-12 order-md-2">

		<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg" role="navigation">
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#primary-menu-area" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				&#9776;
			</button>
			<div id="primary-menu-area" class="menu-area collapse">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu navbar-collapse' ) ); ?>
			<?php
			get_sidebar('top'); ?>
			</div><!-- .menu-area -->
		</nav><!-- #site-navigation -->

		</div><!-- .col -->

		<div class="site-branding-wrap col-12 order-md-1">

		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?><br class="d-none d-lg-inline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php else : ?>
				<p class="site-title"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><br class="d-none d-lg-inline"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif; ?>

		</div><!-- .site-branding -->

		</div><!-- .col -->

		</div><!-- .row -->

	</header><!-- #masthead -->

	</div><!-- .col -->

	<div class="site-content-wrap col-lg-9">

	<div id="content" class="site-content">

		<?php
		if ( is_front_page() || is_home() ) : ?>
		<?php if ( has_custom_header() ) : ?>
			<?php if ( has_header_video() ) { ?>

				<?php if(strpos(get_header_video_url(),'.mp4') !== false) { ?>

					<div class="custom-header header-video-mp4">
						<?php the_custom_header_markup(); ?>
					</div>

				<?php } else { ?>

					<div class="custom-header header-video-youtube embed-responsive embed-responsive-16by9">
						<?php the_custom_header_markup(); ?>
					</div>

				<?php } ?>

			<?php } else { ?>

				<div class="custom-header header-image">
					<?php the_custom_header_markup(); ?>
				</div>

			<?php } ?>
		<?php endif; // End custom header check. ?>

		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif; ?>
		<?php
		endif; ?>
