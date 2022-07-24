<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pi-one
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pione_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if ( get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default' ) {
        $classes[] = 'theme-preset-active';
    }

	return $classes;
}
add_filter( 'body_class', 'pione_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pione_theme_pingback_header() {
	echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
}
add_action( 'wp_head', 'pione_theme_pingback_header' );


/**
 * Return the header class
 */
function pione_theme_bg_class() {
    switch (get_theme_mod( 'theme_option_setting' )) {
        case "cerulean":
            return 'navbar-dark bg-primary';
            break;
        case "cosmo":
            return 'navbar-dark bg-primary';
            break;
        case "cyborg":
            return 'navbar-dark bg-dark';
            break;
        case "darkly":
            return 'navbar-dark bg-primary';
            break;
        case "flatly":
            return 'navbar-dark bg-primary';
            break;
        case "journal":
            return 'navbar-light bg-light';
            break;
        case "litera":
            return 'navbar-light bg-light';
            break;
        case "lumen":
            return 'navbar-light bg-light';
            break;
        case "lux":
            return 'navbar-light bg-light';
            break;
        case "materia":
            return 'navbar-dark bg-primary';
            break;
        case "minty":
            return 'navbar-dark bg-primary';
            break;
        case "pulse":
            return 'navbar-dark bg-primary';
            break;
        case "sandstone":
            return 'navbar-dark bg-primary';
            break;
        case "simplex":
            return 'navbar-light bg-light';
            break;
        case "sketchy":
            return 'navbar-light bg-light';
            break;
        case "slate":
            return 'navbar-dark bg-primary';
            break;
        case "solar":
            return 'navbar-dark bg-dark';
            break;
        case "spacelab":
            return 'navbar-light bg-light';
            break;
        case "superhero":
            return 'navbar-dark bg-dark';
            break;
        case "united":
            return 'navbar-dark bg-primary';
            break;
        case "yeti":
            return 'navbar-dark bg-primary';
            break;
        default:
            return 'navbar-light';
    }
}

function is_theme_preset_active() {
    if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default'){
        return true;
    }
}

////--ACF Form Bootstrap settings--////

  //--Deregister styles --//

add_action('wp_enqueue_scripts', 'acf_form_deregister_styles');
function acf_form_deregister_styles(){
    
    // Deregister ACF Form style
    wp_deregister_style('acf-global');
    wp_deregister_style('acf-input');
    
    // Avoid dependency conflict
    wp_register_style('acf-global', false);
    wp_register_style('acf-input', false);
    
}

  //--Add Bootstrap styles--//

  add_filter('acf/validate_form', 'acf_form_bootstrap_styles');
  function acf_form_bootstrap_styles($args){
      
      // Before ACF Form
      if(!$args['html_before_fields'])
          $args['html_before_fields'] = '<div class="row">'; // May be .form-row
      
      // After ACF Form
      if(!$args['html_after_fields'])
          $args['html_after_fields'] = '</div>';
      
      // Success Message
      if($args['html_updated_message'] == '<div id="message" class="updated"><p>%s</p></div>')
          $args['html_updated_message'] = '<div id="message" class="updated alert alert-success">%s</div>';
      
      // Submit button
      if($args['html_submit_button'] == '<input type="submit" class="acf-button button button-primary button-large" value="%s" />')
          $args['html_submit_button'] = '<input type="submit" class="acf-button button button-primary button-large btn btn-primary" value="%s" />';
      
      return $args;
      
  }

//--Wrap fields with form-group, col-12 & adding form-control--//

add_filter('acf/prepare_field', 'acf_form_fields_bootstrap_styles');
function acf_form_fields_bootstrap_styles($field){
    
    // Target ACF Form Front only
    if(is_admin() && !wp_doing_ajax())
        return $field;
    
    // Add .form-group & .col-12 fallback on fields wrappers
    $field['wrapper']['class'] .= ' form-group col-12';
    
    // Add .form-control on fields
    $field['class'] .= ' form-control';
    
    return $field;
    
}
//--Adding text-danger on required--//
add_filter('acf/get_field_label', 'acf_form_fields_required_bootstrap_styles');
function acf_form_fields_required_bootstrap_styles($label){
    
    // Target ACF Form Front only
    if(is_admin() && !wp_doing_ajax())
        return $label;
    
    // Add .text-danger
    $label = str_replace('<span class="acf-required">*</span>', '<span class="acf-required text-danger">*</span>', $label);
    
    return $label;
    
}

//--End ACF Form style settings--//

