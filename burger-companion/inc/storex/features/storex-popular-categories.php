<?php
function storex_popular_categories_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
   	Popular Categories Section
	=========================================*/
	$wp_customize->add_section(
		'popular_categories_setting', array(
			'title' => esc_html__( 'Popular Categories Section', 'storex' ),
			'priority' => 16,
			'panel' => 'storex_frontpage_sections',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'popular_categories_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'popular_categories_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Settings','storex'),
			'section' => 'Popular_categories_setting',
		)
	);
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_popular_categories' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_popular_categories', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storex' ),
			'section'     => 'popular_categories_setting',
			'type'        => 'checkbox',
		) 
	);	
	
	// 	Popular Categories content Section // 
	$wp_customize->add_setting(
		'popular_categories_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'popular_categories_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','storex'),
			'section' => 'popular_categories_setting',
		)
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'popular_categories_title',
    	array(
	        'default'			=> __('Popular Categories','storex'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'popular_categories_title',
		array(
		    'label'   => __('Title','storex'),
		    'section' => 'popular_categories_setting',
			'type'    => 'text',
		)  
	);

	 // View All Category // 
	$wp_customize->add_setting(
		'view_all_category_label',
		array(
			'default'			=> 'View All Category',
			'sanitize_callback' => 'storex_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'view_all_category_label',
		array(
			'label'   		=> __('Label','storex'),
			'section' 		=> 'popular_categories_setting',
			'type'		    =>	'text',
		)  
	);

	// View All Category Link // 
	$wp_customize->add_setting(
		'view_all_category_url',
		array(
			'default'			=> '',
			'sanitize_callback' => 'storex_sanitize_url',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 9,
		)
	);	
	$wp_customize->add_control( 
		'view_all_category_url',
		array(
			'label'   		=> __('Link','storex'),
			'section' 		=> 'popular_categories_setting',
			'type'		    =>	'text'
		)  
	);

	/*=========================================
	Content Head
	=========================================*/
	$wp_customize->add_setting(
		'product_cat02_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'product_cat02_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Popular Categories','storex'),
			'section' => 'popular_categories_setting',
		)
	);
	
	// Category
	if(class_exists( 'woocommerce' )): 
		$wp_customize->add_setting(
		'product_cat02_id',
			array(
			'capability' => 'edit_theme_options',
			'priority' => 2,
			)
		);	
		$wp_customize->add_control( new Burger_Companion_Product_Cat_Control( $wp_customize, 
		'product_cat02_id', 
			array(
			'label'   => __('Select category','storex'),
			'section' => 'popular_categories_setting',
			) 
		) );
	endif;	
}
add_action( 'customize_register', 'storex_popular_categories_setting' );