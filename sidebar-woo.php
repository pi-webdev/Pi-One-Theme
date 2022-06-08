<?php
if ( ! is_active_sidebar( 'woo' ) ) {
	return;
}
?>
<aside id="secondary" class="site-content col-sm-12 col-lg-4">
  <?php dynamic_sidebar( 'woo' ); ?>
</aside><!-- #secondary -->