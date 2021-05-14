<?php
/**
 * This template displays Blanc page.
 *
 * 
 * 
 * 
 * 
 * Template Name: Blanc Page
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header('blanc'); ?>


<?php get_template_part( 'top-widgets') ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pi-one' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'pi-one' ), 'after' => '</div>' ) ); ?>
						
					
			</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>
            
            <?php get_footer('blanc'); ?>
</body>
</html>