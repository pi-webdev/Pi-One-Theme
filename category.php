<?php
/**
 * The template for displaying archive categories pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pi-one
 */

get_header();
?>
<section id="content" class="site-content">
<div  class="container">
  <div class="row">
    <main class="col blog-main">
      <h1 class="pb-4 mb-4 font-italic border-bottom">
	  <?php single_cat_title('Category: '); ?>
      </h1>
	  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( '/template-parts/content', 'category' )?>
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