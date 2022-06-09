<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pi-one
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header('blog'); ?>

<section id="content" class="site-content">
  <div class="container">
	<div class="row">
	  <div class="col">
		  <div class="card p-4 mb-4 shadow">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div> <!--end-card-->
      </div>
      <?php get_sidebar('sp');?>
     </div>
</div>
	</section>

<?php
get_footer();
