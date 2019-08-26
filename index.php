<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tsumugi
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<section class="gallery-wrap">
			<?php
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif; ?>

				<div class="row gallery-area">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post(); ?>

					<?php $gallery_classes = array( 'col-6', 'col-md-4', 'gallery-thumb' ); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class( $gallery_classes ); ?>>
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="gallery-thumbnail">
									<?php the_post_thumbnail('large'); ?>
								</div><!-- .gallery-thumbnail -->
							<?php
							else : ?>
								<div class="gallery-thumbnail">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blank.png">
								</div><!-- .gallery-thumbnail -->
							<?php endif; ?>
						</a>
					</div>

				<?php
				endwhile; ?>
				</div><!-- .gallery-area -->

			<?php the_posts_navigation(); ?>

			</section>
		<?php
		else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
