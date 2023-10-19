<?php
/**
 * Organic Farm: Customizer
 *
 * @subpackage Organic Farm
 * @since 1.0
 */

function organic_farm_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );
  	
	$wp_customize->add_section( 'organic_farm_typography_settings', array(
		'title'       => __( 'Typography', 'organic-farm' ),
		'priority'       => 2,
	) );

	$organic_farm_font_choices = array(
			'' => 'Select',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);

	$wp_customize->add_setting( 'organic_farm_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'organic-farm' ),
		'section'     => 'organic_farm_typography_settings',
		'settings'    => 'organic_farm_section_typo_heading',
	) ) );

	$wp_customize->add_setting( 'organic_farm_headings_text', array(
		'sanitize_callback' => 'organic_farm_sanitize_fonts',
	));

	$wp_customize->add_control( 'organic_farm_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'organic-farm'),
		'section' => 'organic_farm_typography_settings',
		'choices' => $organic_farm_font_choices

	));

	$wp_customize->add_setting( 'organic_farm_body_text', array(
		'sanitize_callback' => 'organic_farm_sanitize_fonts'
	));

	$wp_customize->add_control( 'organic_farm_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'organic-farm' ),
		'section' => 'organic_farm_typography_settings',
		'choices' => $organic_farm_font_choices
	) );

 	$wp_customize->add_section('organic_farm_pro', array(
        'title'    => __('UPGRADE ORGANIC FARM PREMIUM', 'organic-farm'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('organic_farm_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Organic_Farm_Pro_Control($wp_customize, 'organic_farm_pro', array(
        'label'    => __('ORGANIC FARM PREMIUM', 'organic-farm'),
        'section'  => 'organic_farm_pro',
        'settings' => 'organic_farm_pro',
        'priority' => 1,
    )));

    // Theme General Settings
    $wp_customize->add_section('organic_farm_theme_settings',array(
        'title' => __('Theme General Settings', 'organic-farm'),
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'organic_farm_section_sticky_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'organic-farm' ),
		'section'     => 'organic_farm_theme_settings',
		'settings'    => 'organic_farm_section_sticky_heading',
	) ) );

    $wp_customize->add_setting(
		'organic_farm_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_sticky_header',
			array(
				'settings'        => 'organic_farm_sticky_header',
				'section'         => 'organic_farm_theme_settings',
				'label'           => __( 'Show Sticky Header', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'organic_farm_section_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'organic-farm' ),
		'section'     => 'organic_farm_theme_settings',
		'settings'    => 'organic_farm_section_loader_heading',
	) ) );

	$wp_customize->add_setting(
		'organic_farm_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_theme_loader',
			array(
				'settings'        => 'organic_farm_theme_loader',
				'section'         => 'organic_farm_theme_settings',
				'label'           => __( 'Show Site Loader', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'organic_farm_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'organic-farm' ),
		'section'     => 'organic_farm_theme_settings',
		'settings'    => 'organic_farm_section_menu_heading',
	) ) );

	$wp_customize->add_setting('organic_farm_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'organic_farm_sanitize_choices'
	));
	$wp_customize->add_control('organic_farm_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','organic-farm'),
        'section' => 'organic_farm_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','organic-farm'),
            'UPPERCASE' => __('UPPERCASE','organic-farm'),
            'LOWERCASE' => __('LOWERCASE','organic-farm'),
        ),
	) );

	$wp_customize->add_setting( 'organic_farm_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'organic-farm' ),
		'section'     => 'organic_farm_theme_settings',
		'settings'    => 'organic_farm_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
		'organic_farm_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_scroll_enable',
			array(
				'settings'        => 'organic_farm_scroll_enable',
				'section'         => 'organic_farm_theme_settings',
				'label'           => __( 'Show Scroll Top', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('organic_farm_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'organic_farm_sanitize_choices'
	));
	$wp_customize->add_control('organic_farm_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','organic-farm'),
        'section' => 'organic_farm_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','organic-farm'),
            'center_align' => __('Center Align','organic-farm'),
            'left_align' => __('Left Align','organic-farm'),
        ),
	) );

	$wp_customize->add_setting('organic_farm_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Organic_Farm_Fontawesome_Icon_Chooser(
        $wp_customize,'organic_farm_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','organic-farm'),
		'transport' => 'refresh',
		'section'	=> 'organic_farm_theme_settings',
		'setting'	=> 'organic_farm_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_section('organic_farm_breadcrumb_settings',array(
        'title' => __('Breadcrumb', 'organic-farm'),
        'priority' => 2
    ) );

	$wp_customize->add_setting( 'organic_farm_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Breadcrumb Settings', 'organic-farm' ),
		'section'     => 'organic_farm_breadcrumb_settings',
		'settings'    => 'organic_farm_section_breadcrumb_heading',
	) ) );

	$wp_customize->add_setting(
		'organic_farm_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_enable_breadcrumb',
			array(
				'settings'        => 'organic_farm_enable_breadcrumb',
				'section'         => 'organic_farm_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	if ( class_exists( 'WooCommerce' ) ) { 
	$wp_customize->add_section('organic_farm_woocommerce_settings',array(
        'title' => __('WooCommerce Settings', 'organic-farm'),
        'priority' => 2,
    ) );

	$wp_customize->add_setting( 'organic_farm_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_shoppage_heading', array(
		'label'       => esc_html__( 'Sidebar Settings', 'organic-farm' ),
		'section'     => 'organic_farm_woocommerce_settings',
		'settings'    => 'organic_farm_section_shoppage_heading',
	) ) );

	$wp_customize->add_setting(
		'organic_farm_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_shop_page_sidebar',
			array(
				'settings'        => 'organic_farm_shop_page_sidebar',
				'section'         => 'organic_farm_woocommerce_settings',
				'label'           => __( 'Show Shop Page Sidebar', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'organic_farm_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'organic_farm_wocommerce_single_page_sidebar',
				'section'         => 'organic_farm_woocommerce_settings',
				'label'           => __( 'Show Single Product Page Sidebar', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'organic_farm_section_archieve_product_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_archieve_product_heading', array(
		'label'       => esc_html__( 'Archieve Product Settings', 'organic-farm' ),
		'section'     => 'organic_farm_woocommerce_settings',
		'settings'    => 'organic_farm_section_archieve_product_heading',
	) ) );

	$wp_customize->add_setting('organic_farm_archieve_item_columns',array(
        'default' => '3',
        'sanitize_callback' => 'organic_farm_sanitize_choices'
	));

	$wp_customize->add_control('organic_farm_archieve_item_columns',array(
        'type' => 'select',
        'label' => __('Select No of Columns','organic-farm'),
        'section' => 'organic_farm_woocommerce_settings',
        'choices' => array(
            '1' => __('One Column','organic-farm'),
            '2' => __('Two Column','organic-farm'),
            '3' => __('Three Column','organic-farm'),
            '4' => __('four Column','organic-farm'),
            '5' => __('Five Column','organic-farm'),
            '6' => __('Six Column','organic-farm'),
        ),
	) );

	$wp_customize->add_setting( 'organic_farm_archieve_shop_perpage', array(
		'default'              => 6,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'organic_farm_sanitize_number_absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'organic_farm_archieve_shop_perpage', array(
		'label'       => esc_html__( 'Display Products','organic-farm' ),
		'section'     => 'organic_farm_woocommerce_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	) );

	$wp_customize->add_setting( 'organic_farm_section_related_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_related_heading', array(
		'label'       => esc_html__( 'Related Product Settings', 'organic-farm' ),
		'section'     => 'organic_farm_woocommerce_settings',
		'settings'    => 'organic_farm_section_related_heading',
	) ) );

	$wp_customize->add_setting('organic_farm_related_item_columns',array(
        'default' => '3',
        'sanitize_callback' => 'organic_farm_sanitize_choices'
	));

	$wp_customize->add_control('organic_farm_related_item_columns',array(
        'type' => 'select',
        'label' => __('Select No of Columns','organic-farm'),
        'section' => 'organic_farm_woocommerce_settings',
        'choices' => array(
            '1' => __('One Column','organic-farm'),
            '2' => __('Two Column','organic-farm'),
            '3' => __('Three Column','organic-farm'),
            '4' => __('four Column','organic-farm'),
            '5' => __('Five Column','organic-farm'),
            '6' => __('Six Column','organic-farm'),
        ),
	) );

	$wp_customize->add_setting( 'organic_farm_related_shop_perpage', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'organic_farm_sanitize_number_absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'organic_farm_related_shop_perpage', array(
		'label'       => esc_html__( 'Display Products','organic-farm' ),
		'section'     => 'organic_farm_woocommerce_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting(
		'organic_farm_related_product',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);

	$wp_customize->add_control(new Organic_Farm_Customizer_Customcontrol_Switch($wp_customize,'organic_farm_related_product',
		array(
			'settings'        => 'organic_farm_related_product',
			'section'         => 'organic_farm_woocommerce_settings',
			'label'           => __( 'Show Related Products', 'organic-farm' ),				
			'choices'		  => array(
				'1'      => __( 'On', 'organic-farm' ),
				'off'    => __( 'Off', 'organic-farm' ),
			),
			'active_callback' => '',
		)
	));

}
	//theme width

	$wp_customize->add_section('organic_farm_theme_width_settings',array(
        'title' => __('Theme Width Option', 'organic-farm'),
        'priority' => 2,
    ) );

	$wp_customize->add_setting( 'organic_farm_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Settings', 'organic-farm' ),
		'section'     => 'organic_farm_theme_width_settings',
		'settings'    => 'organic_farm_theme_width_heading',
	) ) );

	$wp_customize->add_setting('organic_farm_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'organic_farm_sanitize_choices'
	));
	$wp_customize->add_control('organic_farm_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','organic-farm'),
        'section' => 'organic_farm_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','organic-farm'),
            'Container' => __('Container','organic-farm'),
            'container_fluid' => __('Container Fluid','organic-farm'),
        ),
	) );
	//button
	$wp_customize->add_section('organic_farm_button_options',array(
        'title' => __('Button settings', 'organic-farm'),
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'organic_farm_section_other_button_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_other_button_heading', array(
		'label'       => esc_html__( 'Other Page Button Settings', 'organic-farm' ),
		'section'     => 'organic_farm_button_options',
		'settings'    => 'organic_farm_section_other_button_heading',
	) ) );

	

    $wp_customize->add_setting( 'organic_farm_theme_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_farm_theme_button_color', array(
	    'label'       => esc_html__( 'Background Color', 'organic-farm' ),
	    'section' => 'organic_farm_button_options',
	    'settings' => 'organic_farm_theme_button_color',
  	)));

	$wp_customize->add_setting('organic_farm_button_border_radius',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_integer'
	));
	$wp_customize->add_control(new Organic_Farm_Slider_Custom_Control( $wp_customize, 'organic_farm_button_border_radius',array(
		'label' => esc_html__( 'Border Radius','organic-farm' ),
		'section'=> 'organic_farm_button_options',
		'settings'=>'organic_farm_button_border_radius',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 30,
        ),
	)));

	$wp_customize->add_setting( 'organic_farm_section_slider_button_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_slider_button_heading', array(
		'label'       => esc_html__( 'Slider Button Settings', 'organic-farm' ),
		'section'     => 'organic_farm_button_options',
		'settings'    => 'organic_farm_section_slider_button_heading',
	) ) );

	$wp_customize->add_setting( 'organic_farm_slider_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'organic_farm_slider_button_color', array(
	    'label' => __(' Background color','organic-farm'),
	    'section' => 'organic_farm_button_options',
	    'settings' => 'organic_farm_slider_button_color',
  	)));

  	$wp_customize->add_setting('organic_farm_slider_button_border_radius',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_integer'
	));
	$wp_customize->add_control(new Organic_Farm_Slider_Custom_Control( $wp_customize, 'organic_farm_slider_button_border_radius',array(
		'label' => esc_html__( ' Border Radius','organic-farm' ),
		'section'=> 'organic_farm_button_options',
		'settings'=>'organic_farm_slider_button_border_radius',
		'input_attrs' => array(
			'reset'            => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 30,
        ),
	)));

	// Post Layouts
    $wp_customize->add_section('organic_farm_layout',array(
        'title' => __('Post Layout', 'organic-farm'),
        'priority'=> 2,
    ) );

    $wp_customize->add_setting( 'organic_farm_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_post_heading', array(
		'label'       => esc_html__( 'Single Post Structure', 'organic-farm' ),
		 'description' => __( 'Change the post layout from below options', 'organic-farm' ),
		'section'     => 'organic_farm_layout',
		'settings'    => 'organic_farm_section_post_heading',
	) ) );

	$wp_customize->add_setting( 'organic_farm_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control( new Organic_Farm_Radio_Image_Control( $wp_customize, 'organic_farm_single_post_option',
			array(
				'type'=>'select',
				'label' => __( 'select Single Post Page Layout', 'organic-farm' ),
				'section' => 'organic_farm_layout',
				'choices' => array(

					'single_right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'organic-farm' )
					),
					'single_left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'organic-farm' )
					),
					'single_full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'One Column', 'organic-farm' )
					),
				)
			)
		) );


	$wp_customize->add_setting('organic_farm_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new organic_farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_single_post_date',
			array(
				'settings'        => 'organic_farm_single_post_date',
				'section'         => 'organic_farm_layout',
				'label'           => __( 'Show Date', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'organic_farm_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_single_post_date',
	) );

	$wp_customize->add_setting('organic_farm_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new organic_farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_single_post_admin',
			array(
				'settings'        => 'organic_farm_single_post_admin',
				'section'         => 'organic_farm_layout',
				'label'           => __( 'Show Author/Admin', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'organic_farm_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_single_post_admin',
	) );

	$wp_customize->add_setting('organic_farm_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new organic_farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_single_post_comment',
			array(
				'settings'        => 'organic_farm_single_post_comment',
				'section'         => 'organic_farm_layout',
				'label'           => __( 'Show Comment', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'organic_farm_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'organic-farm' ),
		 'description' => __( 'Change the Single  post layout from below options', 'organic-farm' ),
		'section'     => 'organic_farm_layout',
		'settings'    => 'organic_farm_section_archive_post_heading',
	) ) );

    $wp_customize->add_setting( 'organic_farm_post_option',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Organic_Farm_Radio_Image_Control( $wp_customize, 'organic_farm_post_option',
			array(
				'type'=>'select',
				'label' => __( 'select Post Page Layout', 'organic-farm' ),
				'section' => 'organic_farm_layout',
				'choices' => array(
					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'organic-farm' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left sidebar', 'organic-farm' )
					),
					'one_column' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'One Column', 'organic-farm' )
					),
					'three_column' => array(
						'image' => get_template_directory_uri().'/assets/images/3column.jpg',
						'name' => __( 'Three Column', 'organic-farm' )
					),
					'four_column' => array(
						'image' => get_template_directory_uri().'/assets/images/4column.jpg',
						'name' => __( 'Four Column', 'organic-farm' )
					),
					'grid_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
						'name' => __( 'Grid Right-Sidebar Layout', 'organic-farm' )
					),
					'grid_left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/grid-left.png',
						'name' => __( 'Grid Left-Sidebar Layout', 'organic-farm' )
					),
					'grid_post' => array(
						'image' => get_template_directory_uri().'/assets/images/grid.jpg',
						'name' => __( 'Grid Layout', 'organic-farm' )
					)
				)
			)
		) );

    $wp_customize->add_setting('organic_farm_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'organic_farm_sanitize_select'
	));
	$wp_customize->add_control('organic_farm_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','organic-farm'),
		'section' => 'organic_farm_layout',
		'setting' => 'organic_farm_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','organic-farm'),
            '2_column' => __('2','organic-farm'),
            '3_column' => __('3','organic-farm'),
            '4_column' => __('4','organic-farm'),
            '5_column' => __('6','organic-farm'),
        ),
	));

	$wp_customize->add_setting('organic_farm_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_date',
			array(
				'settings'        => 'organic_farm_date',
				'section'         => 'organic_farm_layout',
				'label'           => __( 'show Date', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'organic_farm_date', array(
		'selector' => '.date-box',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_date',
	) );

	$wp_customize->add_setting('organic_farm_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_admin',
			array(
				'settings'        => 'organic_farm_admin',
				'section'         => 'organic_farm_layout',
				'label'           => __( 'show Author/Admin', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'organic_farm_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_admin',
	) );

	$wp_customize->add_setting('organic_farm_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_comment',
			array(
				'settings'        => 'organic_farm_comment',
				'section'         => 'organic_farm_layout',
				'label'           => __( 'show Comment', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'organic_farm_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_comment',
	) );


	// Top Header
    $wp_customize->add_section('organic_farm_top',array(
        'title' => __('Contact info', 'organic-farm'),
        'priority'=> 2,
    ) );

    $wp_customize->add_setting( 'organic_farm_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_contact_heading', array(
		'label'       => esc_html__( 'Contact Settings', 'organic-farm' ),
        'description' => __( 'Add contact info in the below feilds', 'organic-farm' ),
		'section'     => 'organic_farm_top',
		'settings'    => 'organic_farm_section_contact_heading',
		'priority'    => 1,
	) ) );

    $wp_customize->add_setting('organic_farm_email_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('organic_farm_email_text',array(
		'label' => esc_html__('Add Text','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_email_text',
		'type'    => 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'organic_farm_email_text', array(
		'selector' => '.mail-box',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_email_text',
	) );

	$wp_customize->add_setting('organic_farm_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('organic_farm_email',array(
		'label' => esc_html__('Add Email Address','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_email',
		'type'    => 'text'
	));

	$wp_customize->add_setting('organic_farm_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Organic_Farm_Fontawesome_Icon_Chooser(
        $wp_customize,'organic_farm_email_icon',array(
		'label'	=> __('Add Email Icon','organic-farm'),
		'transport' => 'refresh',
		'section'	=> 'organic_farm_top',
		'setting'	=> 'organic_farm_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('organic_farm_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('organic_farm_call_text',array(
		'label' => esc_html__('Add Text','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_call_text',
		'type'    => 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'organic_farm_call_text', array(
		'selector' => '.phone-box',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_call_text',
	) );

	$wp_customize->add_setting('organic_farm_call',array(
		'default' => '',
		'sanitize_callback' => 'organic_farm_sanitize_phone_number'
	));
	$wp_customize->add_control('organic_farm_call',array(
		'label' => esc_html__('Add Phone Number','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_call',
		'type'    => 'text'
	));

	$wp_customize->add_setting('organic_farm_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Organic_Farm_Fontawesome_Icon_Chooser(
        $wp_customize,'organic_farm_call_icon',array(
		'label'	=> __('Add Phone Icon','organic-farm'),
		'transport' => 'refresh',
		'section'	=> 'organic_farm_top',
		'setting'	=> 'organic_farm_call_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('organic_farm_quote_btn',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('organic_farm_quote_btn',array(
		'label' => esc_html__('Add Button Text','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_quote_btn',
		'type'    => 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'organic_farm_quote_btn', array(
		'selector' => '.quote-btn',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_quote_btn',
	) );

    $wp_customize->add_setting('organic_farm_quote_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('organic_farm_quote_btn_link',array(
		'label' => esc_html__('Add Button Link','organic-farm'),
		'section' => 'organic_farm_top',
		'setting' => 'organic_farm_quote_btn_link',
		'type'    => 'url'
	));

	// Social Media
    $wp_customize->add_section('organic_farm_urls',array(
        'title' => __('Social Media', 'organic-farm'),
        'priority'=> 2,
    ) );

     $wp_customize->add_setting( 'organic_farm_section_social_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'organic-farm' ),
		'description' => __( 'Add social media links in the below feilds', 'organic-farm' ),
		'section'     => 'organic_farm_urls',
		'settings'    => 'organic_farm_section_social_heading',
	) ) );

	$wp_customize->add_setting(
		'header_social_icon_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'header_social_icon_enable',
			array(
				'settings'        => 'header_social_icon_enable',
				'section'         => 'organic_farm_urls',
				'label'           => __( 'Check to show social fields', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'header_social_icon_enable', array(
		'selector' => '.links a i',
		'render_callback' => 'organic_farm_customize_partial_header_social_icon_enable',
	) );

	$wp_customize->add_setting( 'organic_farm_theme_twitter_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_theme_twitter_heading', array(
		'label'       => esc_html__( 'Twitter Settings', 'organic-farm' ),
		'section'     => 'organic_farm_urls',
		'settings'    => 'organic_farm_theme_twitter_heading',
	) ) );

    $wp_customize->add_setting('organic_farm_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Organic_Farm_Fontawesome_Icon_Chooser(
        $wp_customize,'organic_farm_twitter_icon',array(
		'label'	=> __('Add Icon','organic-farm'),
		'transport' => 'refresh',
		'section'	=> 'organic_farm_urls',
		'setting'	=> 'organic_farm_twitter_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('organic_farm_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('organic_farm_twitter',array(
		'label' => esc_html__('Add URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_twitter',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'organic_farm_header_twt_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_header_twt_target',
			array(
				'settings'        => 'organic_farm_header_twt_target',
				'section'         => 'organic_farm_urls',
				'label'           => __( 'Open link in a new tab', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'organic_farm_theme_fb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_theme_fb_heading', array(
		'label'       => esc_html__( 'Facebook Settings', 'organic-farm' ),
		'section'     => 'organic_farm_urls',
		'settings'    => 'organic_farm_theme_fb_heading',
	) ) );

	$wp_customize->add_setting('organic_farm_fb_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Organic_Farm_Fontawesome_Icon_Chooser(
        $wp_customize,'organic_farm_fb_icon',array(
		'label'	=> __('Add Icon','organic-farm'),
		'transport' => 'refresh',
		'section'	=> 'organic_farm_urls',
		'setting'	=> 'organic_farm_fb_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('organic_farm_fb',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('organic_farm_fb',array(
		'label' => esc_html__('Add URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_fb',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'organic_farm_header_fb_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_header_fb_target',
			array(
				'settings'        => 'organic_farm_header_fb_target',
				'section'         => 'organic_farm_urls',
				'label'           => __( 'Open link in a new tab', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'organic_farm_theme_youtube_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_theme_youtube_heading', array(
		'label'       => esc_html__( 'Youtube Settings', 'organic-farm' ),
		'section'     => 'organic_farm_urls',
		'settings'    => 'organic_farm_theme_youtube_heading',
	) ) );

	$wp_customize->add_setting('organic_farm_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Organic_Farm_Fontawesome_Icon_Chooser(
        $wp_customize,'organic_farm_youtube_icon',array(
		'label'	=> __('Add Icon','organic-farm'),
		'transport' => 'refresh',
		'section'	=> 'organic_farm_urls',
		'setting'	=> 'organic_farm_youtube_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('organic_farm_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('organic_farm_youtube',array(
		'label' => esc_html__('Add URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_youtube',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'organic_farm_header_youtube_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_header_youtube_target',
			array(
				'settings'        => 'organic_farm_header_youtube_target',
				'section'         => 'organic_farm_urls',
				'label'           => __( 'Open link in a new tab', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'organic_farm_theme_instagram_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_theme_instagram_heading', array(
		'label'       => esc_html__( 'Instagram Settings', 'organic-farm' ),
		'section'     => 'organic_farm_urls',
		'settings'    => 'organic_farm_theme_instagram_heading',
	) ) );

	$wp_customize->add_setting('organic_farm_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Organic_Farm_Fontawesome_Icon_Chooser(
        $wp_customize,'organic_farm_instagram_icon',array(
		'label'	=> __('Add Icon','organic-farm'),
		'transport' => 'refresh',
		'section'	=> 'organic_farm_urls',
		'setting'	=> 'organic_farm_instagram_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('organic_farm_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('organic_farm_instagram',array(
		'label' => esc_html__('Add URL','organic-farm'),
		'section' => 'organic_farm_urls',
		'setting' => 'organic_farm_instagram',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'organic_farm_header_instagram_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_header_instagram_target',
			array(
				'settings'        => 'organic_farm_header_instagram_target',
				'section'         => 'organic_farm_urls',
				'label'           => __( 'Open link in a new tab', 'organic-farm' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'organic_farm_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'organic-farm' ),
    	'priority'   => 2,
	) );

	$wp_customize->add_setting( 'organic_farm_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'organic-farm' ),
		'description' => __( 'Slider Image Dimension ( 1400 x 650 ) px', 'organic-farm' ),
		'section'     => 'organic_farm_slider_section',
		'settings'    => 'organic_farm_section_slide_heading',
		'priority'    => 1,
	) ) );

	$wp_customize->add_setting(
		'organic_farm_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_slider_arrows',
			array(
				'settings'        => 'organic_farm_slider_arrows',
				'section'         => 'organic_farm_slider_section',
				'label'           => __( 'Check To show Slider', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
				'priority'    => 1,
			)
		)
	);

	$organic_farm_args = array('numberposts' => -1);
	$post_list = get_posts($organic_farm_args);
	$i = 0;
	$pst_sls[]= __('Select','organic-farm');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('organic_farm_post_setting'.$i,array(
			'sanitize_callback' => 'organic_farm_sanitize_choices',
		));
		$wp_customize->add_control('organic_farm_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','organic-farm'),
			'section' => 'organic_farm_slider_section',
			'priority'    => 1,
			'active_callback' => 'organic_farm_slider_dropdown',
		));

		$wp_customize->selective_refresh->add_partial( 'organic_farm_post_setting'.$i, array(
			'selector' => '.carousel-caption',
			'render_callback' => 'organic_farm_customize_partial_organic_farm_post_setting'.$i,
		) );
	}

	wp_reset_postdata();

	$wp_customize->add_setting('organic_farm_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'organic_farm_sanitize_choices'
	));
	$wp_customize->add_control('organic_farm_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','organic-farm'),
        'section' => 'organic_farm_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','organic-farm'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','organic-farm'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','organic-farm'),
        ),
        'active_callback' => 'organic_farm_slider_dropdown',
	) );


	
	//Middle Section
	$wp_customize->add_section( 'organic_farm_middle_section' , array(
    	'title'      => __( 'Services Settings', 'organic-farm' ),
    	
		'priority'   => 2,
	) );
	$wp_customize->add_setting( 'organic_farm_section_middle_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_middle_heading', array(
		'label'       => esc_html__( 'Services Settings', 'organic-farm' ),
		'description' => __( 'Image Dimension ( 80 x 80 ) px', 'organic-farm' ),
		'section'     => 'organic_farm_middle_section',
		'settings'    => 'organic_farm_section_middle_heading',
	) ) );

	$wp_customize->add_setting(
		'organic_farm_services_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_services_show_hide',
			array(
				'settings'        => 'organic_farm_services_show_hide',
				'section'         => 'organic_farm_middle_section',
				'label'           => __( 'Check To show Section', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$organic_farm_args = array('numberposts' => -1);
	$post_list = get_posts($organic_farm_args);
	$s = 0;
	$pst_sls[]= __('Select','organic-farm');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 3; $s++ ) {
		$wp_customize->add_setting('organic_farm_middle_sec_settigs'.$s,array(
			'sanitize_callback' => 'organic_farm_sanitize_choices',
		));
		$wp_customize->add_control('organic_farm_middle_sec_settigs'.$s,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','organic-farm'),
			'section' => 'organic_farm_middle_section',
			'active_callback' => 'organic_farm_services_dropdown', 
		));

		$wp_customize->selective_refresh->add_partial( 'organic_farm_middle_sec_settigs'.$s, array(
			'selector' => '.inner-box',
			'render_callback' => 'organic_farm_customize_partial_organic_farm_middle_sec_settigs'.$s,
		) );
	}
	wp_reset_postdata();

	// Product Box

	$wp_customize->add_section( 'organic_farm_product_box_section' , array(
    	'title'      => __( 'Product Settings', 'organic-farm' ),
		'priority'   => 2,
	) );
		$wp_customize->add_setting( 'organic_farm_section_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_product_heading', array(
		'label'       => esc_html__( 'Product Settings', 'organic-farm' ),
		'description' => __( 'Add New Page >> Add Title >> Add Shortcode "" >> Then Select the page in the below page dropdown.', 'organic-farm' ),
		'section'     => 'organic_farm_product_box_section',
		'settings'    => 'organic_farm_section_product_heading',
	) ) );

	$wp_customize->add_setting(
		'organic_farm_services_product_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_services_product_hide',
			array(
				'settings'        => 'organic_farm_services_product_hide',
				'section'         => 'organic_farm_product_box_section',
				'label'           => __( 'Check To show Section', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'organic_farm_product_box_page', array(
		'default'  => '',
		'sanitize_callback' => 'organic_farm_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'organic_farm_product_box_page', array(
		'label'    => esc_html__( 'Select Product Page', 'organic-farm' ),
		'section'  => 'organic_farm_product_box_section',
		'type'     => 'dropdown-pages',
		'active_callback' => 'organic_farm_services_product_dropdown',
	) );

	$wp_customize->selective_refresh->add_partial( 'organic_farm_product_box_page', array(
		'selector' => '#product-box h3',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_product_box_page',
	) );

	//Footer
    $wp_customize->add_section( 'organic_farm_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'organic-farm' ),
	) );

	$wp_customize->add_setting( 'organic_farm_section_footer_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Organic_Farm_Customizer_Customcontrol_Section_Heading( $wp_customize, 'organic_farm_section_footer_heading', array(
			'label'       => esc_html__( 'Footer Settings', 'organic-farm' ),
			'section'     => 'organic_farm_footer_copyright',
			'settings'    => 'organic_farm_section_footer_heading',
		) ) );


    $wp_customize->add_setting('organic_farm_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('organic_farm_footer_text',array(
		'label'	=> esc_html__('Copyright Text','organic-farm'),
		'section'	=> 'organic_farm_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'organic_farm_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'organic_farm_customize_partial_organic_farm_footer_text',
	) );

	$wp_customize->add_setting('organic_farm_footer_widget',array(
	'default' => '4',
	'sanitize_callback' => 'organic_farm_sanitize_select'
));
$wp_customize->add_control('organic_farm_footer_widget',array(
	'label' => esc_html__('Footer Per Column','organic-farm'),
	'section' => 'organic_farm_footer_copyright',
	'setting' => 'organic_farm_footer_widget',
	'type' => 'radio',
			'choices' => array(
					'1'   => __('1 Column', 'organic-farm'),
					'2'  => __('2 Column', 'organic-farm'),
					'3' => __('3 Column', 'organic-farm'),
					'4' => __('4 Column', 'organic-farm')
			),
));

	$wp_customize->add_setting('organic_farm_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'organic_farm_sanitize_integer'
	));
	$wp_customize->add_control(new Organic_Farm_Slider_Custom_Control( $wp_customize, 'organic_farm_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','organic-farm'),
		'section'=> 'title_tagline',
		'settings'=>'organic_farm_logo_max_height',
		'input_attrs' => array(
			'reset'            => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
	)));

	$wp_customize->add_setting('organic_farm_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_logo_title',
			array(
				'settings'        => 'organic_farm_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('organic_farm_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'organic_farm_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Organic_Farm_Customizer_Customcontrol_Switch(
			$wp_customize,
			'organic_farm_logo_text',
			array(
				'settings'        => 'organic_farm_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'organic-farm' ),
				'choices'		  => array(
					'1'      => __( 'On', 'organic-farm' ),
					'off'    => __( 'Off', 'organic-farm' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'organic_farm_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'organic_farm_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'organic_farm_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'organic_farm_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'organic-farm' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'organic-farm' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'organic_farm_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'organic_farm_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'organic_farm_customize_register' );

function organic_farm_customize_partial_blogname() {
	bloginfo( 'name' );
}
function organic_farm_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function organic_farm_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function organic_farm_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('ORGANIC_FARM_PRO_LINK',__('https://www.ovationthemes.com/wordpress/organic-farm-wordpress-theme/','organic-farm'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Organic_Farm_Pro_Control')):
    class Organic_Farm_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( ORGANIC_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ORGANIC FARM PREMIUM','organic-farm');?> </a>
	        </div>
            <div class="col-md">
                <img class="organic_farm_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('ORGANIC FARM PREMIUM - Features', 'organic-farm'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'organic-farm');?> </li>
                    <li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'organic-farm');?> </li>
                   	<li class="upsell-organic_farm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'organic-farm');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( ORGANIC_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ORGANIC FARM PREMIUM','organic-farm');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'organic-farm'), '<a target="blank" href="https://wordpress.org/support/theme/organic-farm/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */

final class organic_farm_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}


/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );
	}

// icons
/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	 public function enqueue_control_scripts() {

		wp_enqueue_style('organic-farm-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css');

		wp_localize_script(
		'organic-farm-customize-controls',
		'organic_farm_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}


}
