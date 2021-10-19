<?php
/**
 * Declaring widgets
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'widgets_init', 'understrap_widgets_init' );

if ( ! function_exists( 'understrap_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Page Sidebar', 'understrap' ),
				'id'            => 'sidebar-page',
				'description'   => __( 'Page sidebar widget area', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Blog Sidebar', 'understrap' ),
				'id'            => 'sidebar-post',
				'description'   => __( 'Shows widgets in this sidebar on the blog pages.', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar(
				array(
					'name'          => __( 'Shop Sidebar', 'understrap' ),
					'id'            => 'sidebar-shop',
					'description'   => __( 'Shows widgets in this sidebar on the shop pages.', 'understrap' ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}

	}
}
