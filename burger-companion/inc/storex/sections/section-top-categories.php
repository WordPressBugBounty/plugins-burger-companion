<?php  
if ( ! function_exists( 'burger_storex_top_categories' ) ) :
	function burger_storex_top_categories() {
        $hs_top_categories = get_theme_mod('hs_top_categories','1');
        $top_categories_id = get_theme_mod('top_categories_id');
        if($hs_top_categories =='1'):
         if(!empty($top_categories_id)):
            $count = count($top_categories_id);
            if ( $count > 0 ){
                ?>
                <section class="featured-section">
                    <div class="large-container">
                        <div class="inner-container">
                            <div class="featured-list">
                                <?php foreach ( $top_categories_id as $i=>$product_category ) { 
                                    $cat_name = get_term_by( 'slug', $product_category, 'product_cat' );
                                    $thumbnail_id = get_term_meta( $cat_name->term_id, 'thumbnail_id', true );
                                    $image = wp_get_attachment_url( $thumbnail_id );
                                    ?>
                                    <div class="single-featured">
                                       <?php if ( ! empty( $image ) ) : ?>
                                        <figure class="image-box"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr( $cat_name->name ); ?>"></figure>
                                    <?php endif; ?> 
                                    <p><?php echo esc_html($cat_name->name); ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }endif; 
    endif;
}
endif;
if ( function_exists( 'burger_storex_top_categories' ) ) {
    $section_priority = apply_filters( 'storex_section_priority', 11, 'burger_storex_top_categories' );
    add_action( 'storex_sections', 'burger_storex_top_categories', absint( $section_priority ) );
}