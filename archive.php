<?php
/**
 * The template for displaying archive pages.
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
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

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
