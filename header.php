<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pi-one
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pi-one' ); ?></a>
    <header id="masthead" class="site-header <?php echo pione_theme_bg_class(); ?>">
    <?php get_template_part( 'sidebar-header');?>
            <div class="container-fluid">
              <nav class="navbar navbar-expand-xl p-0">
                 <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'pione_theme_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'pione_theme_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                 </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                       <?php
                        wp_nav_menu(array(
                        'theme_location'    => 'primary',
                         'container'       => false,
                         'container_id'    => false,
                         'container_class' => false,
                          'menu_id'         => false,
                          'menu_class'      => 'navbar-nav mr-auto pr-5',
                          'depth'           => 3,
                           'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                          'walker'          => new WP_Bootstrap_Navwalker()
                                   ));
                      ?>
                     <!--End top menu-->

                      </div>
               </nav>


            </div>
            <!--fixed navbar end-->

	</header><!-- #masthead -->
    
