<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) {?>
        <div id="footer-widget" class="row m-0 <?php if(!is_theme_preset_active()){ echo 'bg-light'; } ?>">
           <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div class="col-12 col-md-4 p-0"><div class="card mt-4 mb-4"><div class="card-body "><?php dynamic_sidebar( 'footer-1' ); ?></div></div></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <div class="col-12 col-md-4 p-0"><div class="card mt-4 mb-4 ml-4 mr-4"><div class="card-body"><?php dynamic_sidebar( 'footer-2' ); ?></div></div></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                        <div class="col-12 col-md-4 p-0"><div class="card mt-4 mb-4"><div class="card-body "><?php dynamic_sidebar( 'footer-3' ); ?></div></div></div>
                    <?php endif; ?>
                </div>
            </div>        
        </div>

<?php }