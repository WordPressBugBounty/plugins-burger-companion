<?php
function storex_bottom_footer_settings( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

// Footer Card
	$wp_customize->add_setting(
		'footer_card_item'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'footer_card_item',
		array(
			'type' => 'hidden',
			'label' => __('Footer Card','storex'),
			'section' => 'storex_footer_bottom',
			'priority' => 5,
		)
	);
    // hide/show
	$wp_customize->add_setting( 
		'hide_show_footer_card' , 
		array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
		'hide_show_footer_card', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storex' ),
			'section'     => 'storex_footer_bottom',
			'type'        => 'checkbox',
			'priority'      => 6,
		) 
	);

	/**
	 * Customizer Repeater for add Footer Card
	 */
	$wp_customize->add_setting( 'footer_card_content', 
		array(
			'sanitize_callback' => 'burger_companion_repeater_sanitize',
			'default' => storex_get_footer_card_default()
		)
	);
	$wp_customize->add_control( 
		new Burger_Companion_Repeater( $wp_customize, 
			'footer_card_content', 
			array(
				'label'   => esc_html__('FooterCard','storex'),
				'section' => 'storex_footer_bottom',
				'priority' => 7,
				'add_field_label'                   => esc_html__( 'Add New FooterCard', 'storex' ),
				'item_name'                         => esc_html__( 'FooterCard', 'storex' ),

				'customizer_repeater_image_control' => true,
				'customizer_repeater_link_control' => true
			) 
		) 
	);

	 //Pro feature
	class StoreX_card_section_upgrade extends WP_Customize_Control {
		public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'StoreX' == $theme->name){
				?>
				<a class="customizer_StoreX_FooterCard_upgrade_section up-to-pro" href="https://burgerthemes.com/storex-pro/" target="_blank" style="display: none;"><?php _e('More Card Available in StoreX Pro','storex'); ?></a>
				<?php
			}
		}
	}
	$wp_customize->add_setting( 'storex_card_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new StoreX_card_section_upgrade(
			$wp_customize,
			'storex_card_upgrade_to_pro',
			array(
				'section'				=> 'storex_footer_bottom',
				'priority' => 7
			)
		)
	);
}
add_action( 'customize_register', 'storex_bottom_footer_settings' );