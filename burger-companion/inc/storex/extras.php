<?php
if ( ! function_exists( 'storex_header_support_info' ) ) {
	function storex_header_support_info() {
		$hs_above_support_info 			= get_theme_mod('hs_above_support_info','1');
		$abv_hdr_support_info_icon		= get_theme_mod('abv_hdr_support_info_icon','fa-headphones');
		$abv_hdr_support_info_ttl		= get_theme_mod('abv_hdr_support_info_ttl','Call out Hotline 24/7');
		$abv_hdr_support_info_subttl	= get_theme_mod('abv_hdr_support_info_subttl','91 8578 790');
		if($hs_above_support_info =='1'){
			?>
			<div class="support-box">
				<?php if ( ! empty( $abv_hdr_support_info_icon ) ) : ?>	
					<div class="icon-box"><i class="fa <?php echo esc_attr($abv_hdr_support_info_icon); ?>"></i></div>
				<?php endif; ?>	
				<?php if ( ! empty( $abv_hdr_support_info_subttl ) ) : ?>	
					<a href="tel:<?php echo esc_url($abv_hdr_support_info_subttl); ?>"><?php echo wp_kses_post($abv_hdr_support_info_subttl); ?></a>
				<?php endif; ?>	

				<?php if ( ! empty( $abv_hdr_support_info_ttl ) ) : ?>	
					<p><?php echo wp_kses_post($abv_hdr_support_info_ttl); ?></p>
				<?php endif; ?>	
			</div>
			
		<?php } 
	}
}
add_filter( 'storex_header_support_info', 'storex_header_support_info' );

