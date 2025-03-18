<?php 
if ( ! function_exists( 'corapress_above_header' ) ) :
	function corapress_above_header() {
		$hs_above_opening		=	get_theme_mod('hs_above_opening','1');
		$hide_show_hdr_support	=	get_theme_mod('hide_show_hdr_support','1');	
		$hide_show_social_icon	=	get_theme_mod('hide_show_social_icon','1');
		$hide_show_hdr_btn		=	get_theme_mod('hide_show_hdr_btn','1');
		$hdr_btn_lbl 		    =	get_theme_mod('hdr_btn_lbl','Get A Quote');
		$hdr_btn_url 		    =	get_theme_mod('hdr_btn_url','');
		$hdr_btn_open_new_tab   =   get_theme_mod('hdr_btn_open_new_tab','');
		?>
		<div class="main-navigation-info d-none d-lg-block">
			<div class="container">
				<div class="row">
					<div class="col-9 my-auto">
						<div class="main-menu-right main-nav-info">
							<ul class="menu-right-list">
								<li class="main-info-list">
									<?php if($hide_show_social_icon == '1') : 
										cozipress_header_social_icon(); 
									endif; 

									if($hs_above_opening == '1') :
										cozipress_header_opening_hour(); 
									endif; 

									if($hide_show_hdr_support == '1') :
										cozipress_header_support(); 
									endif;
									?>	
								</li>
							</ul>                            
						</div>
					</div>
					<div class="col-3 my-auto">
						<?php if($hide_show_hdr_btn == '1') : ?>
							<div class="header-link-btn">
								<a href="<?php echo esc_url( $hdr_btn_url ); ?>" <?php if($hdr_btn_open_new_tab == '1'): echo "target='_blank'"; endif;?> class="btn-1"><?php echo esc_html( $hdr_btn_lbl ); ?> <span style="top: 60.4062px; left: 57.2344px;"></span></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php 
	} endif;
	add_action('corapress_above_header', 'corapress_above_header');