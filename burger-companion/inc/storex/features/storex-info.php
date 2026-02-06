<?php
function storex_info_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
   	Info Section
   	=========================================*/
   	$wp_customize->add_section(
   		'info_setting', array(
   			'title' => esc_html__( 'Info Section', 'storex' ),
   			'priority' => 17,
   			'panel' => 'storex_frontpage_sections',
   		)
   	);

	// Setting Head
   	$wp_customize->add_setting(
   		'info_setting_head'
   		,array(
   			'capability'     	=> 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_text',
   			'priority' => 1,
   		)
   	);
   	$wp_customize->add_control(
   		'info_setting_head',
   		array(
   			'type' => 'hidden',
   			'label' => __('Settings','storex'),
   			'section' => 'info_setting',
   		)
   	);

	// hide/show
   	$wp_customize->add_setting( 
   		'hs_info_section' , 
   		array(
   			'default' => '1',
   			'capability'    => 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_checkbox',
   			'priority' => 2,
   		) 
   	);

   	$wp_customize->add_control(
   		'hs_info_section', 
   		array(
   			'label'	      => esc_html__( 'Hide/Show', 'storex' ),
   			'section'     => 'info_setting',
   			'type'        => 'checkbox',
   		) 
   	);

     // Info Contents
   	$wp_customize->add_setting(
   		'info_content_head'
   		,array(
   			'capability'     	=> 'edit_theme_options',
   			'sanitize_callback' => 'storex_sanitize_text',
   			'priority' => 3,
   		)
   	);

   	$wp_customize->add_control(
   		'info_content_head',
   		array(
   			'type' => 'hidden',
   			'label' => __('Info','storex'),
   			'section' => 'info_setting',
   		)
   	);

	/**
	 * Customizer Repeater for add Info
	 */
	$wp_customize->add_setting( 'info_sec', 
		array(
			'sanitize_callback' => 'burger_companion_repeater_sanitize',
			'priority' => 4,
			'default' => storex_get_info_default()
		)
	);

	$wp_customize->add_control( 
		new Burger_Companion_Repeater( $wp_customize, 
			'info_sec', 
			array(
				'label'   => esc_html__('Information','storex'),
				'section' => 'info_setting',
				'add_field_label'                   => esc_html__( 'Add New Information', 'storex' ),
				'item_name'                         => esc_html__( 'Information', 'storex' ),

				'customizer_repeater_icon_control' => false,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => true,
				'customizer_repeater_text_control' => true,
				'customizer_repeater_text2_control'=> true,
				'customizer_repeater_link_control' => true,
				'customizer_repeater_image_control' => true,	
			) 
		) 
	);

    //Pro feature
	class StoreX_info_section_upgrade extends WP_Customize_Control {
		public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'StoreX' == $theme->name){
				?>
				<a class="customizer_StoreX_info_upgrade_section up-to-pro" href="https://burgerthemes.com/storex-pro/" target="_blank" style="display: none;"><?php _e('More Info Available in StoreX Pro','storex'); ?></a>
				<?php
			}
		}
	}
	$wp_customize->add_setting( 'storex_info_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new StoreX_info_section_upgrade(
			$wp_customize,
			'storex_info_upgrade_to_pro',
			array(
				'section'				=> 'info_setting',
			)
		)
	);
}
add_action( 'customize_register', 'storex_info_setting' );