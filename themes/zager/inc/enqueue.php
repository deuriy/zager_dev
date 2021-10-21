<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . '/css/theme.min.css' );

		wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $css_version );
		wp_enqueue_style( 'theme-styles-tablet', get_stylesheet_directory_uri() . '/css/theme-tablet.min.css', array(), $theme_version, 'screen and (min-width: 768px)' );
		wp_enqueue_style( 'theme-styles-desktop', get_stylesheet_directory_uri() . '/css/theme-desktop.min.css', array(), $theme_version, 'screen and (min-width: 1024px)' );
		wp_enqueue_style( 'vendors', get_stylesheet_directory_uri() . '/css/vendor.css', array(), $theme_version );
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/css/styles.css', array(), $theme_version );

		$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/src/js/vendor/swiper/swiper-bundle.min.js', array( 'jquery' ), $js_version, true );
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/src/js/vendor/fancybox/fancybox.umd.js', array( 'jquery' ), $js_version, true );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array( 'jquery' ), $js_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	function understrap_scripts_admin() {
		$the_theme = wp_get_theme();
		wp_enqueue_style('custom-editor-styles', get_stylesheet_directory_uri() . '/css/custom-editor-styles.css');
	  }

} // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
add_action('enqueue_block_editor_assets', 'understrap_scripts_admin');