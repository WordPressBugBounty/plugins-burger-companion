<?php
function storex_top_categories_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
   	Top Categories Section
   	=========================================*/
   	$wp_customize->add_section(
   		'top_categories_setting', array(
   			'title' => esc_html__( 'Top Categories Section', 'storex' ),
   			'priority' => 1,
   			'panel' => 'storex_frontpage_sections',
   		)
   	);

	// Setting Head
   	$wp_customize->add_setting(
   		'top_categories_setting_head'
   		,array(
   			'capability'     	=> 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_text',
   			'priority' => 1,
   		)
   	);

   	$wp_customize->add_control(
   		'top_categories_setting_head',
   		array(
   			'type' => 'hidden',
   			'label' => __('Settings','storex'),
   			'section' => 'top_categories_setting',
   		)
   	);

	// hide/show
   	$wp_customize->add_setting( 
   		'hs_top_categories' , 
   		array(
   			'default' => '1',
   			'capability'     => 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_checkbox',
   			'priority' => 2,
   		) 
   	);

   	$wp_customize->add_control(
   		'hs_top_categories', 
   		array(
   			'label'	      => esc_html__( 'Hide/Show', 'storex' ),
   			'section'     => 'top_categories_setting',
   			'type'        => 'checkbox',
   		) 
   	);	

	/*=========================================
	Content Head
	=========================================*/
	$wp_customize->add_setting(
		'top_categories_content_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
		'top_categories_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Top Categories','storex'),
			'section' => 'top_categories_setting',
		)
	);
	// Category
	if(class_exists( 'woocommerce' )): 
		$wp_customize->add_setting(
			'top_categories_id',
			array(
				'capability' => 'edit_theme_options',
				'priority' => 2,
			)
		);	
		$wp_customize->add_control( new Burger_Companion_Product_Cat_Control( $wp_customize, 
			'top_categories_id', 
			array(
				'label'   => __('Select category','storex'),
				'section' => 'top_categories_setting',
			) 
		) );
	endif;	

}
add_action( 'customize_register', 'storex_top_categories_setting' );