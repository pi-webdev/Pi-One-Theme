<?php
/**
 * This template displays full width pages without a page title.
 *
 * 
 * 
 * 
 * Template Name: Full Width Page, No Title
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); ?>

         <?php get_template_part( 'top-widgets') ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div id="content" class="full-width">
						
							<?php the_content( ); ?>
					
							<? wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pi-one' ),
				'after'  => '</div>',
			) ); ?>
					</div>
							</main><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>