<?php  
if ( ! function_exists( 'burger_storex_popular_categories' ) ) :
    function burger_storex_popular_categories() {
     $hs_popular_categories		 = get_theme_mod('hs_popular_categories','1');
     $view_all_category_label    = get_theme_mod('view_all_category_label','View All Category');
     $view_all_category_url      = get_theme_mod('view_all_category_url','');
     $popular_categories_title   = get_theme_mod('popular_categories_title','Popular Categories');
     $product_cat02_id           = get_theme_mod('product_cat02_id');
     if($hs_popular_categories =='1'):
        ?>
        <section class="category-section pt_70 pb_75">
            <div class="large-container">
                <div class="sec-title">

                    <?php if ( ! empty( $popular_categories_title ) ) : ?> 
                        <h2><?php echo wp_kses_post($popular_categories_title); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $view_all_category_label ) ) : ?> 
                        <a href="<?php echo esc_url( $view_all_category_url ); ?>"><?php echo wp_kses_post($view_all_category_label); ?></a>
                    <?php endif; ?> 
                </div>
                <?php
                if(!empty($product_cat02_id)):
                    $count = count($product_cat02_id);
                    if ( $count > 0 ){
                        ?>
                        <div class="category-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                            <?php foreach ( $product_cat02_id as $i=>$product_category ) { 
                                $cat_name = get_term_by( 'slug', $product_category, 'product_cat' );
                                $thumbnail_id = get_term_meta( $cat_name->term_id, 'thumbnail_id', true );
                                $image = wp_get_attachment_url( $thumbnail_id );
                                ?>
                                <div class="category-block-one">
                                    <div class="inner-box">
                                        <?php if ( ! empty( $image ) ) : ?> 
                                        <figure class="image-box"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr( $cat_name->name ); ?>"></figure>
                                         <?php endif; ?> 
                                        <div class="lower-content">
                                            <h4><a href="<?php echo esc_url(get_term_link($cat_name->term_id)); ?>"><?php echo esc_html($cat_name->name); ?></a></h4>
                                            <span>
                                                <?php echo esc_html( $cat_name->count ); ?>
                                                <?php echo ( $cat_name->count == 1 ) ? ' item' : ' items'; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }endif; ?>
                </div>
            </section>
            <?php
        endif;	
    }
endif;
if ( function_exists( 'burger_storex_popular_categories' ) ) {
    $section_priority = apply_filters( 'storex_section_priority', 13, 'burger_storex_popular_categories' );
    add_action( 'storex_sections', 'burger_storex_popular_categories', absint( $section_priority ) );
}