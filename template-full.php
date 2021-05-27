<?php
/**
 * This template displays full width pages.
 *
 * 
 * 
 * 
 * 
 * Template Name: Full Width Page
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); ?>
<main id="content" class="full-width-title">
<div class="container">
	
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>
				
			
		</div>
				</main>
<?php get_footer(); ?>