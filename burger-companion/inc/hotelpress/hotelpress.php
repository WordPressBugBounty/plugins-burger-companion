<?php 
//Admin Enqueue for Admin
function burger_companion_hotelpress_admin_enqueue_scripts(){
    wp_enqueue_style('hg_premium_metabox', BURGER_COMPANION_PLUGIN_URL.'/inc/hotel-galaxy/cpt/assets/css/hotelgalaxy-metabox-style.css');    
}
add_action( 'admin_enqueue_scripts', 'burger_companion_hotelpress_admin_enqueue_scripts' );

require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/extras.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/dynamic-style.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotelpress/sections/section-above-header.php'; 
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-above-header.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotelpress/features/hotelpress-above-header.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-general.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-slider.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-aboutus.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-service.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-room.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-footer.php';
require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/features/hotelgalaxy-typography.php';

if ( ! function_exists( 'burger_companion_hotelpress_frontpage_sections' ) ) :
    function burger_companion_hotelpress_frontpage_sections() { 
     require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/sections/section-slider.php';
     require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/sections/section-about.php';
     require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/sections/section-service.php';
     require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/sections/section-room.php';   
 }
 add_action( 'hotel_galaxy_frontpage_sections', 'burger_companion_hotelpress_frontpage_sections' );
endif;

if ( ! function_exists( 'burger_companion_hotelpress_footer_sections' ) ) :
    function burger_companion_hotelpress_footer_sections() {  
    require BURGER_COMPANION_PLUGIN_DIR . 'inc/hotel-galaxy/sections/section-footerbootom.php';
 }
 add_action( 'hotel_galaxy_footer_sections', 'burger_companion_hotelpress_footer_sections' );
endif;

?>