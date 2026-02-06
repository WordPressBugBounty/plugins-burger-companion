<?php
if( ! function_exists( 'burger_com_storex_dynamic_style' ) ):
    function burger_com_storex_dynamic_style() {

		$output_css = '';
		
		/**
		 * Logo Width 
		 */
		 $logo_width			= get_theme_mod('logo_width','140');		 
		if($logo_width !== '') { 
				$output_css .=".logo img, .mobile-logo img {
					max-width: " .esc_attr($logo_width). "px;
				}\n";
			}
		/**
		 *  Typography Body
		 */
		 $storex_body_text_transform	 	 = get_theme_mod('storex_body_text_transform','inherit');
		 $storex_body_font_style	 		 = get_theme_mod('storex_body_font_style','inherit');
		 $storex_body_font_size	 		     = get_theme_mod('storex_body_font_size','16');
		 $storex_body_line_height		     = get_theme_mod('storex_body_line_height','1.5');
		
		 $output_css .=" body{ 
			font-size: " .esc_attr($storex_body_font_size). "px;
			line-height: " .esc_attr($storex_body_line_height). ";
			text-transform: " .esc_attr($storex_body_text_transform). ";
			font-style: " .esc_attr($storex_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $storex_heading_text_transform = get_theme_mod('storex_h' . $i . '_text_transform','inherit');
			 $storex_heading_font_style	 	= get_theme_mod('storex_h' . $i . '_font_style','inherit');
			 $storex_heading_font_size	 	= get_theme_mod('storex_h' . $i . '_font_size');
			 $storex_heading_line_height	= get_theme_mod('storex_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($storex_heading_font_size). "px;
				line-height: " .esc_attr($storex_heading_line_height). ";
				text-transform: " .esc_attr($storex_heading_text_transform). ";
				font-style: " .esc_attr($storex_heading_font_style). ";
			}\n";
		 }
		 
		 
		
        wp_add_inline_style( 'storex-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'burger_com_storex_dynamic_style' );