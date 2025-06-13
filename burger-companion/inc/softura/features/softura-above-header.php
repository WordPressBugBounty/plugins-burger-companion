<?php
function softura_abv_header_settings( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	// Logo Width // 
	if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'spintech_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
			new Burger_Customizer_Range_Control( $wp_customize, 'logo_width', 
				array(
					'label'      => __( 'Logo Width', 'softura' ),
					'section'    => 'title_tagline',
					'input_attrs'=> array(
						'min'    => 0,
						'max'    => 500,
						'step'   => 1,
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
			'title' 		=> __('Above Header','softura'),
			'panel'  		=> 'header_section'
		)
	);
    // Above Header Section
	$wp_customize->add_setting(
		'abv_header_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'spintech_sanitize_text'
		)
	);
	$wp_customize->add_control(
		'abv_header_head',
		array(
			'type'      => 'hidden',
			'label'     => __('Above Header Contents','softura'),
			'section'   => 'above_header',
			'priority'  => 2
		)
	);	
	// hide/show
	$wp_customize->add_setting( 
		'hs_abv_header', 
		array(
			'default'          => '1',
			'capability'       => 'edit_theme_options',
			'sanitize_callback'=> 'spintech_sanitize_checkbox'
		) 
	);
	$wp_customize->add_control(
		'hs_abv_header', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'softura' ),
			'section'     => 'above_header',
			'type'        => 'checkbox',
			'priority'    => 2
		) 
	);
    /**
	 * Customizer Repeater for Above Header Contents
	 */
    $wp_customize->add_setting( 'abv_header_content', 
    	array(
    		'sanitize_callback' => 'burger_companion_repeater_sanitize',
    		'priority'          => 3,
    		'default'           => spintech_get_abv_header_default()
    	)
    );
    $wp_customize->add_control( 
    	new Burger_Companion_Repeater( $wp_customize, 
    		'abv_header_content', 
    		array(
    			'label'   => esc_html__('Above Header','softura'),
    			'section' => 'above_header',
    			'add_field_label'                   => esc_html__( 'Add New Above', 'softura' ),
    			'item_name'                         => esc_html__( 'Above', 'softura' ),
    			'customizer_repeater_icon_control'  => true,
    			'customizer_repeater_title_control' => true,
    			'customizer_repeater_text_control'  => true,
    		) 
    	) 
    );
    //Pro feature
    class Softura_above_header_section_upgrade extends WP_Customize_Control {
    	public function render_content() { 
		$theme = wp_get_theme(); // gets the current theme
		if ( 'Softura' == $theme->name){
			?>	
			<a class="customizer_Softura_above_header_upgrade_section up-to-pro" href="<?php esc_url('https://burgerthemes.com/softura-pro/');?>" target="_blank" style="display: none;"><?php _e('More Above Header Items Available in Softura Pro','softura'); ?></a>
			
			<?php
		}}
	}
	$wp_customize->add_setting( 'softura_abv_header_upgrade_to_pro', array(
		'capability'	    => 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Softura_above_header_section_upgrade(
			$wp_customize,
			'softura_abv_header_upgrade_to_pro',
			array(
				'section'	=> 'above_header'
			)
		)
	);
}
add_action( 'customize_register', 'softura_abv_header_settings' );