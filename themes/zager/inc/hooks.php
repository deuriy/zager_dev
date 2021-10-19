<?php
/**
 * Custom hooks
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function understrap_site_info() {
		do_action( 'understrap_site_info' );
	}
}

add_action( 'understrap_site_info', 'understrap_add_site_info' );
if ( ! function_exists( 'understrap_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function understrap_add_site_info() {

		$navigation = wp_nav_menu(
			array(
				'theme_location' => 'auxiliary',
				'depth'          => 1,
				'fallback_cb'	 => false,
				'echo'			 => false,
				'container'  	 => '',
			)
		);

		$site_info = sprintf(
			'<span class="copyright">&copy; Copyright %1$s</span> <span class="company-name">%2$s</span><span class="sep"> | </span>%3$s<span class="sep"> | </span>Site by <a href="%4$s" target="_blank" rel="noopener" class="reaction">%5$s</a>.',
			date( 'Y' ),
			get_bloginfo( 'name' ),
			$navigation,
			'https://reaction.ca',
			'Reaction',
		);

		echo apply_filters( 'understrap_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
