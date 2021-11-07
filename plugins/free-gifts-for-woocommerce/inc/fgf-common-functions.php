<?php

/**
 * Common functions.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit ; // Exit if accessed directly.
}

include_once( 'fgf-layout-functions.php' ) ;
include_once( 'fgf-post-functions.php' ) ;
include_once( 'admin/fgf-admin-functions.php' ) ;
include_once( 'fgf-template-functions.php' ) ;

if ( ! function_exists( 'fgf_check_is_array' ) ) {

	/**
	 * Check if the resource is array.
	 *
	 * @return bool
	 */
	function fgf_check_is_array( $data ) {
		return ( is_array( $data ) && ! empty( $data ) ) ;
	}

}

if ( ! function_exists( 'fgf_price' ) ) {

	/**
	 *  Display Price based wc_price function
	 *
	 *  @return string
	 */
	function fgf_price( $price, $echo = true ) {

		if ( $echo ) {
			echo wp_kses_post( wc_price( $price ) ) ;
		}

		return wc_price( $price ) ;
	}

}

if ( ! function_exists( 'fgf_render_product_image' ) ) {

	/**
	 * Display the product image.
	 *
	 * @return mixed
	 */
	function fgf_render_product_image( $product, $size = 'woocommerce_thumbnail', $echo = true ) {

		if ( $echo ) {
			echo wp_kses_post( $product->get_image( $size ) ) ;
		}

		return $product->get_image() ;
	}

}

if ( ! function_exists( 'fgf_get_wc_cart_subtotal' ) ) {

	/**
	 * Get the WC cart subtotal.
	 *
	 * @return string/float
	 */
	function fgf_get_wc_cart_subtotal() {
		if ( ! is_object( WC()->cart ) ) {
			return 0 ;
		}

		if ( method_exists( WC()->cart , 'get_subtotal' ) ) {
			$subtotal = ( 'incl' == get_option( 'woocommerce_tax_display_cart' ) ) ? WC()->cart->get_subtotal() + WC()->cart->get_subtotal_tax() : WC()->cart->get_subtotal() ;
		} else {
			$subtotal = ( 'incl' == get_option( 'woocommerce_tax_display_cart' ) ) ? WC()->cart->subtotal + WC()->cart->subtotal_tax : WC()->cart->subtotal ;
		}

		return $subtotal ;
	}

}

if ( ! function_exists( 'fgf_get_wc_cart_total' ) ) {

	/**
	 * Get the WC cart total.
	 *
	 * @return string/float
	 */
	function fgf_get_wc_cart_total() {
		if ( ! is_object( WC()->cart ) ) {
			return 0 ;
		}

		if ( version_compare( WC()->version , '3.2.0' , '>=' ) ) {
			$total = WC()->cart->get_total( true ) ;
		} else {
			$total = WC()->cart->total ;
		}

		return $total ;
	}

}

if ( ! function_exists( 'fgf_get_free_gift_products_in_cart' ) ) {

	/**
	 * Get the free gift products in the cart.
	 *
	 * @return array/int
	 */
	function fgf_get_free_gift_products_in_cart( $count = false, $automatic = false ) {
		$free_gift_products       = array() ;
		$free_gift_products_count = 0 ;

		if ( is_object( WC()->cart ) ) {
			foreach ( WC()->cart->get_cart() as $key => $value ) {
				if ( ! isset( $value[ 'fgf_gift_product' ] ) ) {
					continue ;
				}

				if ( $automatic && 'automatic' == $value[ 'fgf_gift_product' ][ 'mode' ] ) {
					$value[ 'fgf_gift_product' ][ 'quantity' ] = $value[ 'quantity' ] ;
					$free_gift_products_count                  += $value[ 'quantity' ] ;

					if ( isset( $free_gift_products[ $value[ 'fgf_gift_product' ][ 'product_id' ] ] ) ) {

						$free_gift_products[ $value[ 'fgf_gift_product' ][ 'product_id' ] ][ $value[ 'fgf_gift_product' ][ 'rule_id' ] ] = $value[ 'quantity' ] ;
					} else {
						$free_gift_products[ $value[ 'fgf_gift_product' ][ 'product_id' ] ] = array( $value[ 'fgf_gift_product' ][ 'rule_id' ] => $value[ 'quantity' ] ) ;
					}
				} elseif ( ! $automatic && 'manual' == $value[ 'fgf_gift_product' ][ 'mode' ] ) {
					$value[ 'fgf_gift_product' ][ 'quantity' ] = $value[ 'quantity' ] ;
					$free_gift_products_count                  += $value[ 'quantity' ] ;

					if ( isset( $free_gift_products[ $value[ 'fgf_gift_product' ][ 'product_id' ] ] ) ) {

						$free_gift_products[ $value[ 'fgf_gift_product' ][ 'product_id' ] ][ $value[ 'fgf_gift_product' ][ 'rule_id' ] ] = $value[ 'quantity' ] ;
					} else {
						$free_gift_products[ $value[ 'fgf_gift_product' ][ 'product_id' ] ] = array( $value[ 'fgf_gift_product' ][ 'rule_id' ] => $value[ 'quantity' ] ) ;
					}
				}
			}
		}

		if ( $count ) {
			return $free_gift_products_count ;
		}

		return $free_gift_products ;
	}

}

