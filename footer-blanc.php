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
    
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>