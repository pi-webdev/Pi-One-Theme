<?php


if ( is_active_sidebar( 'contact-nav' ) || is_active_sidebar( 'social-nav' ) || is_active_sidebar( 'cart-nav' ) ) {?>
    
       <div class="container-fluid">
            <div class="row">
                <?php if ( is_active_sidebar( 'contact-nav' )) : ?>
                    <div class="col-12 col-lg-4 d-flex justify-content-start align-items-center"><?php dynamic_sidebar( 'contact-nav' ); ?></div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'social-nav' )) : ?>
                    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center"><?php dynamic_sidebar( 'social-nav' ); ?></div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'cart-nav' )) : ?>
                    <div class="col-12 col-lg-4 d-flex justify-content-end align-items-center"><?php dynamic_sidebar( 'cart-nav' ); ?></div>
                <?php endif; ?>
            </div>
        </div>        
    

<?php }