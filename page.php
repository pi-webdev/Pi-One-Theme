<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pi-one
 */

get_header(); ?>
<div id="content" class="site-content">
  <div class="container">
	<div class="row">
	  <main class="col">
	  <?php get_template_part( 'top-widgets') ?>
		  <div class="card p-4 mb-4 shadow">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

			endwhile; // End of the loop.
			?>
			</div>
	  </main>
			<?php get_sidebar('page');?>
	</div>
  </div>
		</div><!--Content-->

<?php
get_footer();
