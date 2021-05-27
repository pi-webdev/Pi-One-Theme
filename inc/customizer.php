<?php
/**
 * pi-one Theme Customizer
 *
 * @package pi-one
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pione_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


function pione_customize_register( $wp_customize ) {

    //Style Preset
    $wp_customize->add_section(
        'typography',
        array(
            'title' => __( 'Preset Styles', 'pi-one' ),
            'description' => __( 'This is a section for the typography', 'pi-one' ),
            'priority' => 20,
        )
    );

    //Theme Option
    $wp_customize->add_setting( 'theme_option_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'theme_option_setting', array(
        'label' => __( 'Theme Option', 'pi-one' ),
        'section'    => 'typography',
        'settings'   => 'theme_option_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'cerulean' => 'Cerulean',
            'cosmo' => 'Cosmo',
            'cyborg' => 'Cyborg',
            'darkly' => 'Darkly',
            'flatly' => 'Flatly',
            'journal' => 'Journal',
            'litera' => 'Litera',
            'lumen' => 'Lumen',
            'lux' => 'Lux',
            'materia' => 'Materia',
            'minty' => 'Minty',
            'pulse' => 'Pulse',
            'sandstone' => 'Sandstone',
            'simplex' => 'Simplex',
            'sketchy' => 'Sketchy',
            'slate' => 'Slate',
            'solar' => 'Solar',
            'spacelab' => 'Spacelab',
            'superhero' => 'Superhero',
            'united' => 'United',
            'yeti' => 'Yeti',
        )
    ) ) );

    $wp_customize->add_setting( 'preset_style_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'preset_style_setting', array(
        'label' => __( 'Typography', 'pi-one' ),
        'section'    => 'typography',
        'settings'   => 'preset_style_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'arbutusslab-opensans' => 'Arbutus Slab / Opensans',
            'montserrat-merriweather' => 'Montserrat / Merriweather',
            'montserrat-opensans' => 'Montserrat / Opensans',
            'oswald-muli' => 'Oswald / Muli',
            'poppins-lora' => 'Poppins / Lora',
            'poppins-poppins' => 'Poppins / Poppins',
            'roboto-roboto' => 'Roboto / Roboto',
            'robotoslab-roboto' => 'Roboto Slab / Roboto',
        )
    ) ) );



    /*Banner*/
    $wp_customize->add_section( 'header_image', array(
            'title' => __( 'Header Banner', 'pi-one' ),
            'priority' => 40,
        )
    );


    $wp_customize->add_control( 'header_img', array(
            'label' => __( 'Header Image', 'pi-one' ),
            'section' => 'header_images',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting( 'header_bg_color_setting', array(
            'default'     => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label'      => __( 'Header Banner Background Color', 'pi-one' ),
                'section'    => 'header_image',
                'settings'   => 'header_bg_color_setting',
            ) )
    );

    $wp_customize->add_setting( 'header_banner_title_setting', array(
        'default' => __( 'Bootstrap Framework Theme', 'pi-one' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __( 'Banner Title H1', 'pi-one' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_title_setting',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'header_banner_subtitle_setting', array(
        'default' => __( 'Medaka ballan wrasse longfin dragonfish half-gill arrowtooth eel cardinalfish oilfish aholehole frogmouth catfish footballfish.','pi-one' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_subtitle_setting', array(
        'label' => __( 'Banner Subtitle H2', 'pi-one' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_subtitle_setting',
        'type' => 'text'
    ) ) );
    $wp_customize->add_setting( 'header_banner_paragraph_setting', array(
        'default' => __( 'To customize the contents go to Customize in your dashboard','pi-one' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_paragraph_setting', array(
        'label' => __( 'Banner paragraph', 'pi-one' ),
        'section'    => 'header_image',
        'settings'   => 'header_banner_paragraph_setting',
        'type' => 'text'
    ) ) );
    $wp_customize->add_setting( 'header_banner_visibility', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'pione_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_visibility', array(
        'settings' => 'header_banner_visibility',
        'label'    => __('Remove Header Banner', 'pi-one'),
        'section'    => 'header_image',
        'type'     => 'checkbox',
    ) ) );

    

//Hero Section Button settings

  $wp_customize->add_setting( 'pione_button_display' , array(
    'default'     => true,
    'transport'   => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
    
) );

$wp_customize->add_control( 'pione_button_display', array(
'label' => 'Button Display',
'section' => 'header_image',
'settings' => 'pione_button_display',
'type' => 'radio',
'choices' => array(
  'show' => 'Show Button',
  'hide' => 'Hide Button',
),
) );

$wp_customize->add_setting( 'pione_button_text' , array(
  'default'     => 'pi-one',
  'transport'   => 'postMessage',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'pione_button_text', array(
  'label' => 'Button Text',
'section'	=> 'header_image',
'settings' => 'pione_button_text',
'type'	 => 'text',
) );

$wp_customize->add_setting( 'pione_button_url' , array(
  'default'     => 'https://piunoff.eu/pi-one',
  'transport'   => 'postMessage',
  'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
) );

$wp_customize->add_control( 'pione_button_url', array(
  'label' => 'Button url://',
'section'	=> 'header_image',
'settings' => 'pione_button_url',
'type'	 => 'text',
) );
//End Hero Sections Button Settings




    //Site Name Text Color
   $wp_customize->add_section(
        'site_name_text_color',
        array(
            'title' => __( 'Text Color', 'pi-one' ),
            'description' => __( 'This is a section for the Site Name text Color.', 'pi-one' ),
            'priority' => 50,
        )
    );
    $wp_customize->add_section(
        'colors',
        array(
            'title' => __( 'Background Color', 'pi-one' ),
            'description' => __( 'This is a section for the header banner Background Color.', 'pi-one' ),
            'priority' => 60,
            'panel' => 'styling_option_panel',
        )
    );
    $wp_customize->add_section(
        'background_image',
        array(
            'title' => __( 'Background Image', 'pi-one' ),
            'description' => __( 'This is a section for the header banner Image.', 'pi-one' ),
            'priority' => 70,
            'panel' => 'styling_option_panel',
        )
    );

    // Bootstrap and Fontawesome Option
    $wp_customize->add_setting( 'cdn_assets_setting', array(
        'default' => __( 'no','pi-one' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( 
        'cdn_assets',
        array(
            'label' => __( 'Use CDN for Assets', 'pi-one' ),
            'description' => __( 'All Bootstrap Assets will be loaded in CDN.', 'pi-one' ),
            'section' => 'typography',
            'settings' => 'cdn_assets_setting',
	        'type'    => 'select',
	        'choices' => array(
	            'yes' => __( 'Yes', 'pi-one' ),
	            'no' => __( 'No', 'pi-one' ),
        	)
        )
    );


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
    $wp_customize->get_control( 'header_textcolor'  )->section = 'site_name_text_color';
    $wp_customize->get_control( 'background_image'  )->section = 'site_name_text_color';
    $wp_customize->get_control( 'background_color'  )->section = 'site_name_text_color';

    // Add control for logo uploader
    $wp_customize->add_setting( 'pione_logo', array(
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pione_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'pi-one' ),
        'section'  => 'title_tagline',
        'settings' => 'pione_logo',
    ) ) );
    
//Top Menu Section settings

$wp_customize->add_section( 'pione_navsection' , array(
      'title'      => 'Top Menu Settings',
      'priority'   => 90,
  ) );

  $wp_customize->add_setting( 'pione_button_nav_display_setting' , array(
    'default'     => true,
    'transport'   => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'pione_button_nav_display_control', array(
'label' => 'Button Display',
'section' => 'pione_navsection',
'settings' => 'pione_button_nav_display_setting',
'type' => 'radio',
'choices' => array(
  'show' => 'Show Button',
  'hide' => 'Hide Button',
),
) );

$wp_customize->add_setting( 'pione_button_nav_text' , array(
  'default'     => 'pi-one',
  'transport'   => 'postMessage',
  'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'pione_button_nav_text', array(
  'label' => 'Button Text',
'section'	=> 'pione_navsection',
'settings' => 'pione_button_nav_text',
'type'	 => 'text',
) );

$wp_customize->add_setting( 'pione_button_nav_url' , array(
  'default'     => 'https://piunoff.eu/pi-one',
  'transport'   => 'postMessage',
  'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
) );

$wp_customize->add_control( 'pione_button_nav_url', array(
  'label' => 'Button url://',
'section'	=> 'pione_navsection',
'settings' => 'pione_button_nav_url',
'type'	 => 'text',
) );

$wp_customize->add_setting( 'pione_search_nav_display' , array(
    'default'     => true,
    'transport'   => 'refresh',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
) );

$wp_customize->add_control( 'pione_search_nav_display', array(
'label' => 'Search form Display',
'section' => 'pione_navsection',
'settings' => 'pione_search_nav_display',
'type' => 'radio',
'choices' => array(
  'show' => 'Show Form',
  'hide' => 'Hide Form',
),
) );
//End Top Menu  Sections Settings


}
add_action( 'customize_register', 'pione_customize_register' );

add_action( 'wp_head', 'pione_customizer_css');
function pione_customizer_css()

{
    $header_bg_color = get_theme_mod('header_bg_color_setting', '#fff');

    ?>
    <style>
        #sub-header { background: <?php echo esc_attr( $header_bg_color ); ?>; }
    </style>
    <?php
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pione_customize_preview_js() {
    wp_enqueue_script( 'pione_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pione_customize_preview_js' );

