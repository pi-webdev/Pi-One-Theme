<?php
/**
 * The template for displaying Woocommerce Product
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 */

 get_header(); ?>
 <div id="content" class="site-content">
   <div class="container">
 	<div class="row">
 	  <main class="col">
 			<?php woocommerce_content(); ?>
 	  </main>
 			<?php get_sidebar( );?>
 	</div>
   </div>
 		</div><!--Content-->

 <?php
 get_footer();