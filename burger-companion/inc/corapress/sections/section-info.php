<?php 
if ( ! function_exists( 'burger_corapress_info' ) ) :
	function burger_corapress_info() {
		$hs_info	    = get_theme_mod('hs_info','1');	
		$info_contents	= get_theme_mod('info_contents',cozipress_get_info_default());
		if($hs_info == '1'){	
			?>
			<section id="info-section" class="info-section">
				<div class="container">
					<div class="row">
						<div class="col-12 wow fadeInUp">
							<div class="row g-4 info-wrapper">
								<?php
								if ( ! empty( $info_contents ) ) {
									$info_contents = json_decode( $info_contents );
									foreach ( $info_contents as $info_item ) {
										$corapress_info_title = ! empty( $info_item->title ) ? apply_filters( 'cozipress_translate_single_string', $info_item->title, 'info section' ) : '';
										$text = ! empty( $info_item->text ) ? apply_filters( 'cozipress_translate_single_string', $info_item->text, 'info section' ) : '';
										$icon = ! empty( $info_item->icon_value) ? apply_filters( 'cozipress_translate_single_string', $info_item->icon_value,'info section' ) : '';
										$corapress_info_link = ! empty( $info_item->link ) ? apply_filters( 'cozipress_translate_single_string', $info_item->link, 'info section' ) : '';
										$image = ! empty( $info_item->image_url ) ? apply_filters( 'cozipress_translate_single_string', $info_item->image_url, 'info section' ) : '';
										?>
										<div class="col-lg-3 col-md-6 col-12">
											<aside class="widget widget-contact">
												<div class="contact-area">
													<div class="contact-info">
														<?php if ( ! empty( $icon ) || ! empty( $image )): ?>
														<div class="icon-box">

															<?php if ( ! empty( $icon ) && ! empty( $image )){ ?>
																<img src="<?php echo esc_url( $image ); ?>" />
															<?php }elseif ( ! empty( $image )){?>	
																<img src="<?php echo esc_url( $image ); ?>" />
															<?php }else{ ?>	
																<span><i class="fa <?php echo esc_attr( $icon ); ?>"></i></span>
															<?php } ?>

														</div>
													<?php endif; ?>

													<?php if ( ! empty( $corapress_info_title ) ) : ?>
														<h6 class="title"><?php echo esc_html($corapress_info_title); ?></h6>
													<?php endif; ?>

													<?php if ( ! empty( $text ) ) : ?>
														<p class="text"><?php echo esc_html($text); ?></p>
													<?php endif; ?>

													<a class="arrow" href="<?php echo esc_url($corapress_info_link); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
												</div>
											</div>
										</aside>
									</div>
								<?php } } ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php	
		} } 
	endif;
	if ( function_exists( 'burger_corapress_info' ) ) {
		$section_priority = apply_filters( 'cozipress_section_priority', 12, 'burger_corapress_info' );
		add_action( 'cozipress_sections', 'burger_corapress_info', absint( $section_priority ) );
	}