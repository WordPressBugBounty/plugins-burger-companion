<?php 
if ( ! function_exists( 'softura_above_header' ) ) :
	function softura_above_header() {
		$hs_abv_header = get_theme_mod('hs_abv_header','1');
		$abv_header_content = get_theme_mod('abv_header_content',spintech_get_abv_header_default());	
		if($hs_abv_header == '1') { ?>
			<div id="above-header" class="above-header">
				<div class="header-widget d-flex align-items-center">
					<div class="container">
						<div class="row">
							<div class="col-xxl-9 offset-xxl-3 col-lg-12">
								<ul class="above-header-list">
									<?php
									if ( ! empty( $abv_header_content ) ) {
										$allowed_html = array(
											'br'     => array(),
											'em'     => array(),
											'strong' => array(),
											'span'   => array(),
											'b'      => array(),
											'i'      => array(),
										);
										$abv_header_content = json_decode( $abv_header_content );
										foreach ( $abv_header_content as $abv_header_item ) {
											$abv_header_title = ! empty( $abv_header_item->title ) ? apply_filters( 'spintech_translate_single_string', $abv_header_item->title, 'Header section' ) : '';
											$abv_header_dec = ! empty( $abv_header_item->text ) ? apply_filters( 'spintech_translate_single_string', $abv_header_item->text, 'Header section' ) : '';
											$abv_header_icon = ! empty( $abv_header_item->icon_value) ? apply_filters( 'spintech_translate_single_string', $abv_header_item->icon_value,'Header section' ) : '';
											?>
											<li>
												<?php if ( ! empty( $abv_header_icon )){ ?>
													<div class="contact-icon">
														<i class="fa <?php echo esc_attr( $abv_header_icon ); ?>"></i>                                   
													</div>
												<?php } ?>	
												<div class="contact-info">
													<?php if ( ! empty( $abv_header_title ) ) : ?>
														<h6><?php echo wp_kses(html_entity_decode($abv_header_title), $allowed_html )?></h6>
													<?php endif; ?>	

													<?php if ( ! empty( $abv_header_dec ) ) : ?>
														<p><?php echo wp_kses(html_entity_decode($abv_header_dec), $allowed_html )?></p>  
													<?php endif; ?>	

												</div>
											</li>
										<?php } } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php 
		} endif;
		add_action('softura_above_header', 'softura_above_header');