<?php
/**
 * Custom header implementation
 */

function organic_farm_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'organic_farm_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 150,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'organic_farm_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'organic_farm_custom_header_setup' );

if ( ! function_exists( 'organic_farm_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see organic_farm_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'organic_farm_header_style' );
function organic_farm_header_style() {
	if ( get_header_image() ) :
	$organic_farm_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position:top;
			height: auto !important;
			background-size:cover!important;
			background-repeat:no-repeat!important;
		}
		.page-header, .woocommerce-page .outer-div {
			background-image:url('".esc_url(get_header_image())."');
			background-position: top;
			background-size:cover!important;
			background-repeat:no-repeat!important;
		}
		";

	   	wp_add_inline_style( 'organic-farm-style', $organic_farm_custom_css );
	endif;
}
endif;


