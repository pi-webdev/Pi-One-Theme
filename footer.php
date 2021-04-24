<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pi-one
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
    <?php get_template_part( 'footer-widget' ); ?>
<footer id="colophon" class="footer-menu <?php echo pione_theme_bg_class(); ?>">
	

   
                
            <!-- Start: Links -->
               <?php
                        wp_nav_menu(array(
                        'theme_location'    => 'footer-menu',
                         'container'       => false,
                         'container_id'    => false,
                         'container_class' => false,
                          'menu_id'         => false,
                          'menu_class'      => 'list-inline-item',
                          'depth'           => 3,
                           'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                          'walker'          => new WP_Bootstrap_Navwalker()
                                   ));
                      ?>
                <!-- End: Links -->
            
        
                <div class="col-12 mt-5"> &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://piunoff.eu/pi-one/" target="_blank" title="Pi-One Technical Support"><?php echo esc_html__('Pi-One WordPress Theme','pi-one'); ?></a></div>
    
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>