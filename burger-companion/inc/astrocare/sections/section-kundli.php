<?php 
if ( ! function_exists( 'burger_astrocare_kundli' ) ) :
	function burger_astrocare_kundli() {
		$hs_kundli			= get_theme_mod('hs_kundli','1');	
		$hs_clipart			= get_theme_mod('hs_clipart','1');	
		$kundli_title		= get_theme_mod('kundli_title','Free Kundali');	
		$kundli_subtitle	= get_theme_mod('kundli_subtitle','Get Free Kundali');	
		$kundli_wave_title	= get_theme_mod('kundli_wave_title','Astro');	
		$kundli_wave_url	= get_theme_mod('kundli_wave_url','');	
		if($hs_kundli == '1'){	
			?>
			<section class="ast_section ast_kundli-section ast_bg_primary_lite">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12 m-auto wow zoomIn">
							<div class="ast_free_Kundali">
								<div class="row">
									<div class="col-lg-6 kundli-form">
										<div class="ast_form_box">
											<div class="astro_theme_titles">

												<?php if ( ! empty( $kundli_title ) ) : ?>
													<h5 class="theme_title"><?php do_action('astrocare_title_img_seprator'); ?><?php echo wp_kses_post($kundli_title); ?></h5>
												<?php endif; ?>

												<?php if ( ! empty( $kundli_subtitle ) ) : ?>
													<h2 class="theme_subtitle"><?php echo wp_kses_post($kundli_subtitle); ?></h2>
												<?php endif; ?>
											</div>
											<div class="row">
												<?php if (class_exists('JyotishamAstroAPI')) {

													echo do_shortcode('[jyotisham_kundli]');
												}else{
													echo wp_kses_post("<p class='text-center'>Install and activate <strong>Astro API By Synilogic</strong> plugin for Kundali Form.</p>");
												} ?>
											</div>
										</div>
									</div>
									<div class="col-lg-6 kundli-animation">
										<div class="ast_free_Kundali_img ">
											<div class="hs_waves2">
												<div class="hs_wave"></div>
												<div class="hs_wave"></div>
												<div class="hs_wave"></div>
												<div class="hs_wave"></div>
												<?php if ( ! empty( $kundli_wave_title ) ) : ?>
													<div class="ast_img_title">
														<h4><a href="<?php echo esc_url( $kundli_wave_url ); ?>"><?php echo wp_kses_post($kundli_wave_title); ?></a></h4>
													</div>
												<?php endif; ?>

												<?php if($hs_clipart == '1') : 
													$astrocare_slug = basename( get_stylesheet_directory() );
													$astrocare_path = BURGER_COMPANION_PLUGIN_URL . 'inc/' . $astrocare_slug . '/images/kundli/';
													for ( $astrocare_i = 1; $astrocare_i <= 9; $astrocare_i++ ) {
														$astrocare_ring_class = 'ring' . $astrocare_i;
														$astrocare_animation_class = ($astrocare_i % 2 === 0) ? 'animate-v3' : 'animate-v2';
														$astrocare_image_url = esc_url( $astrocare_path . 'shape-0' . $astrocare_i . '.png' );
														$astrocare_alt_text = 'shape-0' . $astrocare_i;
														?>
														<span class="<?php echo esc_attr($astrocare_ring_class . ' ' . $astrocare_animation_class); ?>">
															<img src="<?php echo $astrocare_image_url; ?>" alt="<?php echo esc_attr($astrocare_alt_text); ?>">
														</span>
													<?php } ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php	
		}}
	endif;
	if ( function_exists( 'burger_astrocare_kundli' ) ) {
		$section_priority = apply_filters( 'astrocare_section_priority', 16, 'burger_astrocare_kundli' );
		add_action( 'astrocare_sections', 'burger_astrocare_kundli', absint( $section_priority ) );
	}