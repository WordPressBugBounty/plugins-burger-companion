<?php  
if ( ! function_exists( 'burger_storex_info_section' ) ) :
    function burger_storex_info_section() {
       $hs_info_section	= get_theme_mod('hs_info_section','1'); 
       $info_sec = get_theme_mod('info_sec',storex_get_info_default());
       if($hs_info_section =='1'): ?>
          <section class="shop-one pb_70">
            <div class="large-container">
                <div class="row clearfix">
                    <?php
                    if ( ! empty( $info_sec ) ) {
                        $allowed_html = array(
                            'br'     => array(),
                            'em'     => array(),
                            'strong' => array(),
                            'span'   => array(),
                            'b'      => array(),
                            'i'      => array(),
                        );
                        $info_sec = json_decode( $info_sec );
                        foreach ( $info_sec as $info_sec_item ) {
                            $storex_info_title = ! empty( $info_sec_item->title ) ? apply_filters( 'storex_translate_single_string', $info_sec_item->title, 'info section' ) : '';
                            $subtitle = ! empty( $info_sec_item->subtitle ) ? apply_filters( 'storex_translate_single_string', $info_sec_item->subtitle, 'info section' ) : '';
                            $text = ! empty( $info_sec_item->text ) ? apply_filters( 'storex_translate_single_string', $info_sec_item->text, 'info section' ) : '';
                            $button = ! empty( $info_sec_item->text2) ? apply_filters( 'storex_translate_single_string', $info_sec_item->text2,'info section' ) : '';
                            $storex_info_link = ! empty( $info_sec_item->link ) ? apply_filters( 'storex_translate_single_string', $info_sec_item->link, 'info section' ) : '';
                            $image = ! empty( $info_sec_item->image_url ) ? apply_filters( 'storex_translate_single_string', $info_sec_item->image_url, 'info section' ) : '';
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <?php if ( ! empty( $storex_info_title ) ) : ?>
                                            <span class="text"><?php echo wp_kses(html_entity_decode($storex_info_title), $allowed_html )?></span>
                                        <?php endif; ?> 

                                        <?php if ( ! empty( $subtitle ) ) : ?>
                                            <h2><?php echo wp_kses(html_entity_decode($subtitle), $allowed_html )?></h2>
                                        <?php endif; ?> 

                                        <?php if ( ! empty( $text ) ) : ?>
                                            <h4><?php echo wp_kses(html_entity_decode($text), $allowed_html )?></h4>
                                        <?php endif; ?> 

                                        <?php if ( ! empty( $button ) ) : ?>
                                            <div class="link-box"><a href="<?php echo esc_url($storex_info_link); ?>"><?php echo wp_kses_post($button); ?></a></div>
                                        <?php endif; ?> 

                                        <?php if ( ! empty( $image ) ) : ?>
                                            <figure class="image r_0 b_10"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $subtitle ); ?>"></figure>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>
                    </div>
                </div>
            </section>
            <?php
        endif;	
    }
endif;
if ( function_exists( 'burger_storex_info_section' ) ) {
    $section_priority = apply_filters( 'storex_section_priority', 14, 'burger_storex_info_section' );
    add_action( 'storex_sections', 'burger_storex_info_section', absint( $section_priority ) );
}