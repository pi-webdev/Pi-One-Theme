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
<div id="content" class="site-content">
<main role="main" class="container">
  <div class="row">
    <div class="col blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
	  <?php single_cat_title('Category: '); ?>
      </h3>
	  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( '/template-parts/content', 'category' )?>
	  <?php endwhile; ?>
                                
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