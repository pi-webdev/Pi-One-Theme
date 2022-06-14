<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pi-one
 */

if ( ! is_active_sidebar( 'page' ) ) {
return;
}
?>
<aside id="secondary" class="sidebar-page col-sm-12 col-lg-4">
  <?php dynamic_sidebar( 'page' ); ?>
</aside> 
