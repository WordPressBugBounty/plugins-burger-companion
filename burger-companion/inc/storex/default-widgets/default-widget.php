<?php
$theme = wp_get_theme(); // gets the current theme
$footer_logo = '';
if ( 'StoreX' === $theme->name ) {
	$footer_logo = BURGER_COMPANION_PLUGIN_URL . 'inc/storex/images/logo.png';
}
$activate = array(
	'storex-sidebar-primary' => array(
		'search-1',
		'recent-posts-1',
		'archives-1',
	),
	'storex-footer-widget-area' => array(
		'text-1',
		'categories-1',
		'archives-1',
		'pages-1',
		'search-1',
	),
);

/* Default widgets */
update_option( 'widget_text', array(
	1 => array(
		'title' => 'About Company',
		'text'  => wp_kses_post(
			'<div class="textwidget">
				<div class="widget-content">
					<figure class="logo-box">
						<a href="javascript:void(0);">
							<img decoding="async" src="' . esc_url( $footer_logo ) . '" alt="">
						</a>
					</figure>
					<ul class="info mb_30 clearfix">
						<li>221B Baker Street, London NW1 6XE, United Kingdom</li>
						<li><a href="mailto:info@yourstore.com">info@yourstore.com</a></li>
					</ul>
					<ul class="social-links">
						<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>'
		),
	),
	2 => array( 'title' => 'Recent Posts' ),
	3 => array( 'title' => 'Categories' ),
) );
update_option( 'widget_categories', array(
	1 => array( 'title' => 'Categories' ),
	2 => array( 'title' => 'Categories' ),
) );
update_option( 'widget_archives', array(
	1 => array( 'title' => 'Archives' ),
	2 => array( 'title' => 'Archives' ),
) );
update_option( 'widget_pages', array(
	1 => array( 'title' => 'Pages' ),
	2 => array( 'title' => 'Pages' ),
) );
update_option( 'widget_search', array(
	1 => array( 'title' => 'Search' ),
	2 => array( 'title' => 'Search' ),
) );

update_option( 'sidebars_widgets', $activate );

$MediaId = get_option( 'storex_media_id' );

if ( is_array( $MediaId ) && ! empty( $MediaId[0] ) ) {
	set_theme_mod( 'custom_logo', absint( $MediaId[0] ) );
}