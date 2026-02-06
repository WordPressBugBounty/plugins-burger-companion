<?php
function storex_product_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
   	Product Section
   	=========================================*/
   	$wp_customize->add_section(
   		'product_setting', array(
   			'title' => esc_html__( 'Product Section', 'storex' ),
   			'priority' => 18,
   			'panel' => 'storex_frontpage_sections',
   		)
   	);

	// Setting Head
   	$wp_customize->add_setting(
   		'product_setting_head'
   		,array(
   			'capability'     	=> 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_text',
   			'priority' => 1,
   		)
   	);

   	$wp_customize->add_control(
   		'product_setting_head',
   		array(
   			'type' => 'hidden',
   			'label' => __('Settings','storex'),
   			'section' => 'product_setting',
   		)
   	);

	// hide/show
   	$wp_customize->add_setting( 
   		'hs_product_section', 
   		array(
   			'default' => '1',
   			'capability'    => 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_checkbox',
   			'priority' => 2,
   		) 
   	);

   	$wp_customize->add_control(
   		'hs_product_section', 
   		array(
   			'label'	      => esc_html__( 'Hide/Show', 'storex' ),
   			'section'     => 'product_setting',
   			'type'        => 'checkbox',
   		) 
   	);
    // Product Header Section // 
   	$wp_customize->add_setting(
   		'product_headings'
   		,array(
   			'capability'     	=> 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_text',
   			'priority' => 3,
   		)
   	);

   	$wp_customize->add_control(
   		'product_headings',
   		array(
   			'type' => 'hidden',
   			'label' => __('Header','storex'),
   			'section' => 'product_setting',
   		)
   	);

	// Product Title // 
   	$wp_customize->add_setting(
   		'product_title',
   		array(
   			'default'			=> __('Trending Product','storex'),
   			'capability'     	=> 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_html',
   			'transport'         => $selective_refresh,
   			'priority' => 4,
   		)
   	);	

   	$wp_customize->add_control( 
   		'product_title',
   		array(
   			'label'   => __('Title','storex'),
   			'section' => 'product_setting',
   			'type'   => 'text',
   		)  
   	);
	// Product content Section // 
   	$wp_customize->add_setting(
   		'product_content_head'
   		,array(
   			'capability'     	=> 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_text',
   			'priority' => 5,
   		)
   	);

   	$wp_customize->add_control(
   		'product_content_head',
   		array(
   			'type' => 'hidden',
   			'label' => __('Content','storex'),
   			'section' => 'product_setting',
   		)
   	);

   	// Category
	if(class_exists( 'woocommerce' )): 
		$wp_customize->add_setting(
		'product_cat_id',
			array(
			'capability' => 'edit_theme_options',
			'priority' => 6,
			)
		);	
		$wp_customize->add_control( new Burger_Companion_Product_Cat_Control( $wp_customize, 
		'product_cat_id', 
			array(
			'label'   => __('Select category','storex'),
			'section' => 'product_setting',
			) 
		) );
	endif;

	// product_display_num
	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'product_display_num',
			array(
				'default' => '20',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'storex_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Burger_Customizer_Range_Control( $wp_customize, 'product_display_num', 
			array(
				'label'      => __( 'No of Product Display', 'storex' ),
				'section'  => 'product_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop'   => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 20,
						),
					),
			) ) 
		);
	}
   }
   add_action( 'customize_register', 'storex_product_setting' );