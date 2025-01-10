<?php 
if(! function_exists('hotelgalaxy_about_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_about_customizer', 999);

	function hotelgalaxy_about_customizer( $wp_customize ) {	

		if(! $wp_customize->get_section('about_section')){
			$wp_customize->add_section('about_section',array(
				'title' => __( 'About Section','hotel-galaxy' ),
				'description' => '',
				'panel'=>'frontpage_layout',
				'capability'=>'edit_theme_options',
				'priority' => 1,			
			));
		}

		//head  
		$wp_customize->add_setting(
			'about_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',				
			)
		);

		$wp_customize->add_control(
			'about_head',
			array(
				'type' => 'hidden',
				'label' => __('Header','hotel-galaxy'),
				'section' => 'about_section',
				'priority'  => 1,
			)
		); 

		//show or hide
		$wp_customize->add_setting(	's_h_about_section',array(			
			'default'=> true,
			'sanitize_callback' =>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_about_section', array(
			'label'       => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'        =>'checkbox',
			'section'     => 'about_section',	
			'priority'    => 1,			
		) );

		// title
		$wp_customize->add_setting('about_section_title',array(			
			'default'=> __('Welcome to Hotel', 'hotel-galaxy'),	
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',
			'capability'       => 'edit_theme_options',
		));
		$wp_customize->add_control( 'about_section_title', array(
			'label'        => __( 'Title', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'about_section',
			'priority' => 2,
			'settings'   => 'about_section_title',
		));

		// top header details
		$wp_customize->selective_refresh->add_partial(
			'about_section_title', array(
				'selector' => '.about_content .entry-title',
				'container_inclusive' => true,
				'render_callback' => 'about_section',
				'fallback_refresh' => true,
			)
		);

		// subtitle
		$wp_customize->add_setting('about_section_subtitle',array(		
			'default'=> __('Excepteur sint occaecat cupidatat non', 'hotel-galaxy'),	
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',
			'capability'       => 'edit_theme_options',
		));
		$wp_customize->add_control( 'about_section_subtitle', array(
			'label'        => __( 'Subtitle', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'about_section',
			'priority' => 3,			
		));

		// top header details
		$wp_customize->selective_refresh->add_partial(
			'about_section_subtitle', array(
				'selector' => '.about_content h4',
				'container_inclusive' => true,
				'render_callback'  => 'about_section',
				'fallback_refresh' => true,
			)
		);

		// button text
		$wp_customize->add_setting('about_button_text',array(			
			'default'=> __('ReadMore', 'hotel-galaxy'),
			'sanitize_callback'=>'hotelgalaxy_sanitize_text',	
			'capability'       => 'edit_theme_options',
		));
		$wp_customize->add_control( 'about_button_text', array(
			'label'        => __( 'Button Text', 'hotel-galaxy' ),
			'type'=>'text',
			'section'    => 'about_section',	
			'priority'    => 4,				
		));

		// top header details
		$wp_customize->selective_refresh->add_partial(
			'about_button_text', array(
				'selector' => '.about-content-area a.read-more',
				'container_inclusive' => true,
				'render_callback' => 'about_section',
				'fallback_refresh' => true,
			)
		);

		// button link
		$wp_customize->add_setting('about_button_url',array(			
			'default'=>__('#', 'hotel-galaxy'),
			'sanitize_callback'=>'hotelgalaxy_sanitize_nohtml',	
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 'about_button_url', array(
			'label'        => __( 'Button URL', 'hotel-galaxy' ),
			'type'         =>'text',
			'section'      => 'about_section',	
			'priority'     => 4,				
		));
		
		//head  
		$wp_customize->add_setting(
			'about_content'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',				
			)
		);

		$wp_customize->add_control(
			'about_content',
			array(
				'type' => 'hidden',
				'label' => __('Content','hotel-galaxy'),
				'section' => 'about_section',
				'priority' => 4,
			)
		); 

		// about item repeter
		$wp_customize->add_setting( 'about_contents', array(
			'sanitize_callback' => 'burger_companion_repeater_sanitize',					
			'default' => hotel_galaxy_get_about_default(),
			'transport' => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		));

		$wp_customize->add_control(	new Burger_Companion_Repeater( $wp_customize,'about_contents', array(	
			'label'   => esc_html__('About Contents','hotel-galaxy'),
			'item_name'      => esc_html__( 'About', 'hotel-galaxy' ),
			'add_field_label' => esc_html__( 'Add New About', 'hotel-galaxy' ),	
			'section'   => 'about_section',
			'priority'  => 4,				
			'customizer_repeater_image_control' => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_subtitle_control' => false,
			'customizer_repeater_text_control' => true,
			'customizer_repeater_link_control' => false,
			'customizer_repeater_text2_control'=> false,		
			'customizer_repeater_link2_control' => false,
			'customizer_repeater_button2_control' => false,
			'customizer_repeater_slide_align' => false,
			'customizer_repeater_icon_control' => false,		
			'customizer_repeater_checkbox_control' => false,									
		) 
	) );

        //Pro feature
		class Hotelgalaxy_about_section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'HotelPress' == $theme->name){	
				?>
				<a class="customizer_Hotelgalaxy_about_upgrade_section up-to-pro" href="<?php echo esc_url('https://burgerthemes.com/hotelpress-pro/'); ?>" target="_blank" style="display: none;"><?php _e('More About Item Available in HotelPress Pro','hotel-galaxy'); ?></a>
				
			<?php }else{ ?>		

				<a class="customizer_Hotelgalaxy_about_upgrade_section up-to-pro" href="<?php echo esc_url('https://burgerthemes.com/hotel-galaxy-pro/'); ?>" target="_blank" style="display: none;"><?php _e('More About Item Available in Hotel Galaxy Pro','hotel-galaxy'); ?></a>
				
				<?php
			} }
		}

		$wp_customize->add_setting( 'hotelgalaxy_about_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'   	=> 'wp_filter_nohtml_kses'
			
		));

		$wp_customize->add_control(
			new Hotelgalaxy_about_section_upgrade(
				$wp_customize,
				'hotelgalaxy_about_upgrade_to_pro',
				array(
					'section'  => 'about_section',
					'priority' => 4
				)
			)
		);

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'about_contents', array(
				'selector' => '.about-content-area ul',
				'container_inclusive' => true,
				'render_callback' => 'about_section',
				'fallback_refresh' => true,
			)
		);
		
		//head  
		$wp_customize->add_setting(
			'about_image_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',				
			)
		);

		$wp_customize->add_control(
			'about_image_head',
			array(
				'type' => 'hidden',
				'label' => __('Images','hotel-galaxy'),
				'section' => 'about_section',
				'priority'  => 4,
			)
		); 

		// image 1
		$wp_customize->add_setting('about_image',array(			
			'default'=> esc_url(BURGER_COMPANION_PLUGIN_URL.'/inc/hotel-galaxy/images/about/about-01.jpg'),	
			'sanitize_callback'=>'esc_url_raw',	
			'capability'       => 'edit_theme_options'
		));

		$wp_customize->add_control( 
			new WP_Customize_Image_Control($wp_customize,'about_image',
				array(
					'label'=>__('Image 1','hotel-galaxy'),
					'section'=>'about_section',
					'priority'=>4,					
				)
			)
		);
		$current_theme = wp_get_theme();
		if ($current_theme->get('Name') === 'HotelPress') {
			$default_image = esc_url(BURGER_COMPANION_PLUGIN_URL . '/inc/hotelpress/images/about/about-text.png');
		} else {
			$default_image = esc_url(BURGER_COMPANION_PLUGIN_URL . '/inc/hotel-galaxy/images/about/about-text.png');
		}
		// image 2
		$wp_customize->add_setting('about_image_2',array(			
			'default'           => $default_image,
			'sanitize_callback'=>'esc_url_raw',	
			'capability'        => 'edit_theme_options'
		));

		$wp_customize->add_control( 
			new WP_Customize_Image_Control($wp_customize,'about_image_2',
				array(
					'label'=>__('Image 2','hotel-galaxy'),
					'section'=>'about_section',
					'priority'=>4,					
				)
			)
		);

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'about_image', array(
				'selector' => '.about-video-img',
				'container_inclusive' => true,
				'render_callback' => 'about_section',
				'fallback_refresh' => true,
			)
		);

	}
}