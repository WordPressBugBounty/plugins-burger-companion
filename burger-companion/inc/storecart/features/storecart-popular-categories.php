<?php
function storecart_popular_categories_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
   	Popular Categories Section
	=========================================*/
	$wp_customize->add_section(
		'popular_categories_setting', array(
			'title' => esc_html__( 'Popular Categories Section', 'storecart' ),
			'priority' => 1,
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
			'label' => __('Settings','storecart'),
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
			'label'	      => esc_html__( 'Hide/Show', 'storecart' ),
			'section'     => 'popular_categories_setting',
			'type'        => 'checkbox',
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
			'label' => __('Popular Categories','storecart'),
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
			'label'   => __('Select category','storecart'),
			'section' => 'popular_categories_setting',
			) 
		) );
	endif;	
}
add_action( 'customize_register', 'storecart_popular_categories_setting' );