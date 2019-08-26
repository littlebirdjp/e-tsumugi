<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package tsumugi
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<section class="gallery-wrap">
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tsumugi' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
