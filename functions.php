<?php
/**
 * pi-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pi-theme
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'pi_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pi_theme_setup() {


		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pi-theme, use a find and replace
		 * to change 'pi-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pi-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

		// This theme uses wp_nav_menu() in 2 location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'pi-theme' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'pi-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background',
			apply_filters(
				'pi_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
				);
				
				//Cust Header//
		add_theme_support( 'custom-header' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		function pi_theme_add_editor_styles() {
			add_editor_style( 'custom-editor-style.css' );
		}
		add_action( 'admin_init', 'pi_theme_add_editor_styles' );

		
	}
endif;
add_action( 'after_setup_theme', 'pi_theme_setup' );

/**
 * Add Welcome message to dashboard
 */
function pi_theme_starter_reminder(){
	$theme_page_url = 'https://piunoff.eu/pi-theme';

		if(!get_option( 'triggered_welcome')){
			$message = sprintf(__( 'Your are installed "Pi-Theme" - Bootstrap Framework WordPress Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page to see our tips and tutorials.', 'pi-theme' ),
				esc_url( $theme_page_url )
			);

			printf(
				'<div class="notice is-dismissible" style="background-color: #427bff; color: #fff; border-left: none;">
					<p>%1$s</p>
				</div>',
				$message
			);
			add_option( 'triggered_welcome', '1', '', 'yes' );
		}

}
add_action( 'admin_notices', 'pi_theme_starter_reminder' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pi_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pi_theme_content_width', 1170 );
}
add_action( 'after_setup_theme', 'pi_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pi_theme_widgets_init() {
   //sidebar//
	register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 1', 'pi-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title pl-3">',
        'after_title'   => '</h3>',
    ) );
	//top-menu//
	register_sidebar( array(
        'name'          => esc_html__( 'Top menu contact widget left area', 'pi-theme' ),
        'id'            => 'contact-nav',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Top menu social icon widget middle area', 'pi-theme' ),
        'id'            => 'social-nav',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Top menu cart  widget right area', 'pi-theme' ),
        'id'            => 'cart-nav',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	//Top-widget above content//
	register_sidebar( array(
        'name'          => esc_html__( 'Top widget left above content area', 'pi-theme' ),
        'id'            => 'above-content',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title pl-5">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Top widget middle above content area', 'pi-theme' ),
        'id'            => 'above-content-2',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title pl-5 pt-5">',
        'after_title'   => '</h2>',
    ) );
	//Footer widgets//
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'pi-theme' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title ml-3">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'pi-theme' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title ml-3">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'pi-theme' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title ml-3">',
        'after_title'   => '</h3>',
    ) );
	//Blog Hero Widgets//
	register_sidebar( array(
        'name'          => esc_html__( 'Blog Hero', 'pi-theme' ),
        'id'            => 'blog_hero',
        'description'   => esc_html__( 'Achive page Hero section widget.', 'pi-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'pi_theme_widgets_init' );


/*----Start Global theme scripts ---*/


function pi_one_scripts() {

	// load bootstrap css
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_style( 'pi-theme-bootstrap-cdn-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' );

    } else {
        wp_enqueue_style( 'pi-theme-bootstrap-css', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );
    }
// load theme styles
// load BS styles
wp_enqueue_style( 'pi-theme-style', get_stylesheet_uri() );
if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
	wp_enqueue_style( 'pi-theme-default'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/css/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'poppins-lora') {
	wp_enqueue_style( 'pi-theme-poppins-lora-font', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather') {
	wp_enqueue_style( 'pi-theme-montserrat-merriweather-font', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins') {
	wp_enqueue_style( 'pi-theme-poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto') {
	wp_enqueue_style( 'pi-theme-roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans') {
	wp_enqueue_style( 'pi-theme-arbutusslab-opensans-font', 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'oswald-muli') {
	wp_enqueue_style( 'pi-theme-oswald-muli-font', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans') {
	wp_enqueue_style( 'pi-theme-montserrat-opensans-font', 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
}
if(get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto') {
	wp_enqueue_style( 'pi-theme-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
}
if(get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
	wp_enqueue_style( 'pi-theme'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/css/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
}

// подключаем
wp_enqueue_script( 'jquery' );

// Internet Explorer HTML5 support
wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/js/html5.js', array(), '3.7.0', false );
wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

// load bootstrap js
if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
	wp_enqueue_script('pi-theme-bootstrapjscdn', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js', array(), '', true );
} else {
	wp_enqueue_script('pi-theme-bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.bundle.min.js', array(), '', true );

}
wp_enqueue_script('ionicons', 'https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js', false, null, true);
wp_enqueue_script('pi-theme-theme', get_template_directory_uri() . '/inc/js/theme-script.min.js', false, null, true );
wp_enqueue_script( 'pi-theme-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.min.js', array(), '', true );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'wp_enqueue_scripts', 'pi_one_scripts' );



/**
* Add Preload for CDN scripts and stylesheet
*/
function pi_one_preload( $hints, $relation_type ){
if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
	$hints[] = [
		'href'        => 'https://cdn.jsdelivr.net/',
		'crossorigin' => 'anonymous',
	];

	$hints[] = [
		'href'        => 'https://unpkg.com/',
		'crossorigin' => 'anonymous',
	];

}
return $hints;
} 

add_filter( 'wp_resource_hints', 'pi_one_preload', 10, 2 );
/*----End global scripts--/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**load TGM */
require get_template_directory() . '/inc/tgm/tgmconnect.php';

/**
 * Register Custom Navigation Walker
 */
function pi_one_navigation(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'pi_one_navigation' );

function pi_one_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'pi_one_nav_menu_args' );

/* End of custom navigation Walker*/ 


