<?php  
if ( ! function_exists( 'burger_numerology_slider' ) ) :
	function burger_numerology_slider() {
		$hs_slider       = get_theme_mod('hs_slider','1');	
		$hs_slider_wheel = get_theme_mod('hs_slider_wheel','1');	
		$hs_slider_cloud = get_theme_mod('hs_slider_cloud','1');	
		$slider02  = get_theme_mod('slider02',astrocare_get_slider02_default());
		if($hs_slider == '1'){ ?>		
			<section class="ast_slider_section">
				<div class="ast_home_slider owl-carousel owl-theme">
					<?php
					if ( ! empty( $slider02 ) ) {
						$allowed_html = array(
							'h2' => array(
								'class' => array(),
							),
							'span' => array(
								'class' => array(),
								'data-ityped-strings' => array(),
							),
							'br'     => array(),
							'em'     => array(),
							'strong' => array(),
							'b'      => array(),
							'i'      => array(),
						);
						$slider02 = json_decode( $slider02 );
						foreach ( $slider02 as $slide_item ) {
							$numerology_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'astrocare_translate_single_string', $slide_item->title, 'slider section' ) : '';
							$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'astrocare_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
							$text = ! empty( $slide_item->text ) ? apply_filters( 'astrocare_translate_single_string', $slide_item->text, 'slider section' ) : '';
							$button = ! empty( $slide_item->text2) ? apply_filters( 'astrocare_translate_single_string', $slide_item->text2,'slider section' ) : '';
							$numerology_slide_link = ! empty( $slide_item->link ) ? apply_filters( 'astrocare_translate_single_string', $slide_item->link, 'slider section' ) : '';
							$image = ! empty( $slide_item->image_url ) ? apply_filters( 'astrocare_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
							$image2 = ! empty( $slide_item->image_url2 ) ? apply_filters( 'astrocare_translate_single_string', $slide_item->image_url2, 'slider section' ) : '';
							$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'astrocare_translate_single_string', $slide_item->open_new_tab, 'slider section' ) : '';
							?>
							<div class="item">
								<?php if ( ! empty( $image ) ) : ?>
									<img src="<?php echo esc_url( $image ); ?>" data-img-url="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $numerology_slide_title ) ) : ?> alt="<?php echo esc_attr( $numerology_slide_title ); ?>" title="<?php echo esc_attr( $numerology_slide_title ); ?>" <?php endif; ?> />
								<?php endif; ?>
								<div class="astro-main-slider astro-main-slider01">
									<div class="main-table">
										<div class="main-table-cell">
											<div class="container">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-12">
														<div class="num_content-box">
															<div class="num_title-box">
																<div class="num_title-outer">
																	<?php if ( ! empty( $numerology_slide_title ) ) : ?>
																		<?php echo wp_kses(html_entity_decode($numerology_slide_title), $allowed_html )?>
																	<?php endif; ?>
																</div>
																<div class="btn-box wow fadeInRight d-none d-md-block" data-wow-delay="500ms">
																	<?php if ( ! empty( $button ) ) : ?>
																		<a href="<?php echo esc_url($numerology_slide_link); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="ast_book_btn astro_btn">
																			<span class="btn-title yt-btn-title-v1"><?php echo wp_kses_post($button); ?></span>
																		</a>
																	<?php endif; ?>
																</div>
															</div>
															<div class="num_image-box">
																<figure class="num_image overlay-anim wow zoomIn" data-wow-delay="800ms">
																	<?php if ( ! empty( $image2 ) ) : ?>
																		<img src="<?php echo esc_url( $image2 ); ?>" data-img-url="<?php echo esc_url( $image2 ); ?>" <?php if ( ! empty( $numerology_slide_title ) ) : ?> alt="<?php echo esc_attr( $numerology_slide_title ); ?>" title="<?php echo esc_attr( $numerology_slide_title ); ?>" <?php endif; ?> />

																	<?php endif; ?>
																</figure>
																<div class="num_content wow animated animated">
																	<?php if ( ! empty( $subtitle ) ) : ?>
																		<h2 class="ast_title"><?php echo wp_kses(html_entity_decode($subtitle), $allowed_html )?></h2>
																	<?php endif; ?>

																	<?php if ( ! empty( $text ) ) : ?>
																		<p class="text te-text wow fadeInRight" data-wow-delay="500ms"><?php echo wp_kses(html_entity_decode($text), $allowed_html )?></p>
																	<?php endif; ?>


																	<?php if ( ! empty( $button ) ) : ?>
																		<a href="<?php echo esc_url($numerology_slide_link); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="ast_book_btn astro_btn d-md-none">
																			<span class="btn-title yt-btn-title-v1"><?php echo wp_kses_post($button); ?></span>
																		</a>
																	<?php endif; ?>
																</div>
															</div>
														</div>
														<?php if($hs_slider_wheel == '1'){ ?>
															<div class="main d-none d-lg-block">
																<div class="big-circle">
																	<?php
																	$numerology_big_cir_num = [1, 2, 3, 4, 5, 6];
																	foreach ( $numerology_big_cir_num as $numerology_num ) {
																		echo '<div class="icon-block">' . esc_html( $numerology_num ) . '</div>';
																	}
																	?>
																</div>
																<div class="circle">
																	<?php
																	$numerology_cir_num = [7, 8, 9, 0, 4];
																	foreach ( $numerology_cir_num as $numerology_num_item ) {
																		echo '<div class="icon-block">' . esc_html( $numerology_num_item ) . '</div>';
																	}
																	?>
																</div>
																<div class="center-logo">
																	<img alt="middle" src="<?php echo esc_url(BURGER_COMPANION_PLUGIN_URL .'inc/numerology/images/middle-img.png'); ?>">
																</div>
															</div>
															<div class="right-animation-shape d-none d-lg-block">
																<img src="<?php echo esc_url(BURGER_COMPANION_PLUGIN_URL .'inc/numerology/images/slider-shap.png'); ?>" alt="slider-shap">
															</div>
														<?php } ?>

														<?php if($hs_slider_cloud == '1'){ ?>
															<div class="clouds d-none d-lg-block">
																<?php
																for ( $numerology_item = 1; $numerology_item <= 5; $numerology_item++ ) {
																	$numerology_image_url = BURGER_COMPANION_PLUGIN_URL . "inc/numerology/images/cloud{$numerology_item}.png";
																	echo '<img src="' . esc_url( $numerology_image_url ) . '" style="--i:' . esc_attr( $numerology_item ) . ';" alt="Cloud ' . esc_attr( $numerology_item ) . '">';
																} ?>
															</div>
														<?php } ?>
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
			<?php }}
		endif;
		if ( function_exists( 'burger_numerology_slider' ) ) {
			$section_priority = apply_filters( 'astrocare_sectio_priority', 11, 'burger_numerology_slider' );
			add_action( 'astrocare_sections', 'burger_numerology_slider', absint( $section_priority ) );
		} ?>