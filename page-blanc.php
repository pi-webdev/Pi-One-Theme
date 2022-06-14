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

			<?php while ( have_posts() ) : the_post(); ?>
			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<?php the_content();?>						
					
</section><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>
            
            <?php get_footer('blanc'); ?>
</body>
</html>