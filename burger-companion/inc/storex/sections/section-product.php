<?php 
if ( ! function_exists( 'burger_storex_product' ) ) :
	function burger_storex_product() {
     $hs_product_section	= get_theme_mod('hs_product_section','1');
     $product_title       = get_theme_mod('product_title','Trending Product');
     $product_cat_id      = get_theme_mod('product_cat_id');
     $product_display_num  = get_theme_mod('product_display_num','20');


     if(class_exists( 'woocommerce' ) && $hs_product_section=='1'): 
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $product_display_num,
        );
        if(!empty($product_cat_id)):
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $product_cat_id,
                ),
            );
        endif;
        ?>  
        <section class="shop-two pb_50">
            <div class="large-container">
                <?php if ( ! empty( $product_title ) ) : ?> 
                <div class="sec-title">
                    <h2><?php echo wp_kses_post($product_title); ?></h2>
                </div>
                <?php endif; ?>
                <div class="shop-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                    <?php   
                    $loop = new WP_Query( $args ); 
                    if( $loop->have_posts() )
                    {
                        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <?php get_template_part('woocommerce/content','product'); ?>
                        <?php endwhile; } ?>

                    </div>
                </div>
            </section>
            <?php
        endif; }

    endif;
    if ( function_exists( 'burger_storex_product' ) ) {
        $section_priority = apply_filters( 'storex_section_priority', 15, 'burger_storex_product' );
        add_action( 'storex_sections', 'burger_storex_product', absint( $section_priority ) );
    }	