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
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div id="content" class="site-content">
						
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pi-theme' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'pi-theme' ), 'after' => '</div>' ) ); ?>
						
					</div>
			</article><!-- #post-<?php the_ID(); ?> -->

				<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>