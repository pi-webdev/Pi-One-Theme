<?php
if ( ! is_active_sidebar( 'tm-right' ) ) {
	return;
}
?>
<div class="col d-flex justify-content-center align-items-center">
  <?php dynamic_sidebar( 'tm-right' ); ?>
</div><!-- #secondary -->