if ( ! function_exists( 'fgf_get_bogo_products_count_in_cart' ) ) {

	/**
	 * Get the BOGO products count in the cart.
	 *
	 * @return int
	 */
	function fgf_get_bogo_products_count_in_cart( $buy_product_id, $get_product_id, $rule_id ) {
		$quantity = 0 ;
		if ( ! is_object( WC()->cart ) ) {
			return $quantity ;
		}

		foreach ( WC()->cart->get_cart() as $key => $value ) {
			if ( ! isset( $value[ 'fgf_gift_product' ][ 'mode' ] ) || 'bogo' != $value[ 'fgf_gift_product' ][ 'mode' ] ) {
				continue ;
			}

			if ( $rule_id != $value[ 'fgf_gift_product' ][ 'rule_id' ] ) {
				continue ;
			}

			if ( $buy_product_id != $value[ 'fgf_gift_product' ][ 'buy_product_id' ] ) {
				continue ;
			}

			if ( $get_product_id != $value[ 'fgf_gift_product' ][ 'product_id' ] ) {
				continue ;
			}

			$quantity += $value[ 'quantity' ] ;
		}

		return $quantity ;
	}

}

if ( ! function_exists( 'fgf_get_buy_product_count_in_cart' ) ) {

	/**
	 * Get the buy product count in the cart.
	 *
	 * @return int
	 */
	function fgf_get_buy_product_count_in_cart( $buy_product_id ) {
		$buy_product_count = 0 ;
		if ( ! is_object( WC()->cart ) ) {
			return $buy_product_count ;
		}

		foreach ( WC()->cart->get_cart() as $key => $value ) {
			if ( isset( $value[ 'fgf_gift_product' ] ) ) {
				continue ;
			}

			$product_id = ! empty( $value[ 'variation_id' ] ) ? $value[ 'variation_id' ] : $value[ 'product_id' ] ;

			if ( $product_id != $buy_product_id ) {
				continue ;
			}

			$buy_product_count += $value[ 'quantity' ] ;
		}

		return $buy_product_count ;
	}

}

if ( ! function_exists( 'fgf_get_coupon_gift_product_count_in_cart' ) ) {

	/**
	 * Get the coupon gift product count in the cart.
	 *
	 * @return int
	 */
	function fgf_get_coupon_gift_product_count_in_cart( $product_id, $coupon_id, $rule_id ) {
		$quantity = 0 ;
		if ( ! is_object( WC()->cart ) ) {
			return $quantity ;
		}

		foreach ( WC()->cart->get_cart() as $key => $value ) {
			if ( ! isset( $value[ 'fgf_gift_product' ][ 'mode' ] ) || 'coupon' != $value[ 'fgf_gift_product' ][ 'mode' ] ) {
				continue ;
			}

			if ( $rule_id != $value[ 'fgf_gift_product' ][ 'rule_id' ] ) {
				continue ;
			}

			if ( $coupon_id != $value[ 'fgf_gift_product' ][ 'coupon_id' ] ) {
				continue ;
			}

			if ( $product_id != $value[ 'fgf_gift_product' ][ 'product_id' ] ) {
				continue ;
			}

			$quantity += $value[ 'quantity' ] ;
		}

		return $quantity ;
	}

}