if ( ! function_exists( 'storex_above_header_top' ) ) {
	function storex_above_header_top() {
		$hs_above_header_top 		=	get_theme_mod('hs_above_header_top','1');
		$hs_hdr_social_icon 		=	get_theme_mod('hs_hdr_social_icon','1');
		$above_header_top_content   =   get_theme_mod('above_header_top_content',storecart_get_ab_hea_top_cont_default());
		$social_hdr_icons           =   get_theme_mod('social_hdr_icons',storecart_get_hdr_social_icon_default());
		$top_bar_offer_title = get_theme_mod(
			'top_bar_offer_title',
			__(
				'<img draggable="false" role="img" class="emoji" alt="✌🏼" src="https://s.w.org/images/core/emoji/17.0.2/svg/270c-1f3fc.svg"> Transform Your Dining Space — Save Up to 60% Today',
				'storecart'
			)
		);
		if($hs_above_header_top =='1'){
			?>
			<div class="info-bar d-none d-md-block">

				<div class="large-container">
					<div class="row">
						<div class="col-xl-4 col-lg-6 col-6">


							<div class="left-column">
								<ul class="header_contact" style="display:flex;"> 
									<?php
									if ( ! empty( $above_header_top_content ) ) {
										$above_header_top_content = json_decode( $above_header_top_content );
										foreach ( $above_header_top_content as $abo_hea_top_tem ) {
											$title = ! empty( $abo_hea_top_tem->title ) ? apply_filters( 'storex_translate_single_string', $abo_hea_top_tem->title, 'Header section' ) : '';

											$icon = ! empty( $abo_hea_top_tem->icon_value ) ? apply_filters( 'storex_translate_single_string', $abo_hea_top_tem->icon_value, 'Header section' ) : '';
											?>

											<li class="nav-item">
												<?php if ( ! empty( $icon ) ) : ?>
													<span class="list-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></span>
												<?php endif; ?>

												<?php if ( ! empty( $title ) ) : ?>
													<span class="list-text"><?php echo esc_html($title); ?> </span>
												<?php endif; ?>
											</li>
										<?php } } ?>

									</ul>
								</div>
							</div>
							<div class="col-lg-4 d-none d-xl-block">
								<div class="center-column">
									<ul class="offer-items">
										<li class="offer-icon-list-item">
											<?php if ( ! empty( $top_bar_offer_title ) ) : ?>
												<span class="offer-icon-list-text">
													<?php echo wp_kses_post($top_bar_offer_title); ?>
												</span>
											<?php endif; ?>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-4 col-lg-6 col-6">
								<div class="right-column">
									<?php if($hs_hdr_social_icon =='1'){ ?>
										<ul class="social_media">
											<?php
											if ( ! empty( $social_hdr_icons ) ) {
												$social_hdr_icons = json_decode( $social_hdr_icons );
												foreach ( $social_hdr_icons as $social_item ) {
													$link = ! empty( $social_item->link ) ? apply_filters( 'storex_translate_single_string', $social_item->link, 'Header section' ) : '';
													$icon = ! empty( $social_item->icon_value ) ? apply_filters( 'storex_translate_single_string', $social_item->icon_value, 'Header section' ) : '';
													?>
													<?php if ( ! empty( $icon ) ) : ?>
														<li class="nav-item"> 
															<a href="<?php echo esc_url($link); ?>" target="_blank" class="social-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></a> 
														</li>
														<?php endif; ?>
													<?php } } ?>
													</ul>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php } 
					}
				}
				add_filter( 'storex_above_header_top', 'storex_above_header_top' );

				if ( ! function_exists( 'storex_header_gtranslate' ) ) {
					function storex_header_gtranslate() {

						if (function_exists('gtranslate') || shortcode_exists('gtranslate')) { 
							echo do_shortcode('[gtranslate widget_look="nice_dropdown"]');
						}
					}
				}
				add_filter( 'storex_header_gtranslate', 'storex_header_gtranslate' );

				if ( ! function_exists( 'storex_header_all_categories' ) ) {
					function storex_header_all_categories() {
						$hide_show_offer 		=	get_theme_mod('hide_show_offer','1');
						if($hide_show_offer =='1'){
							if (class_exists('WooCommerce')) { ?>
								<div class="category-box">
									<a href="javascript:void(0);" class="text"><i class="fa fa-align-left"></i><span><?php esc_html_e('All Categories', 'storex'); ?></span></a>
									<ul class="category-list clearfix">
										<?php
										$categories = array(
											'taxonomy' => 'product_cat',
											'hide_empty' => false,
											'parent'   => 0
										);
										$product_cat = get_terms( $categories );
										foreach ($product_cat as $parent_product_cat) {
											$child_args = array(
												'taxonomy' => 'product_cat',
												'hide_empty' => false,
												'parent'   => $parent_product_cat->term_id
											);
											$thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
											$image = wp_get_attachment_url( $thumbnail_id );
											$child_product_cats = get_terms( $child_args );
											if ( ! empty($child_product_cats) ) {
												echo '<li class="menu-item menu-item-has-children"><a href="'.get_term_link($parent_product_cat->term_id).'" class="nav-link">'.(!empty($image) ? "<img src='{$image}' alt='' width='20' height='20' />":''); echo $parent_product_cat->name.'</a>';
											} else {
												echo '<li class="menu-item"><a href="'.get_term_link($parent_product_cat->term_id).'" class="nav-link">'.(!empty($image) ? "<img src='{$image}' alt='' width='20' height='20' />":''); echo $parent_product_cat->name.'</a>';
											}
											if ( ! empty($child_product_cats) ) {
												echo '<ul class="dropdown-menu">';
												foreach ($child_product_cats as $child_product_cat) {
													echo '<li class="menu-item"><a href="'.get_term_link($child_product_cat->term_id).'" class="dropdown-item">'.$child_product_cat->name.'</a></li>';
												} echo '</ul>';
											} echo '</li>';
										} ?>
									</ul>
								<?php } ?>
								<div class="category-menu category-mobile-menu">
									<div class="menu-backdrop"></div>
									<div class="outer-box">
										<div class="upper-box">
											<p><?php esc_html_e('Browse Categories', 'storex'); ?></p>
										</div>
										<div class="category-box">
											<?php if (class_exists('WooCommerce')) { ?>
												<ul class="category-list clearfix">
													<?php
													$categories = array(
														'taxonomy' => 'product_cat',
														'hide_empty' => false,
														'parent'   => 0
													);
													$product_cat = get_terms( $categories );
													foreach ($product_cat as $parent_product_cat) {
														$child_args = array(
															'taxonomy' => 'product_cat',
															'hide_empty' => false,
															'parent'   => $parent_product_cat->term_id
														);
														$thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
														$image = wp_get_attachment_url( $thumbnail_id );
														$child_product_cats = get_terms( $child_args );
														if ( ! empty($child_product_cats) ) {
															echo '<li class="menu-item menu-item-has-children"><a href="'.get_term_link($parent_product_cat->term_id).'" class="nav-link">'.(!empty($image) ? "<img src='{$image}' alt='' width='20' height='20' />":''); echo $parent_product_cat->name.'</a>';
														} else {
															echo '<li class="menu-item"><a href="'.get_term_link($parent_product_cat->term_id).'" class="nav-link">'.(!empty($image) ? "<img src='{$image}' alt='' width='20' height='20' />":''); echo $parent_product_cat->name.'</a>';
														}
														if ( ! empty($child_product_cats) ) {
															echo '<ul class="dropdown-menu">';
															foreach ($child_product_cats as $child_product_cat) {
																echo '<li class="menu-item"><a href="'.get_term_link($child_product_cat->term_id).'" class="dropdown-item">'.$child_product_cat->name.'</a></li>';
															} echo '</ul>';
														} echo '</li>';
													} ?>
												</ul>
											<?php } ?>
										</div>
										<button type="button" class="close-btn"><i class="fa fa-close"></i></button>
									</div>
								</div>
							</div>
						<?php } 
					}
				}
				add_filter( 'storex_header_all_categories', 'storex_header_all_categories' );

				if ( ! function_exists( 'storex_footer_card' ) ) {
					function storex_footer_card() {
						$hide_show_footer_card 		=	get_theme_mod('hide_show_footer_card','1');
						$footer_card_content        =	get_theme_mod('footer_card_content',storex_get_footer_card_default());
						if($hide_show_footer_card =='1'){
							?>
							<ul class="footer-card">
								<?php
								if ( ! empty( $footer_card_content ) ) {
									$footer_card_content = json_decode( $footer_card_content );
									foreach ( $footer_card_content as $card_item ) {
										$image = ! empty( $card_item->image_url ) ? apply_filters( 'storex_translate_single_string', $card_item->image_url, 'footer section' ) : '';
										$link = ! empty( $card_item->link ) ? apply_filters( 'storex_translate_single_string', $card_item->link, 'footer section' ) : '';
										?>
										<?php if ( ! empty( $image ) ) : ?>
											<li><a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Footer card', 'storex' ); ?>"></a></li>

										<?php endif; } }?> 
									</ul>

								<?php } } } 

								add_filter( 'storex_footer_card', 'storex_footer_card' );

/*
 *
 * Slider Default
 */
function storex_get_slider_default() {

	$current_theme = wp_get_theme();
	$theme_name    = $current_theme->get( 'Name' );
	$slider_image = BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/slider/banner-img-1.png';
	if ( 'StoreCart' === $theme_name ) {
		$slider_image = BURGER_COMPANION_PLUGIN_URL . 'inc/storecart/images/slider/banner-img-1.png';
	}
	$default_slides = array(
		array(
			'image_url' => esc_url( $slider_image ),
			'title'     => esc_html__( 'New Release', 'storex' ),
			'subtitle'  => wp_kses_post( __( '<span>Luxury Fashion</span> Classic Styles', 'storex' ) ),
			'text'      => wp_kses_post( __( 'Starting From <span>$85.69</span>', 'storex' ) ),
			'text2'     => esc_html__( 'Shop Now', 'storex' ),
			'link'      => '#',
			'id'        => 'customizer_repeater_slider_001',
		),
		array(
			'image_url' => esc_url( $slider_image ),
			'title'     => esc_html__( 'New Release', 'storex' ),
			'subtitle'  => wp_kses_post( __( '<span>Luxury Fashion</span> Classic Styles', 'storex' ) ),
			'text'      => wp_kses_post( __( 'Starting From <span>$99.99</span>', 'storex' ) ),
			'text2'     => esc_html__( 'Shop Now', 'storex' ),
			'link'      => '#',
			'id'        => 'customizer_repeater_slider_002',
		),
	);

	return apply_filters(
		'storex_get_slider_default',
		wp_json_encode( $default_slides )
	);
}
/*
 *
 * Info Default
 */
function storex_get_info_default() {
	return apply_filters(
		'storex_get_info_default', json_encode(
			array(
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/info/info01.png',
					'title'           => esc_html__( 'Best Seller', 'storex' ),
					'subtitle'        => esc_html__( 'Men Regular Fit Casual Shirt', 'storex' ),
					'text'            => esc_html__( '<span>From</span> $89.22', 'storex' ),
					'text2'	  		  => esc_html__( 'Shop now', 'storex' ),
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_info_001'
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/info/info02.png',
					'title'           => esc_html__( 'Flash Sale', 'storex' ),
					'subtitle'        => esc_html__( 'Premium Stylish Shoes For Men', 'storex' ),
					'text'            => esc_html__( '<span>From</span> $50 Only', 'storex' ),
					'text2'	  		  => esc_html__( 'Shop now', 'storex' ),
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_info_002'
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/info/info03.png',
					'title'           => esc_html__( 'Limited Offer', 'storex' ),
					'subtitle'        => esc_html__( 'Advanced Health Tracking Watch', 'storex' ),
					'text'            => esc_html__( '<span>From</span> $79 Only', 'storex' ),
					'text2'	  		  => esc_html__( 'Shop now', 'storex' ),
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_info_003'
				)
				
			)
		)
	);
}

