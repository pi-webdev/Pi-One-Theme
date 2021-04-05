<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pi-theme
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>
<div id="content" class="default-page">
<main role="main" class="container">
  <div class="row">
    <div class="col blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
	  <?php the_archive_title(  )?>
      </h3>
	  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( '/template-parts/content', 'archive' )?>
	  <?php endwhile; ?>
                                <?php else : ?>
                                               <p>Записей нет.</p>
	                                         <?php endif; ?>

      <nav class="blog-pagination">
	  <?php the_posts_navigation(); ?>
      </nav>

    </div><!-- /.blog-main -->
<!--Sidebar section-->
    
      <?php get_sidebar();?>
    <!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->
								</div><!--Main site content-->
<?php
get_footer();?>
<!--End Blog Page-->