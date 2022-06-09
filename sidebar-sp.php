<?php
if ( ! is_active_sidebar( 'sp-sidebar' ) ) {
	return;
}
?>
<aside id="secondary" class="single-post col-sm-12 col-lg-4">
  <?php dynamic_sidebar( 'sp-sidebar' ); ?>
</aside><!-- #secondary -->