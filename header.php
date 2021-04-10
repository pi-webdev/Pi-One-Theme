<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pi-theme
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

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pi-theme' ); ?></a>
    <header id="masthead" class="site-header fixed-top <?php echo pi_theme_bg_class(); ?>">
    <?php get_template_part( 'sidebar-header');?>
            <div class="container-fluid">
              <nav class="navbar navbar-expand-xl p-0">
                 <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'pi_theme_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'pi_theme_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
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
                      <?php if( get_theme_mod( 'pi_search_nav_display', 'show' ) == 'show' ) : ?>
                      <div class="search-form ml-2 mr-2"><?php get_search_form( );?></div>
                      <?php endif ?>
                    <!--End search form-->
                      <?php if( get_theme_mod( 'pi_button_nav_display_setting', 'show' ) == 'show' ) : ?>
                        <div><a href="<?php echo esc_html( get_theme_mod( 'pi_button_nav_url', '') ); ?>" class="btn btn-success btn-md ml-2 mt-2  mt-xl-0 "><?php echo esc_html( get_theme_mod( 'pi_button_nav_text', 'pi-theme' ) );?></a></div>
                        <?php endif ?>
                        <!--End button-->
                  
                      </div>
               </nav>
                      

            </div>
            <!--fixed navbar end-->
          
	</header><!-- #masthead -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="sub-header" style="background: url(<?php echo get_custom_header ()->url; ?>)" >
            <div class="container sb-content">
            <h1 class="text-center" data-aos="fade-up" data-aos-duration="700" data-aos-once="true">
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_title_setting' ) );
                    }else{
                        echo 'Bootstrap Framework Theme';
                    }
                    ?>
                </h1>
                <div class="col-8 offset-2">
                  <h2 class="text-center" data-aos="fade-up" data-aos-duration="700" data-aos-once="true" id="subtitle">
                    <?php
                    if(get_theme_mod( 'header_banner_subtitle_setting' )):?>
                        <?php echo esc_attr( get_theme_mod( 'header_banner_subtitle_setting' ) );?>
                    <?php endif
                    ?>
                  </h2>
                </div>
                  <div class="col-8 offset-2">
                        <p><?php
                    if(get_theme_mod( 'header_banner_paragraph_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_paragraph_setting' ) );
                    }else{
                        echo esc_html__('','pi-theme');
                    }
                    ?>
                    </p>
                 </div>
                 <div data-aos="fade-up" data-aos-offset="100px" data-aos-delay="800" data-aos-duration="700"><?php if( get_theme_mod( 'pi_button_display', 'show' ) == 'show' ) : ?>
                        <a href="<?php echo esc_html( get_theme_mod( 'pi_button_url', '' ) ) ?>" class="btn btn-primary btn-lg mx-auto mt-5 mb-5" target="_blank"><?php echo esc_html( get_theme_mod( 'pi_button_text', 'Touch me' ) ) ?></a>
                        <?php endif ?>
                    </div>
                    <a href="#content" class="page-scroller"><ion-icon name="chevron-down-outline"></ion-icon></a>
                    </div><!--container-->
            
        </div>
                    
    <?php endif; ?>
        
            
                
