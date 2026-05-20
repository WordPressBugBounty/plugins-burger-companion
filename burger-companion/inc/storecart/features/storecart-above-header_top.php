<?php
function storecart_above_header_top_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Setting Head
	$wp_customize->add_setting(
		'above_header_top_setting_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
		'above_header_top_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Above Header Top','storecart'),
			'section' => 'above_header',
		)
	);

	// hide/show
	$wp_customize->add_setting( 
		'hs_above_header_top' , 
		array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	$wp_customize->add_control(
		'hs_above_header_top', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storecart' ),
			'section'     => 'above_header',
			'type'        => 'checkbox',
		) 
	);	


	 // Above Header Top header_contact
	$wp_customize->add_setting(
		'above_header_top_content_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
		'above_header_top_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Header Contact','storecart'),
			'section' => 'above_header',
		)
	);

   	/**
	 * Customizer Repeater for add Above Header Top Content
	 */
   	$wp_customize->add_setting( 'above_header_top_content', 
   		array(
   			'sanitize_callback' => 'burger_companion_repeater_sanitize',
   			'priority' => 4,
   			'default' => storecart_get_ab_hea_top_cont_default()
   		)
   	);

   	$wp_customize->add_control( 
   		new Burger_Companion_Repeater( $wp_customize, 
   			'above_header_top_content', 
   			array(
   				'label'   => esc_html__('Content_top','storecart'),
   				'section' => 'above_header',
   				'add_field_label'                   => esc_html__( 'Add New Content_top', 'storecart' ),
   				'item_name'                         => esc_html__( 'Content_top', 'storecart' ),

   				'customizer_repeater_icon_control' => true,
   				'customizer_repeater_title_control' => true
   			) 
   		) 
   	);

    //Pro feature
   	class StoreCart_ab_hea_top_section_upgrade extends WP_Customize_Control {
   		public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'StoreCart' == $theme->name){
				?>
				<a class="customizer_StoreCart_ab_hea_top_upgrade_section up-to-pro" href="https://burgerthemes.com/storecart-pro/" target="_blank" style="display: none;"><?php _e('More header Top Content Available in StoreCart Pro','storecart'); ?></a>
				<?php
			}
		}
	}
	$wp_customize->add_setting( 'storex_ab_hea_top_upgrade_to_pro', array(
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		'priority' => 5,
	));
	$wp_customize->add_control(
		new StoreCart_ab_hea_top_section_upgrade(
			$wp_customize,
			'storex_ab_hea_top_upgrade_to_pro',
			array(
				'section'				=> 'above_header',
			)
		)
	);

	// Top Bar Offer // 
	$wp_customize->add_setting(
		'Top_bar_offer_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
		'Top_bar_offer_head',
		array(
			'type' => 'hidden',
			'label' => __('Top Bar Offer','storecart'),
			'section' => 'above_header',
		)
	);

	// Top Bar Offer Title // 
	$wp_customize->add_setting(
		'top_bar_offer_title',
		array(
			'default' => __(
				'<img draggable="false" role="img" class="emoji" alt="✌🏼" src="https://s.w.org/images/core/emoji/17.0.2/svg/270c-1f3fc.svg"> Transform Your Dining Space — Save Up to 60% Today',
				'storecart'
			),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'refresh',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'top_bar_offer_title',
		array(
			'label'   => __('Title','storecart'),
			'section' => 'above_header',
			'type'    => 'textarea',
		)  
	);


	// Header Social
	$wp_customize->add_setting(
		'abv_hdr_social_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_text',
			'priority'          => 6,
		)
	);

	$wp_customize->add_control(
	'abv_hdr_social_head',
		array(
			'type' => 'hidden',
			'label' => __('Social Icon','storecart'),
			'section' => 'above_header'
		)
	);

	$wp_customize->add_setting( 
		'hs_hdr_social_icon' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'storex_sanitize_checkbox',
			'priority'          => 7,
		) 
	);
	
	$wp_customize->add_control(
	'hs_hdr_social_icon', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'storecart' ),
			'section'     => 'above_header',
			'type'        => 'checkbox',
		) 
	);
	

	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_hdr_icons', 
			array(
			 'sanitize_callback' => 'burger_companion_repeater_sanitize',
			 'default' => storecart_get_hdr_social_icon_default(),
			 'priority'          => 8
		)
		);
		
		$wp_customize->add_control( 
			new Burger_Companion_Repeater( $wp_customize, 
				'social_hdr_icons', 
					array(
						'label'   => esc_html__('Social Icons','storecart'),
						'add_field_label'                   => esc_html__( 'Add New Social', 'storecart' ),
						'item_name'                         => esc_html__( 'Social', 'storecart' ),
						'section' => 'above_header',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);	
			
	//Pro feature
		class StoreCart_hdr_social_section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'StoreCart' == $theme->name){
				?>
				<a class="customizer_StoreCart_social_upgrade_section up-to-pro" href="https://burgerthemes.com/storecart-pro/" target="_blank" style="display: none;"><?php _e('More header Top Content Available in StoreCart Pro','storecart'); ?></a>
				<?php
			}
		}
		}
		$wp_customize->add_setting( 'storecart_hdr_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			 'priority'          => 9
		));
		$wp_customize->add_control(
			new StoreCart_hdr_social_section_upgrade(
			$wp_customize,
			'storecart_hdr_social_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
				)
			)
		);
}
add_action( 'customize_register', 'storecart_above_header_top_setting' );