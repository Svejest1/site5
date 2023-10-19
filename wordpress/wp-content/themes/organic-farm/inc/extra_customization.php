<?php

$organic_farm_custom_style= "";
// sticky-header

if( get_option( 'organic_farm_sticky_header',true) != 'on') {

$organic_farm_custom_style .='.menu_header.fixed{';

	$organic_farm_custom_style .='position: static;';
	
$organic_farm_custom_style .='}';
}

if( get_option( 'organic_farm_sticky_header',true) != 'off') {

$organic_farm_custom_style .='.menu_header.fixed{';

	$organic_farm_custom_style .='position: fixed;';
	
$organic_farm_custom_style .='}';
}

// logo-max-height
	
$organic_farm_logo_max_height = get_theme_mod('organic_farm_logo_max_height','100');

if($organic_farm_logo_max_height != false){

$organic_farm_custom_style .='.custom-logo-link img{';

	$organic_farm_custom_style .='max-height: '.esc_html($organic_farm_logo_max_height).'px;';
	
$organic_farm_custom_style .='}';
}

// body-Width

$organic_farm_theme_width = get_theme_mod( 'organic_farm_width_options','full_width');

if($organic_farm_theme_width == 'full_width'){

$organic_farm_custom_style .='body{';

	$organic_farm_custom_style .='max-width: 100%;';

$organic_farm_custom_style .='}';

}else if($organic_farm_theme_width == 'Container'){

$organic_farm_custom_style .='body{';

	$organic_farm_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

$organic_farm_custom_style .='}';

}else if($organic_farm_theme_width == 'container_fluid'){

$organic_farm_custom_style .='body{';

	$organic_farm_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$organic_farm_custom_style .='}';
}

// Scroll-top-position

$organic_farm_scroll_options = get_theme_mod( 'organic_farm_scroll_options','right_align');

if($organic_farm_scroll_options == 'right_align'){

$organic_farm_custom_style .='.scroll-top button{';

	$organic_farm_custom_style .='';

$organic_farm_custom_style .='}';

}else if($organic_farm_scroll_options == 'center_align'){

$organic_farm_custom_style .='.scroll-top button{';

	$organic_farm_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$organic_farm_custom_style .='}';

}else if($organic_farm_scroll_options == 'left_align'){

$organic_farm_custom_style .='.scroll-top button{';

	$organic_farm_custom_style .='right: auto; left:5%; margin: 0 auto';

$organic_farm_custom_style .='}';
}

// text-transform

$organic_farm_text_transform = get_theme_mod( 'organic_farm_menu_text_transform','CAPITALISE');
if($organic_farm_text_transform == 'CAPITALISE'){

$organic_farm_custom_style .='nav#top_gb_menu ul li a{';

	$organic_farm_custom_style .='text-transform: capitalize ; font-size: 14px;';

$organic_farm_custom_style .='}';

}else if($organic_farm_text_transform == 'UPPERCASE'){

$organic_farm_custom_style .='nav#top_gb_menu ul li a{';

	$organic_farm_custom_style .='text-transform: uppercase ; font-size: 14px;';

$organic_farm_custom_style .='}';

}else if($organic_farm_text_transform == 'LOWERCASE'){

$organic_farm_custom_style .='nav#top_gb_menu ul li a{';

	$organic_farm_custom_style .='text-transform: lowercase ; font-size: 14px;';

$organic_farm_custom_style .='}';
}

//Slider-content-alignment

$organic_farm_slider_content_alignment = get_theme_mod( 'organic_farm_slider_content_alignment','LEFT-ALIGN');

if($organic_farm_slider_content_alignment == 'LEFT-ALIGN'){

$organic_farm_custom_style .='.carousel-caption{';

	$organic_farm_custom_style .='text-align:left;  right: 50%; left: 15%;';

$organic_farm_custom_style .='}';


}else if($organic_farm_slider_content_alignment == 'CENTER-ALIGN'){

$organic_farm_custom_style .='.carousel-caption{';

	$organic_farm_custom_style .='text-align:center;   right: 15%; left: 15%;';

$organic_farm_custom_style .='}';


}else if($organic_farm_slider_content_alignment == 'RIGHT-ALIGN'){

$organic_farm_custom_style .='.carousel-caption{';

	$organic_farm_custom_style .='text-align:right;  right: 15%; left: 50%;';

$organic_farm_custom_style .='}';

}

//theme-button

$organic_farm_theme_button_color = get_theme_mod('organic_farm_theme_button_color');

if($organic_farm_theme_button_color != false){

$organic_farm_custom_style .='button,input[type="button"],input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit,a.more-link,a.added_to_cart.wc-forward,.site-footer .search-form .search-submit,.prev.page-numbers, .next.page-numbers, .page-numbers.current, .quote-btn,.toggle-menu button{';

$organic_farm_custom_style .='background: '.esc_attr($organic_farm_theme_button_color).';';

$organic_farm_custom_style .='}';
}
$organic_farm_button_border = get_theme_mod('organic_farm_button_border_radius','30');

if($organic_farm_button_border != false){

	$organic_farm_custom_style .='button,input[type="button"],input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit,
	a.more-link,a.added_to_cart.wc-forward,.site-footer .search-form .search-submit,#sidebar input[type="search"], input[type="search"], .prev.page-numbers, .next.page-numbers,.quote-btn{';

$organic_farm_custom_style .='border-radius: '.esc_attr(

$organic_farm_button_border).'px;';
	
	$organic_farm_custom_style .='}';
}

// slider-button

$organic_farm_slider_button_color = get_theme_mod('organic_farm_slider_button_color');

if($organic_farm_slider_button_color != false){

$organic_farm_custom_style .='.home-btn a, #slider .carousel-control-next-icon, #slider .carousel-control-prev-icon {';

	$organic_farm_custom_style .='background: '.esc_attr($organic_farm_slider_button_color).';';

$organic_farm_custom_style .='}';
}

$organic_farm_slider_button_border_radius = get_theme_mod('organic_farm_slider_button_border_radius','30');

if($organic_farm_slider_button_border_radius != false){

$organic_farm_custom_style .='.home-btn a{';

	$organic_farm_custom_style .='border-radius: '.esc_attr(

$organic_farm_slider_button_border_radius).'px;';
	
$organic_farm_custom_style .='}';
}

//related products
if( get_option( 'organic_farm_related_product',true) != 'on') {

$organic_farm_custom_style .='.related.products{';

	$organic_farm_custom_style .='display: none;';
	
$organic_farm_custom_style .='}';
}

if( get_option( 'organic_farm_related_product',true) != 'off') {

$organic_farm_custom_style .='.related.products{';

	$organic_farm_custom_style .='display: block;';
	
$organic_farm_custom_style .='}';
}