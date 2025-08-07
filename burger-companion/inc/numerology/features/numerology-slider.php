<?php
function numerology_slider_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'numerology' ),
			'panel' => 'astrocare_frontpage_sections',
			'priority' => 1
		)
	);
	// Slider Settings Section // 
	$wp_customize->add_setting(
		'slider_setting_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 1
		)
	);
	$wp_customize->add_control(
		'slider_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Settings','numerology'),
			'section' => 'slider_setting'
		)
	);
	// hide/show section
	$wp_customize->add_setting( 
		'hs_slider', 
		array(
			'default'   => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'priority' => 1
		) 
	);
	$wp_customize->add_control(
		'hs_slider', 
		array(
			'label'	      => esc_html__( 'Hide/Show Section', 'numerology' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);
	// Wheel hide/show
	$wp_customize->add_setting( 
		'hs_slider_wheel', 
		array(
			'default' => '1',
			'capability'   => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'priority' => 4
		) 
	);
	$wp_customize->add_control(
		'hs_slider_wheel', 
		array(
			'label'	      => esc_html__( 'Wheel Hide/Show', 'numerology' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);
	// cloud effect hide/show
	$wp_customize->add_setting( 
		'hs_slider_cloud', 
		array(
			'default' => '1',
			'capability'   => 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_checkbox',
			'priority' => 5
		) 
	);
	$wp_customize->add_control(
		'hs_slider_cloud', 
		array(
			'label'	      => esc_html__( 'Cloud Effect Hide/Show', 'numerology' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
		,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'astrocare_sanitize_text',
			'priority' => 2,
		)
	);
	$wp_customize->add_control(
		'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','numerology'),
			'section' => 'slider_setting',
		)
	);
	/**
	 * Customizer Repeater for add slides
	 */
	$wp_customize->add_setting( 'slider02', 
		array(
			'sanitize_callback' => 'burger_companion_repeater_sanitize',
			'priority' => 1,
			'default' => astrocare_get_slider02_default()
		)
	);

	$wp_customize->add_control( 
		new Burger_Companion_Repeater( $wp_customize, 
			'slider02', 
			array(
				'label'   => esc_html__('Slide','numerology'),
				'section' => 'slider_setting',
				'add_field_label'                   => esc_html__( 'Add New Slider', 'numerology' ),
				'item_name'                         => esc_html__( 'Slider', 'numerology' ),

				'customizer_repeater_icon_control'     => false,
				'customizer_repeater_title_control'    => true,
				'customizer_repeater_subtitle_control' => true,
				'customizer_repeater_text_control'     => true,
				'customizer_repeater_text2_control'    => true,
				'customizer_repeater_link_control'     => true,
				'customizer_repeater_image_control'    => true,
				'customizer_repeater_image2_control'   => true,	
			) 
		) 
	);
     //Pro feature
	class Numerology_slider_section_upgrade extends WP_Customize_Control {
		public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'Numerology' == $theme->name){	
					?>
					<a class="customizer_Numerology_slider_upgrade_section up-to-pro" href="<?php echo esc_url("https://burgerthemes.com/numerology-pro/"); ?>" target="_blank" style="display: none;"><?php _e('More Slides Available in Numerology Pro','numerology'); ?></a>
					<?php
				} }
			}
			$wp_customize->add_setting( 'numerology_slider_upgrade_to_pro', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
				'priority' => 5,
			));
			$wp_customize->add_control(
				new Numerology_slider_section_upgrade(
					$wp_customize,
					'numerology_slider_upgrade_to_pro',
					array(
						'section'	=> 'slider_setting',
					)
				)
			);
		}
		add_action( 'customize_register', 'numerology_slider_setting' );