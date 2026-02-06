<?php
function storex_slider_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'storex' ),
			'panel' => 'storex_frontpage_sections',
			'priority' => 2,
		)
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
		'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Slider','storex'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
	$wp_customize->add_setting( 'slider', 
		array(
			'sanitize_callback' => 'burger_companion_repeater_sanitize',
			'priority' => 5,
			'default' => storex_get_slider_default()
		)
	);

	$wp_customize->add_control( 
		new Burger_Companion_Repeater( $wp_customize, 
			'slider', 
			array(
				'label'   => esc_html__('Slide','storex'),
				'section' => 'slider_setting',
				'add_field_label'                   => esc_html__( 'Add New Slider', 'storex' ),
				'item_name'                         => esc_html__( 'Slider', 'storex' ),

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
	class StoreX_slider_section_upgrade extends WP_Customize_Control {
		public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'StoreX' == $theme->name){
				?>
				<a class="customizer_StoreX_slider_upgrade_section up-to-pro" href="https://burgerthemes.com/storex-pro/" target="_blank" style="display: none;"><?php _e('More Slides Available in StoreX Pro','storex'); ?></a>
				<?php
			}
		}
	}
	$wp_customize->add_setting( 'storex_slider_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new StoreX_slider_section_upgrade(
			$wp_customize,
			'storex_slider_upgrade_to_pro',
			array(
				'section'				=> 'slider_setting',
			)
		)
	);
}
add_action( 'customize_register', 'storex_slider_setting' );