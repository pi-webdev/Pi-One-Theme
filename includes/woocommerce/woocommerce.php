<?php





// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Pi-one WooCommerce Compatibility
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 5,
        ),
    ) );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

}

/*********************************************************************************************/
/** WooCommerce - Modify each individual input type $args defaults /**
/*********************************************************************************************/

add_filter('woocommerce_form_field_args','wc_form_field_args',10,3);

// Add the cart link to menu
function pione_add_menu_cart_item_to_menus( $items, $args ) {

	// Make sure your change 'pione_main' to your Menu location !!!!
	if ( $args->theme_location === 'primary' ) {

		$css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';

		if ( is_cart() ) {
			$css_class .= 'current-menu-item';
		}

		$items .= '<li class="' . esc_attr( $css_class ) . '">';

			$items .= pione_menu_cart_item();

		$items .= '</li>';

	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'pione_add_menu_cart_item_to_menus', 10, 2 );

// Function returns the main menu cart link
function pione_menu_cart_item() {

	$output = '';

	$cart_count = WC()->cart->cart_contents_count;

	$css_class = 'nav-link ';

	if ( $cart_count ) {
		$url  = wc_get_cart_url();
	} else {
		$url  = wc_get_page_permalink( 'shop' );
	}

	$html = $cart_extra = WC()->cart->get_cart_total();
	$html = str_replace( 'amount', '', $html );

	$output .= '<a href="'. esc_url( $url ) .'" class="' . esc_attr( $css_class ) . '">';

		$output .= '<i class="bi bi-bag"></i>';

		$output .= wp_kses_post( $html );

	$output .= '</a>';

	return $output;
}


// Update cart link with AJAX
function pione_main_menu_cart_link_fragments( $fragments ) {
	$fragments['.pione-menu-cart-total'] = pione_menu_cart_item();
	return $fragments;
}
add_filter( 'add_to_cart_fragments', 'pione_main_menu_cart_link_fragments' );
//endwoocommerce cart


function wc_form_field_args( $args, $key, $value = null ) {

    /*********************************************************************************************/
    /** This is not meant to be here, but it serves as a reference
    /** of what is possible to be changed. /**

    $defaults = array(
    'type'              => 'text',
    'label'             => '',
    'description'       => '',
    'placeholder'       => '',
    'maxlength'         => false,
    'required'          => false,
    'id'                => $key,
    'class'             => array(),
    'label_class'       => array(),
    'input_class'       => array(),
    'return'            => false,
    'options'           => array(),
    'custom_attributes' => array(),
    'validate'          => array(),
    'default'           => '',
    );
    /*********************************************************************************************/

// Start field type switch case

    switch ( $args['type'] ) {

        case "select" :  /* Targets all select input type elements, except the country and state select input types */
            $args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag
            $args['input_class'] = array('form-control', 'input-lg'); // Add a class to the form input itself
            //$args['custom_attributes']['data-plugin'] = 'select2';
            $args['label_class'] = array('control-label');
            $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
            break;

        case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
            $args['class'][] = 'form-group single-country';
            $args['label_class'] = array('control-label');
            break;

        case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
            $args['class'][] = 'form-group'; // Add class to the field's html element wrapper
            $args['input_class'] = array('form-control', 'input-lg'); // add class to the form input itself
            //$args['custom_attributes']['data-plugin'] = 'select2';
            $args['label_class'] = array('control-label');
            $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
            break;


        case "password" :
        case "text" :
        case "email" :
        case "tel" :
        case "number" :
            $args['class'][] = 'form-group';
            //$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
            $args['input_class'] = array('form-control', 'input-lg');
            $args['label_class'] = array('control-label');
            break;

        case 'textarea' :
            $args['input_class'] = array('form-control', 'input-lg');
            $args['label_class'] = array('control-label');
            break;

        case 'checkbox' :
            break;

        case 'radio' :
            break;

        default :
            $args['class'][] = 'form-group';
            $args['input_class'] = array('form-control', 'input-lg');
            $args['label_class'] = array('control-label');
            break;
    }

    return $args;
}
