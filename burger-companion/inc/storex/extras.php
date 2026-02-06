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
				<a href="javascript:void(0);" class="text"><i class="fa fa-bars"></i><span><?php esc_html_e('All Categories', 'storex'); ?></span></a>
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
	return apply_filters(
		'storex_get_slider_default', json_encode(
			array(
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/slider/banner-img-1.png',
					'title'           => esc_html__( 'New Release', 'storex' ),
					'subtitle'        => esc_html__( '<span>Modern Fashion Display</span> Smart Style Collection', 'storex' ),
					'text'            => esc_html__( 'Starting From <span>$85.69</span>', 'storex' ),
					'text2'	          => esc_html__( 'Shop Now', 'storex' ),
					'link'	          =>  esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/slider/banner-img-1.png',
					'title'           => esc_html__( 'New Release', 'storex' ),
					'subtitle'        => esc_html__( '<span>Luxury Fashion Series</span> Classic Styles', 'storex' ),
					'text'            => esc_html__( 'Starting From <span>$99.99</span>', 'storex' ),
					'text2'	          => esc_html__( 'Shop Now', 'storex' ),
					'link'	          =>  esc_html__( '#', 'storex' ),
					'id'              => 'customizer_repeater_slider_002',
				)
			)
		)
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