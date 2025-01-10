<?php 
if(! function_exists('burger_companion_hotelgalaxy_above_header_customizer')){

	add_action( 'customize_register', 'burger_companion_hotelgalaxy_above_header_customizer', 999);

	function burger_companion_hotelgalaxy_above_header_customizer( $wp_customize ) {

		$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

		// Logo Width // 
		if ( class_exists( 'Burger_Customizer_Range_Control' ) ) {
			$wp_customize->add_setting(
				'logo_width',
				array(
					'default'			=> '160',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_range_value',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control( 
				new Burger_Customizer_Range_Control( $wp_customize, 'logo_width', 
					array(
						'label'      	=> __( 'Logo Width', 'hotel-galaxy' ),
						'section'  		=> 'title_tagline',						
						'input_attrs'    => array(						
							'min'           => 1,
							'max'           => 500,
							'step'          => 1,								
						),					
					) ) 
			);
		}
		
		/*=======================================================================================*/ 
		if ( ! $wp_customize->get_section( 'above_header' ) ) {

			$wp_customize->add_section('above_header',array(
				'title' => __( 'Above Header','hotel-galaxy'),
				'panel'=>'header_section',
				'capability'=>'edit_theme_options',
				'priority' => 3,			
			));
		}			

		/*=============== abover header conatct details===================*/ 

		//header  
		$wp_customize->add_setting(
			'above_header_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'above_header_head',
			array(
				'type' => 'hidden',
				'label' => __('Head','hotel-galaxy'),
				'section' => 'above_header',
				'priority'  => 1,
			)
		); 

		//section show or hide
		$wp_customize->add_setting(	's_h_header_office_details',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_header_office_details', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',
			'priority'=> 1,
			'section'    => 'above_header',			
		) );

		// header office details
		$wp_customize->add_setting( 'header_office_contents',array(
			'sanitize_callback' => 'burger_companion_repeater_sanitize',
			'priority' => 1,					
			'default' => hotel_galaxy_get_header_office_default(),
			'transport' => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',

		));

		$wp_customize->add_control( new Burger_Companion_Repeater( $wp_customize,'header_office_contents', 
			array(
				'priority' => 1,
				'label'   => esc_html__('Header Office Detail','hotel-galaxy'),
				'section' => 'above_header',
				'add_field_label' => esc_html__( 'Add New Detail', 'hotel-galaxy' ),						
				'item_name'  => esc_html__( 'Details', 'hotel-galaxy' ),
				'customizer_repeater_icon_control' => true,						
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => true,									
			) 
		));

        //Pro feature
		class Hotelgalaxy_header_office_section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'HotelPress' == $theme->name){	
				?>
				<a class="customizer_Hotelgalaxy_details_upgrade_section up-to-pro" href="<?php echo esc_url('https://burgerthemes.com/hotelpress-pro/'); ?>" target="_blank" style="display: none;"><?php _e('More Details Available in HotelPress Pro','hotel-galaxy'); ?></a>
				
			<?php }else{ ?>		

				<a class="customizer_Hotelgalaxy_details_upgrade_section up-to-pro" href="<?php echo esc_url('https://burgerthemes.com/hotel-galaxy-pro/'); ?>" target="_blank" style="display: none;"><?php _e('More Details Available in Hotel Galaxy Pro','hotel-galaxy'); ?></a>
				
				<?php
			} }
		}

		$wp_customize->add_setting( 'hotelgalaxy_office_details_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'   	=> 'wp_filter_nohtml_kses'
			
		));
		$wp_customize->add_control(
			new Hotelgalaxy_header_office_section_upgrade(
				$wp_customize,
				'hotelgalaxy_office_details_upgrade_to_pro',
				array(
					'priority' => 1,
					'section'  => 'above_header',
				)
			)
		);

		// top header details
		$wp_customize->selective_refresh->add_partial(
			'header_office_contents', array(
				'selector' => 'ul.header_contact',
				'container_inclusive' => true,
				'render_callback' => 'above_header',
				'fallback_refresh' => true,
			)
		);

		/*=============== Social media ===================*/ 

		//header  
		$wp_customize->add_setting(
			'social_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'social_head',
			array(
				'type' => 'hidden',
				'label' => __('Social Media Icons','hotel-galaxy'),
				'section' => 'above_header',
				'priority'  => 1,
			)
		); 

		// show/hide social
		$wp_customize->add_setting('s_h_social_media',array(
			'default' => true,
			'sanitize_callback' => 'hotelgalaxy_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',				
		));

		$wp_customize->add_control('s_h_social_media', array(
			'priority' => 1,
			'label'	      => esc_html__( 'Show/Hide Section', 'hotel-galaxy' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		));

		// social contents
		$wp_customize->add_setting( 'socialmedia_contents',array(
			'sanitize_callback' => 'burger_companion_repeater_sanitize',					
			'default' => hotel_galaxy_get_socialmedia_default(),
			'transport' => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		));

		$wp_customize->add_control(new Burger_Companion_Repeater( $wp_customize, 'socialmedia_contents', 
			array(
				'priority' => 1,
				'label'   => esc_html__('Social Media Icons','hotel-galaxy'),
				'section' => 'above_header',
				'add_field_label' => esc_html__( 'Add New Icons', 'hotel-galaxy' ),
				'item_name'  => esc_html__( 'Icons', 'hotel-galaxy' ),
				'customizer_repeater_icon_control' => true,						
				'customizer_repeater_link_control' => true,						
			) 
		));

        //Pro feature
		class Hotelgalaxy_social_icons_section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'HotelPress' == $theme->name){	
				?>
				<a class="customizer_Hotelgalaxy_social_icons_upgrade_section up-to-pro" href="<?php echo esc_url('https://burgerthemes.com/hotelpress-pro/'); ?>" target="_blank" style="display: none;"><?php _e('More Icons Available in HotelPress Pro','hotel-galaxy'); ?></a>
				
			<?php }else{ ?>		

				<a class="customizer_Hotelgalaxy_social_icons_upgrade_section up-to-pro" href="<?php echo esc_url('https://burgerthemes.com/hotel-galaxy-pro/'); ?>" target="_blank" style="display: none;"><?php _e('More Icons Available in Hotel Galaxy Pro','hotel-galaxy'); ?></a>
				
				<?php
			} }
		}

		$wp_customize->add_setting( 'hotelgalaxy_social_icons_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'   	=> 'wp_filter_nohtml_kses'
			
		));
		$wp_customize->add_control(
			new Hotelgalaxy_social_icons_section_upgrade(
				$wp_customize,
				'hotelgalaxy_social_icons_upgrade_to_pro',
				array(
					'priority' => 1,
					'section'  => 'above_header',
				)
			)
		);

		// social media
		$wp_customize->selective_refresh->add_partial(
			'socialmedia_contents', array(
				'selector' => 'ul.social_media',
				'container_inclusive' => true,
				'render_callback'  => 'above_header',
				'fallback_refresh' => true,
			)
		);
	}
}