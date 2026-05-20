<?php  
if ( ! function_exists( 'burger_storex_slider' ) ) :
	function burger_storex_slider() {
       $slider = get_theme_mod('slider',storex_get_slider_default());
       $current_theme = wp_get_theme();
       $theme_name    = $current_theme->get( 'Name' );
       ?>
       <section class="banner-section p_relative">
        <div class="banner-carousel owl-theme owl-carousel owl-nav-none dots-style-one">
            <?php
            if ( ! empty( $slider ) ) {
                $allowed_html = array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    'span'   => array(),
                    'b'      => array(),
                    'i'      => array(),
                );
                $slider = json_decode( $slider );
                foreach ( $slider as $slide_item ) {
                    $storex_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'storex_translate_single_string', $slide_item->title, 'slider section' ) : '';
                    $subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'storex_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
                    $text = ! empty( $slide_item->text ) ? apply_filters( 'storex_translate_single_string', $slide_item->text, 'slider section' ) : '';
                    $button = ! empty( $slide_item->text2) ? apply_filters( 'storex_translate_single_string', $slide_item->text2,'slider section' ) : '';
                    $storex_slide_link = ! empty( $slide_item->link ) ? apply_filters( 'storex_translate_single_string', $slide_item->link, 'slider section' ) : '';
                    $image = ! empty( $slide_item->image_url ) ? apply_filters( 'storex_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
                    ?>
                    <div class="slide-item p_relative">
                        <?php if ( 'StoreX' === $theme_name ) { ?>
                            <div class="pattern-layer" style="background-image: url('<?php echo esc_url( BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/slider/shape-2.png'); ?>');"></div>
                        <?php }else{ ?> 
                             <div class="pattern-layer" style="background-image: url('<?php echo esc_url($image); ?>');"></div>
                        <?php } ?>
                            <?php if ( ! empty( $image ) && 'StoreX' === wp_get_theme()->get( 'Name' ) ) : ?>
                            <figure class="image-layer r_95 b_0"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $storex_slide_title ); ?>"></figure>
                        <?php endif; ?>
                        <div class="large-container">
                            <div class="content-box">
                                <?php if ( ! empty( $storex_slide_title ) ) : ?>
                                    <span class="upper-text"><?php echo wp_kses(html_entity_decode($storex_slide_title), $allowed_html )?></span>
                                <?php endif; ?> 

                                <?php if ( ! empty( $subtitle ) ) : ?>
                                    <h2><?php echo wp_kses(html_entity_decode($subtitle), $allowed_html )?></h2>
                                <?php endif; ?> 

                                <?php if ( ! empty( $text ) ) : ?>
                                    <h3><?php echo wp_kses(html_entity_decode($text), $allowed_html )?></h3>
                                <?php endif; ?> 

                                <?php if ( ! empty( $button ) ) : ?>
                                    <div class="btn-box"><a href="<?php echo esc_url($storex_slide_link); ?>" class="theme-btn btn-one"><?php echo wp_kses_post($button); ?><span></span><span></span><span></span><span></span></a></div>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </section>
        <?php
    }
endif;
if ( function_exists( 'burger_storex_slider' ) ) {
    $section_priority = apply_filters( 'storex_section_priority', 12, 'burger_storex_slider' );
    add_action( 'storex_sections', 'burger_storex_slider', absint( $section_priority ) );
}