if ( ! function_exists( 'fgf_get_free_gift_products_count_in_cart' ) ) {

	/**
	 * Get the free gift products count in the cart.
	 *
	 * @return integer
	 */
	function fgf_get_free_gift_products_count_in_cart( $exclude_bogo = false ) {
		$free_gift_products_count = 0 ;
		if ( ! is_object( WC()->cart ) ) {
			return $free_gift_products_count ;
		}

		foreach ( WC()->cart->get_cart() as $key => $value ) {
			if ( ! isset( $value[ 'fgf_gift_product' ] ) ) {
				continue ;
			}

			if ( $exclude_bogo && ( ! isset( $value[ 'fgf_gift_product' ][ 'mode' ] ) || 'bogo' == $value[ 'fgf_gift_product' ][ 'mode' ] ) ) {
				continue ;
			}

			$value[ 'fgf_gift_product' ][ 'quantity' ] = $value[ 'quantity' ] ;
			$free_gift_products_count                  += $value[ 'quantity' ] ;
		}

		return $free_gift_products_count ;
	}

}

if ( ! function_exists( 'fgf_get_rule_products_count_in_cart' ) ) {

	/**
	 * Get the rule products count in Cart
	 *
	 * @return int
	 */
	function fgf_get_rule_products_count_in_cart( $rule_id ) {
		$count = 0 ;
		if ( ! is_object( WC()->cart ) ) {
			return $count ;
		}

		foreach ( WC()->cart->get_cart() as $key => $value ) {
			if ( ! isset( $value[ 'fgf_gift_product' ] ) ) {
				continue ;
			}

			if ( $value[ 'fgf_gift_product' ][ 'rule_id' ] != $rule_id ) {
				continue ;
			}

			$count += $value[ 'quantity' ] ;
		}

		return $count ;
	}

}

if ( ! function_exists( 'fgf_get_cart_item_count' ) ) {

	/**
	 * Get the cart item count from the cart.
	 *
	 * @return int
	 */
	function fgf_get_cart_item_count( $exclude_gift = true ) {
		$count = 0 ;
		if ( ! is_object( WC()->cart ) ) {
			return $count ;
		}

		foreach ( WC()->cart->get_cart() as $key => $value ) {
			if ( isset( $value[ 'fgf_gift_product' ] ) && $exclude_gift ) {
				continue ;
			}

			$count ++ ;
		}

		return $count ;
	}

}

if ( ! function_exists( 'fgf_get_wc_cart_category_subtotal' ) ) {

	/**
	 * Get the category subtotal from the cart.
	 *
	 * @return float
	 */
	function fgf_get_wc_cart_category_subtotal( $category_ids ) {
		$cart_total = 0 ;
		if ( ! fgf_check_is_array( $category_ids ) ) {
			return $cart_total ;
		}

		if ( ! is_object( WC()->cart ) ) {
			return $cart_total ;
		}

		$tax_display_cart = get_option( 'woocommerce_tax_display_cart' ) ;
		foreach ( WC()->cart->get_cart() as $key => $value ) {

			if ( isset( $value[ 'fgf_gift_product' ] ) ) {
				continue ;
			}

			$product_categories = get_the_terms( $value[ 'product_id' ] , 'product_cat' ) ;
			if ( ! fgf_check_is_array( $product_categories ) ) {
				continue ;
			}

			foreach ( $product_categories as $product_category ) {
				if ( in_array( $product_category->term_id , $category_ids ) ) {
					$cart_total += ( 'incl' == $tax_display_cart ) ? $value[ 'line_subtotal' ] + $value[ 'line_subtotal_tax' ] : $value[ 'line_subtotal' ] ;
					break ;
				}
			}
		}

		return $cart_total ;
	}

}

if ( ! function_exists( 'fgf_get_product_count_in_cart' ) ) {

	/**
	 * Get the product count in the cart.
	 *
	 * @return int
	 */
	function fgf_get_product_count_in_cart( $product_id ) {
		$product_count = 0 ;
		if ( ! is_object( WC()->cart ) ) {
			return $product_count ;
		}

		foreach ( WC()->cart->get_cart() as $key => $value ) {

			$cart_product_id = ! empty( $value[ 'variation_id' ] ) ? $value[ 'variation_id' ] : $value[ 'product_id' ] ;

			if ( $cart_product_id != $product_id ) {
				continue ;
			}

			$product_count += $value[ 'quantity' ] ;
		}

		return $product_count ;
	}

}

if ( ! function_exists( 'fgf_get_address_metas' ) ) {

	/**
	 * Get the user address meta(s).
	 *
	 * @return array
	 */
	function fgf_get_address_metas( $flag ) {

		$address_metas = array(
			'first_name' ,
			'last_name' ,
			'company' ,
			'address_1' ,
			'address_2' ,
			'city' ,
			'country' ,
			'postcode' ,
			'state' ,
				) ;

		return 'billing' == $flag ? array_merge( $address_metas , array( 'email' , 'phone' ) ) : $address_metas ;
	}

}

