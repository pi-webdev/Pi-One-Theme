<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_active_sidebar( 'above-content' ) || is_active_sidebar( 'above-content-2' ) ) {?>
        <div id="top-widget" class="section <?php if(!is_theme_preset_active()){ echo 'bg-light'; } ?>">
        
                
                    <?php if ( is_active_sidebar( 'above-content' )) : ?>
                        <div class="col-12"><?php dynamic_sidebar( 'above-content' ); ?></div>
                    <?php endif; ?>
                
              
        </div>

<?php }