function storecart_get_ab_hea_top_cont_default() {
	return apply_filters(
		'storecart_get_ab_hea_top_cont_default', json_encode(
			array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-home', 'storex' ),
					'title'           => esc_html__( 'New York, United States', 'storex' ),
					'id'              => 'customizer_repeater_ab_hea_top_cont_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-envelope-o', 'storex' ),
					'title'           => esc_html__( 'wixipi6142@hidevak.com', 'storex' ),
					'id'              => 'customizer_repeater_ab_hea_top_cont_002',
				),
				
				
			)
		)
	);
}

function storecart_get_hdr_social_icon_default() {
	return apply_filters(
		'storecart_get_hdr_social_icon_default', json_encode(
			array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook-square', 'storex' ),
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_hdr_social_icon_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter-square', 'storex' ),
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_hdr_social_icon_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-youtube-play', 'storex' ),
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_hdr_social_icon_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-tumblr-square', 'storex' ),
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_hdr_social_icon_004',
				),
				
				
			)
		)
	);
}

/*
 *
 * Footer Card Default
 */
function storex_get_footer_card_default() {
	return apply_filters(
		'storex_get_footer_card_default', json_encode(
			array(
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/footer/footer-card-1.jpg',
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_footer_card_001'
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/footer/footer-card-2.jpg',
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_footer_card_002'
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/footer/footer-card-3.jpg',
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_footer_card_003'
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/footer/footer-card-4.jpg',
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_footer_card_004'
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/footer/footer-card-5.jpg',
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_footer_card_005'
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/footer/footer-card-6.jpg',
					'link'	          => esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_footer_card_006'
				),
			)
		)
	);
}