if ( ! function_exists( 'fgf_get_address' ) ) {

	/**
	 * Get the user address.
	 *
	 * @return array
	 */
	function fgf_get_address( $user_id, $flag ) {
		$billing_metas = fgf_get_address_metas( $flag ) ;

		foreach ( $billing_metas as $each_meta ) {
			$billing_address[ $each_meta ] = get_user_meta( $user_id , $flag . '_' . $each_meta , true ) ;
		}

		return $billing_address ;
	}

}

if ( ! function_exists( 'fgf_get_free_gifts_per_page_column_count' ) ) {

	/**
	 * Get the free gifts per page column count.
	 *
	 * @return int
	 */
	function fgf_get_free_gifts_per_page_column_count() {
		// To avoid pagination if the table pagination is disabled.
		$display_table_pagination = get_option( 'fgf_settings_gift_display_table_pagination' ) ;
		if ( '2' == $display_table_pagination ) {
			return 10000 ;
		}

		$per_page = get_option( 'fgf_settings_free_gift_per_page_column_count' , 4 ) ;

		if ( ! $per_page ) {
			return 4 ;
		}

		return $per_page ;
	}

}

if ( ! function_exists( 'fgf_get_carousel_options' ) ) {

	/**
	 * Get the carousel options.
	 *
	 * @return array
	 */
	function fgf_get_carousel_options() {

		// Declare values.
		$nav            = ( 'yes' == get_option( 'fgf_settings_carousel_navigation' ) ) ? true : false ;
		$auto_play      = ( 'yes' == get_option( 'fgf_settings_carousel_auto_play' ) ) ? true : false ;
		$pagination     = ( 'yes' == get_option( 'fgf_settings_carousel_pagination' ) ) ? true : false ;
		$nav_prev_text  = get_option( 'fgf_settings_carousel_navigation_prevoius_text' ) ;
		$nav_next_text  = get_option( 'fgf_settings_carousel_navigation_next_text' ) ;
		$per_page       = get_option( 'fgf_settings_carousel_gift_per_page' , 3 ) ;
		$item_margin    = get_option( 'fgf_settings_carousel_item_margin' ) ;
		$item_per_slide = get_option( 'fgf_settings_carousel_item_per_slide' ) ;
		$slide_speed    = get_option( 'fgf_settings_carousel_slide_speed' ) ;

		$nav_prev_text  = ( empty( $nav_prev_text ) ) ? '<' : $nav_prev_text ;
		$nav_next_text  = ( empty( $nav_next_text ) ) ? '<' : $nav_next_text ;
		$per_page       = ( empty( $per_page ) ) ? '3' : $per_page ;
		$item_margin    = ( empty( $item_margin ) ) ? '10' : $item_margin ;
		$item_per_slide = ( empty( $item_per_slide ) ) ? '1' : $item_per_slide ;
		$slide_speed    = ( empty( $slide_speed ) ) ? '5000' : $slide_speed ;

		return array(
			'per_page'       => $per_page ,
			'item_margin'    => $item_margin ,
			'nav'            => json_encode( $nav ) ,
			'nav_prev_text'  => $nav_prev_text ,
			'nav_next_text'  => $nav_next_text ,
			'pagination'     => json_encode( $pagination ) ,
			'item_per_slide' => $item_per_slide ,
			'slide_speed'    => $slide_speed ,
			'auto_play'      => json_encode( $auto_play ) ,
				) ;
	}

}

if ( ! function_exists( 'fgf_get_rule_translated_string' ) ) {

	/**
	 * Get the rule translated string.
	 *
	 * @return mixed
	 */
	function fgf_get_rule_translated_string( $option_name, $value, $language = null ) {

		return apply_filters( 'fgf_rule_translate_string' , $value , $option_name , $language ) ;
	}

}


if ( ! function_exists( 'fgf_get_product' ) ) {

	/**
	 * Get the product object by product id.
	 *
	 * @return object/bool
	 */
	function fgf_get_product( $product_id ) {
		if ( ! apply_filters( 'fgf_is_valid_product' , true , $product_id ) ) {
			return false ;
		}

		return apply_filters( 'fgf_get_product' , wc_get_product( $product_id ) , $product_id ) ;
	}

}
