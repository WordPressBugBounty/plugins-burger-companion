<?php
/**
 * @package   StoreX
 */
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/extras.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/dynamic-style.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-above-header.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-footer-bottom.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-product.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-info.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-popular-categories.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-top-categories.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-slider.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/features/storex-typography.php';

if ( ! function_exists( 'burger_companion_storex_frontpage_sections' ) ) :
	function burger_companion_storex_frontpage_sections() {	
		require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/sections/section-top-categories.php';
		require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/sections/section-slider.php';
		require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/sections/section-popular-categories.php';
	    require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/sections/section-info.php';
		require BURGER_COMPANION_PLUGIN_DIR . 'inc/storex/sections/section-product.php';
    }
	add_action( 'storex_sections', 'burger_companion_storex_frontpage_sections' );
endif;