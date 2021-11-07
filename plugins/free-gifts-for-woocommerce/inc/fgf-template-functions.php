<?php

/**
 * Template functions.
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit ; // Exit if accessed directly.
}


if ( ! function_exists( 'fgf_get_template' ) ) {

	/**
	 * Get the other templates from themes.
	 */
	function fgf_get_template( $template_name, $args = array() ) {

		wc_get_template( $template_name , $args , 'free-gifts-for-woocommerce/' , FGF()->templates() ) ;
	}

}

if ( ! function_exists( 'fgf_get_template_html' ) ) {

	/**
	 *  Like fgf_get_template, but returns the HTML instead of outputting.
	 *
	 *  @return string
	 */
	function fgf_get_template_html( $template_name, $args = array() ) {

		ob_start() ;
		fgf_get_template( $template_name , $args ) ;
		return ob_get_clean() ;
	}

}

if ( ! function_exists( 'fgf_get_pagination_classes' ) ) {

	/**
	 * Get the pagination classes.
	 *
	 *  @return array
	 */
	function fgf_get_pagination_classes( $page_no, $current_page ) {
		$classes = array( 'fgf_pagination' , 'fgf_pagination_' . $page_no ) ;

		if ( $current_page == $page_no ) {
			$classes[] = 'current' ;
		}

		return apply_filters( 'fgf_pagination_classes' , $classes , $page_no , $current_page ) ;
	}

}

if ( ! function_exists( 'fgf_get_pagination_number' ) ) {

	/**
	 * Get the pagination number.
	 *
	 *  @return string
	 */
	function fgf_get_pagination_number( $start, $page_count, $current_page ) {
		$page_no = false ;
		if ( $current_page <= $page_count && $start <= $page_count ) {
			$page_no = $start ;
		} else if ( $current_page > $page_count ) {
			$overall_count = $current_page - $page_count + $start ;
			if ( $overall_count <= $current_page ) {
				$page_no = $overall_count ;
			}
		}

		return apply_filters( 'fgf_pagination_number' , $page_no , $start , $page_count , $current_page ) ;
	}

}

if ( ! function_exists( 'fgf_get_gift_product_heading_label' ) ) {

	/**
	 * Get the label for gift product heading.
	 *
	 * @return string.
	 * */
	function fgf_get_gift_product_heading_label() {

		return apply_filters( 'fgf_gift_product_heading_label' , get_option( 'fgf_settings_free_gift_heading_label' ) ) ;
	}

}

if ( ! function_exists( 'fgf_get_gift_product_add_to_cart_button_label' ) ) {

	/**
	 * Get the label for gift product add to cart button.
	 *
	 * @return string.
	 * */
	function fgf_get_gift_product_add_to_cart_button_label() {

		return apply_filters( 'fgf_gift_product_add_to_cart_button_label' , get_option( 'fgf_settings_free_gift_add_to_cart_button_label' ) ) ;
	}

}

if ( ! function_exists( 'fgf_get_gift_product_dropdown_default_value_label' ) ) {

	/**
	 * Get the label for gift product dropdown default value.
	 *
	 * @return string.
	 * */
	function fgf_get_gift_product_dropdown_default_value_label() {

		return apply_filters( 'fgf_gift_product_dropdown_default_value_label' , get_option( 'fgf_settings_free_gift_dropdown_default_option_label' , 'Please select a Gift' ) ) ;
	}

}

if ( ! function_exists( 'fgf_get_dropdown_gift_product_name' ) ) {

	/**
	 * Get the dropdown gift product name.
	 * 
	 * @return string.
	 * */
	function fgf_get_dropdown_gift_product_name( $product_id, $product = false ) {
		if ( ! is_object( $product ) ) {
			$product = wc_get_product( $product_id ) ;
		}

		return apply_filters( 'fgf_get_dropdown_gift_product_name' , $product->get_name() , $product ) ;
	}

}

if ( ! function_exists( 'fgf_show_dropdown_add_to_cart_button' ) ) {

	/**
	 * Show the dropdown add to cart button.
	 * 
	 * @return bool.
	 * */
	function fgf_show_dropdown_add_to_cart_button() {

		return apply_filters( 'fgf_show_dropdown_add_to_cart_button' , '2' != get_option( 'fgf_settings_dropdown_add_to_cart_behaviour' ) ) ;
	}

}

if ( ! function_exists( 'fgf_render_product_name' ) ) {

	/**
	 * Display the gift product name in table.
	 *
	 * @return string
	 */
	function fgf_render_product_name( $product, $echo = true ) {

		$product_name = $product->get_name() ;

		if ( '2' == get_option( 'fgf_settings_gift_display_product_linkable' , '1' ) ) {
			$product_name = "<a href='" . get_permalink( $product->get_id() ) . "'>" . esc_html( $product_name ) . '</a>' ;
		}

		$product_name = apply_filters( 'fgf_gift_product_name' , $product_name , $product ) ;

		if ( $echo ) {
			echo wp_kses_post( $product_name ) ;
		}

		return $product_name ;
	}

}

if ( ! function_exists( 'fgf_get_gift_product_add_to_cart_classes' ) ) {

	/**
	 * Get the gift product add to cart classes.
	 *
	 *  @return array
	 */
	function fgf_get_gift_product_add_to_cart_classes() {
		$classes = array( 'button' , 'fgf-add-manual-gift-product' , 'fgf-add-manual-gift-product' ) ;

		return apply_filters( 'fgf_gift_product_add_to_cart_classes' , $classes ) ;
	}

}

if ( ! function_exists( 'fgf_get_gift_product_add_to_cart_url' ) ) {

	/**
	 * Get the gift product add to cart URL.
	 *
	 *  @return array
	 */
	function fgf_get_gift_product_add_to_cart_url( $gift_product, $permalink = false ) {
		if ( ! $permalink ) {
			$permalink = get_permalink() ;
		}

		if ( 'yes' == get_option( 'fgf_settings_enable_ajax_add_to_cart' ) ) {
			$url = '#' ;
		} else {
			$url = esc_url(
					add_query_arg(
							array(
				'fgf_gift_product' => $gift_product[ 'product_id' ] ,
				'fgf_rule_id'      => $gift_product[ 'rule_id' ] ,
							) , $permalink
					)
					) ;
		}


		return apply_filters( 'fgf_gift_product_add_to_cart_url' , $url ) ;
	}

}
