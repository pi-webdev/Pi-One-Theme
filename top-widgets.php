<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_active_sidebar( 'above-content' ) || is_active_sidebar( 'above-content-2' ) || is_active_sidebar( 'above-content-3' ) ) {?>
        <div id="top-widget" class="section <?php if(!is_theme_preset_active()){ echo 'bg-light'; } ?>">
        
                
                    <?php if ( is_active_sidebar( 'above-content' )) : ?>
                        <div class="col-12 col-md-3"><div class="card m-3"><div class="card-body"><?php dynamic_sidebar( 'above-content' ); ?></div></div></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'above-content-2' )) : ?>
                        <div class="col-12 p-0"><?php dynamic_sidebar( 'above-content-2' ); ?></div>
                    <?php endif; ?>
                
              
        </div>

<?php }