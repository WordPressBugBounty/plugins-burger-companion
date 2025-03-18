<?php  
if ( ! function_exists( 'burger_corapress_slider' ) ) :
	function burger_corapress_slider() {
		$slider  = get_theme_mod('slider',cozipress_get_slider_default());	
		?>
		<section id="slider-section" class="slider-section">
			<div class="home-slider owl-carousel owl-theme">
				<?php
				if ( ! empty( $slider ) ) {
					$slider = json_decode( $slider );
					foreach ( $slider as $slide_item ) {
						$corapress_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'cozipress_translate_single_string', $slide_item->title, 'slider section' ) : '';
						$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'cozipress_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
						$text = ! empty( $slide_item->text ) ? apply_filters( 'cozipress_translate_single_string', $slide_item->text, 'slider section' ) : '';
						$button = ! empty( $slide_item->text2) ? apply_filters( 'cozipress_translate_single_string', $slide_item->text2,'slider section' ) : '';
						$corapress_slide_link = ! empty( $slide_item->link ) ? apply_filters( 'cozipress_translate_single_string', $slide_item->link, 'slider section' ) : '';
						$image = ! empty( $slide_item->image_url ) ? apply_filters( 'cozipress_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
						$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'cozipress_translate_single_string', $slide_item->open_new_tab, 'slider section' ) : '';
						$align = ! empty( $slide_item->slide_align ) ? apply_filters( 'cozipress_translate_single_string', $slide_item->slide_align, 'slider section' ) : '';
						?>
						<div class="item">
							<?php if ( ! empty( $image ) ) : ?>
								<img src="<?php echo esc_url( $image ); ?>" data-img-url="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $corapress_slide_title ) ) : ?> alt="<?php echo esc_attr( $corapress_slide_title ); ?>" title="<?php echo esc_attr( $corapress_slide_title ); ?>" <?php endif; ?> />
							<?php endif; ?>
							<div class="main-slider">
								<div class="main-table">
									<div class="main-table-cell">
										<div class="container">                                
											<div class="main-content text-<?php echo esc_attr($align); ?>">

												<?php if ( ! empty( $subtitle ) ) : ?>
													<h3 data-animation="fadeInUp" data-delay="150ms"><?php echo wp_kses_post($subtitle); ?></h3>
												<?php endif; ?>	

												<?php if ( ! empty( $corapress_slide_title ) ) : ?>
													<h1 data-animation="fadeInUp" data-delay="200ms"><?php echo wp_kses_post($corapress_slide_title); ?></h1>
												<?php endif; ?>	

												<?php if ( ! empty( $text ) ) : ?>     
													<p data-animation="fadeInUp" data-delay="500ms"><?php echo wp_kses_post($text); ?></p>
												<?php endif; ?>	
												<div class="btn-box">

													<?php if ( ! empty( $button ) ) : ?>
														<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url($corapress_slide_link); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="btn-2"><?php echo wp_kses_post($button); ?> <span style="top: 60.4062px; left: 57.2344px;"></span></a>
													<?php endif; ?>	
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } } ?>
				</div>
			</section>
			<?php	
		}
	endif;
	if ( function_exists( 'burger_corapress_slider' ) ) {
		$section_priority = apply_filters( 'cozipress_section_priority', 11, 'burger_corapress_slider' );
		add_action( 'cozipress_sections', 'burger_corapress_slider', absint( $section_priority ) );
	}