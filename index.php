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
 * @package pi-one
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header('blog');
?>
<section id="content" class="site-content">
<div class="container">
  <div class="row">
    <main class="col blog-main">
      <h1 class="pb-4 mb-4 font-italic border-bottom border-primary">
	  <?php the_archive_title(  )?>
      </h1>
	  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( '/template-parts/content', 'archive' )?>
	  <?php endwhile; ?>
                                
	                                         <?php endif; ?>

      <nav class="blog-pagination">
	  <?php the_posts_navigation(); ?>
      </nav>

</main><!-- /.blog-main -->
<!--Sidebar section-->
    
      <?php get_sidebar();?>
    <!-- /.blog-sidebar -->

  </div><!-- /.row -->

</div><!-- /.container -->
</section><!--Main site content-->
<?php
get_footer();?>
<!--End Blog Page-->