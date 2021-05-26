<?php
/**
 * Template part for displaying page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pi-one
 */

?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pi-one' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
			</section><!-- #post-## -->