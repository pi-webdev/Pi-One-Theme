<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pi-one
 */

get_header();
?>

<div id="content" class="site-content">
<main role="main" class="container pb-5">
  <div class="row">
    <div class="col-12 d-flex justify-content-center">
      
    <?php get_template_part( '/template-parts/content', 'none' )?>
                               

    </div><!---main -->

  </div><!-- /.row -->

</main><!-- /.container -->
								</div><!--Main site content-->
<?php
get_footer();?>
<!--End Blog Page-->
