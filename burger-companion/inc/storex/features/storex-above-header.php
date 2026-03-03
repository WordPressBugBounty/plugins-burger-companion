<?php
function storex_abv_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'storex_header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'storex'),
		) 
	);

	// Logo Width // 
	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'storex_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Burger_Customizer_Range_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'storex' ),
				'section'  => 'title_tagline',
				  'input_attrs' => array(
					'min'    => 1,
					'max'    => 500,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
	}
	
	/*=========================================
	Above Header Section
	=========================================*/	
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','storex'),
			'panel'  		=> 'storex_header_section',
		)
    );

	// Header support Info Section
	$wp_customize->add_setting(
		'abv_hdr_support_info_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'abv_hdr_support_info_head',
		array(
			'type' => 'hidden',
			'label' => __('Support Info','storex'),
			'section' => 'above_header',
			'priority'  => 2,
		)
	);	
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_support_info' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_support_info', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storex' ),
			'section'     => 'above_header',
			'type'        => 'checkbox',
			'priority' => 2,
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'abv_hdr_support_info_icon',
    	array(
	        'default' => 'fa-headphones',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new StoreX_Icon_Picker_Control($wp_customize, 
		'abv_hdr_support_info_icon',
		array(
		    'label'   		=> __('Icon','storex'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			'priority'  => 3,
			
		))  
	);		
	
	// above header Info title // 
	$wp_customize->add_setting(
    	'abv_hdr_support_info_ttl',
    	array(
			'default' => __('Call out Hotline 24/7','storex'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_support_info_ttl',
		array(
		    'label'   		=> __('Title','storex'),
		    'section'		=> 'above_header',
			'type' 			=> 'text',
			'priority'      => 3,
		)  
	);	
	// above header Info title // 
	$wp_customize->add_setting(
    	'abv_hdr_support_info_subttl',
    	array(
			'default' => __('91 8578 790','storex'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_support_info_subttl',
		array(
		    'label'   		=> __('Sub Title','storex'),
		    'section'		=> 'above_header',
			'type' 			=> 'text',
			'priority'      => 4,
		)  
	);
}
add_action( 'customize_register', 'storex_abv_header_settings' );