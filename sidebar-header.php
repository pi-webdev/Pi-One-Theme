<?php


if ( is_active_sidebar( 'contact-nav' ) || is_active_sidebar( 'social-nav' ) || is_active_sidebar( 'cart-nav' ) ) {?>
    
       <div class="container-fluid">
            <div class="row">
                <?php if ( is_active_sidebar( 'contact-nav' )) : ?>
                    <div class="col-12 col-md-4 top-nav-left my-auto mr-auto"><?php dynamic_sidebar( 'contact-nav' ); ?></div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'social-nav' )) : ?>
                    <div class="col-12 col-md-4 top-nav-middle my-auto mx-auto"><?php dynamic_sidebar( 'social-nav' ); ?></div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'cart-nav' )) : ?>
                    <div class="col-12 col-md-4 top-nav-right my-auto ml-auto"><?php dynamic_sidebar( 'cart-nav' ); ?></div>
                <?php endif; ?>
            </div>
        </div>        
    

<?php }