<?php

/**
 *  Handles the cart.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit ; // Exit if accessed directly.
}
if ( ! class_exists( 'FGF_Cart_Handler' ) ) {

	/**
	 * Class
	 */
	class FGF_Cart_Handler {

		/**
		 * Class Initialization.
		 */
		public static function init() {
			// May be add the custom cart item data.
			add_action( 'woocommerce_get_item_data' , array( __CLASS__ , 'maybe_add_custom_item_data' ) , 10 , 2 ) ;
			// Remove the shipping for gift product.
			add_filter( 'woocommerce_cart_shipping_packages' , array( __CLASS__ , 'alter_shipping_packages' ) , 10 , 1 ) ;
			// Set the price for gift product as 0.
			add_action( 'woocommerce_before_calculate_totals' , array( __CLASS__ , 'set_price' ) , 9999 , 1 ) ;
			// Alter the cart contents order.
			add_filter( 'woocommerce_cart_contents_changed' , array( __CLASS__ , 'alter_cart_contents_order' ) , 10 , 1 ) ;
			// Handles the cart item remove link.
			add_filter( 'woocommerce_cart_item_remove_link' , array( __CLASS__ , 'handles_cart_item_remove_link' ) , 10 , 2 ) ;
			// Set the cart item price html.
			add_filter( 'woocommerce_cart_item_price' , array( __CLASS__ , 'set_cart_item_price' ) , 9999 , 3 ) ;
			// Make the cart quantity html kis non editable. 
			add_filter( 'woocommerce_cart_item_quantity' , array( __CLASS__ , 'set_cart_item_quantity' ) , 9999 , 2 ) ;
			// Set the cart item subtotal.
			add_filter( 'woocommerce_cart_item_subtotal' , array( __CLASS__ , 'set_cart_item_subtotal' ) , 9999 , 3 ) ;
			// Remove the gift products from the cart when cart is empty.
			add_action( 'woocommerce_cart_item_removed' , array( __CLASS__ , 'remove_gift_product_cart_empty' ) , 10 , 2 ) ;
		}

		/**
		 *  May be add the custom cart item data.
		 * 
		 * @return array
		 */
		public static function maybe_add_custom_item_data( $item_data, $cart_item ) {
			if ( ! isset( $cart_item[ 'fgf_gift_product' ] ) || ! fgf_check_is_array( $cart_item[ 'fgf_gift_product' ] ) ) {
				return $item_data ;
			}

			$type_label    = get_option( 'fgf_settings_free_gift_cart_item_type_localization' , esc_html__( 'Type' , 'free-gifts-for-woocommerce' ) ) ;
			$display_label = get_option( 'fgf_settings_free_gift_cart_item_type_value_localization' , esc_html__( 'Free Product' , 'free-gifts-for-woocommerce' ) ) ;

			if ( empty( $type_label ) && empty( $display_label ) ) {
				return $item_data ;
			}

			$item_data[] = array(
				'name'    => $type_label ,
				'display' => $display_label ,
					) ;

			return $item_data ;
		}

		/**
		 * Filter items needing shipping callback.
		 *
		 * @return bool
		 */
		public static function filter_items_needing_shipping( $item ) {
			// Return true,if the cart item is gift product.
			if ( ! isset( $item[ 'fgf_gift_product' ] ) ) {
				return true ;
			}

			return false ;
		}

		/**
		 * Get only items that need shipping.
		 *
		 * @return array
		 */
		public static function get_items_needing_shipping( $contents ) {
			return array_filter( $contents , array( __CLASS__ , 'filter_items_needing_shipping' ) ) ;
		}

		/**
		 * Remove the shipping for Gift product.
		 * 
		 * @return array
		 */
		public static function alter_shipping_packages( $packages ) {
			// Return if the shipping is not allowed.
			if ( 'yes' == get_option( 'fgf_settings_allow_shipping_free_gift' ) ) {
				return $packages ;
			}

			// Return if the cart packages is empty.
			if ( ! fgf_check_is_array( $packages ) ) {
				return $packages ;
			}

			foreach ( $packages as $package_key => $package ) {
				if ( ! isset( $package[ 'contents' ] ) || ! isset( $package[ 'contents_cost' ] ) ) {
					continue ;
				}

				// Get items needing shipping.
				$items_needing_shipping = self::get_items_needing_shipping( $packages[ $package_key ][ 'contents' ] ) ;

				// Alter shipping package. 
				$packages[ $package_key ][ 'contents' ]      = $items_needing_shipping ;
				$packages[ $package_key ][ 'contents_cost' ] = array_sum( wp_list_pluck( $items_needing_shipping , 'line_total' ) ) ;
			}

			return $packages ;
		}

		/**
		 * Set the custom price for gift product.
		 * 
		 * @return void
		 */
		public static function set_price( $cart_object ) {
			// Return if cart object is not initialized.
			if ( ! is_object( $cart_object ) ) {
				return ;
			}

			foreach ( $cart_object->cart_contents as $key => $value ) {
				if ( ! isset( $value[ 'fgf_gift_product' ] ) ) {
					continue ;
				}

				$price = apply_filters( 'fgf_gift_product_price' , $value[ 'fgf_gift_product' ][ 'price' ] , $key , $value ) ;

				$value[ 'data' ]->set_price( $price ) ;
			}
		}

		/**
		 * Alter the cart contents order.
		 * 
		 * @return array
		 * */
		public static function alter_cart_contents_order( $cart_contents ) {
			// Return the same cart content if contents is empty.
			if ( ! fgf_check_is_array( $cart_contents ) ) {
				return $cart_contents ;
			}

			// Return the same cart content if display cart order is disabled.
			if ( '2' != get_option( 'fgf_settings_gift_product_cart_display_order' ) ) {
				return $cart_contents ;
			}

			$other_cart_contents     = array() ;
			$free_gift_cart_contents = array() ;

			foreach ( $cart_contents as $key => $values ) {
				if ( isset( $values[ 'fgf_gift_product' ] ) ) {
					$free_gift_cart_contents[ $key ] = $values ;
				} else {
					$other_cart_contents[ $key ] = $values ;
				}
			}

			return array_merge( $other_cart_contents , $free_gift_cart_contents ) ;
		}

		/**
		 * Handles the cart item remove link.
		 * 
		 * @return string
		 */
		public static function handles_cart_item_remove_link( $remove_link, $cart_item_key ) {
			// Return if cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return $remove_link ;
			}

			$cart_items = WC()->cart->get_cart() ;

			// Check if the product is a gift product.
			if ( ! isset( $cart_items[ $cart_item_key ][ 'fgf_gift_product' ][ 'mode' ] ) ) {
				return $remove_link ;
			}

			// Return link if no need to remove the link for the product.
			if ( apply_filters( 'fgf_validate_cart_item_remove_link' , false , $cart_item_key , $cart_items ) ) {
				return $remove_link ;
			}

			// Return link if the product is a manual gift product.
			if ( 'manual' == $cart_items[ $cart_item_key ][ 'fgf_gift_product' ][ 'mode' ] ) {
				return $remove_link ;
			}

			return '' ;
		}

		/**
		 * Set the cart item price html.
		 * 
		 * @return mixed
		 */
		public static function set_cart_item_price( $price, $cart_item, $cart_item_key ) {

			// check if product is a gift product
			if ( ! isset( $cart_item[ 'fgf_gift_product' ] ) ) {
				return $price ;
			}

			return self::get_gift_product_price( $price , $cart_item ) ;
		}

		/**
		 * Make the cart quantity as non editable in the cart page.
		 * 
		 * @return string
		 */
		public static function set_cart_item_quantity( $quantity, $cart_item_key ) {
			// Return if cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return $quantity ;
			}

			$cart_items = WC()->cart->get_cart() ;

			// check if product is a gift product
			if ( ! isset( $cart_items[ $cart_item_key ][ 'fgf_gift_product' ] ) ) {
				return $quantity ;
			}

			return $cart_items[ $cart_item_key ][ 'quantity' ] ;
		}

		/**
		 * Set the cart item subtotal.
		 * 
		 * @return string
		 */
		public static function set_cart_item_subtotal( $price, $cart_item, $cart_item_key ) {

			// Check if the product is a gift product.
			if ( ! isset( $cart_item[ 'fgf_gift_product' ] ) ) {
				return $price ;
			}

			return self::get_gift_product_price( $price , $cart_item , true ) ;
		}

		/**
		 * Get the gift product price.
		 * 
		 * @return string
		 * */
		public static function get_gift_product_price( $price, $cart_item, $multiply_qty = false ) {

			// Check if the cart item is a gift product.
			if ( ! isset( $cart_item[ 'fgf_gift_product' ] ) ) {
				return $price ;
			}

			$product_id = ! empty( $cart_item[ 'variation_id' ] ) ? $cart_item[ 'variation_id' ] : $cart_item[ 'product_id' ] ;
			$product    = wc_get_product( $product_id ) ;
			if ( ! is_object( $product ) ) {
				return $price ;
			}

			$product_price = ( $multiply_qty ) ? ( float ) $cart_item[ 'quantity' ] * ( float ) $product->get_price() : $product->get_price() ;

			$price_display_type = get_option( 'fgf_settings_gift_product_price_display_type' ) ;
			if ( '2' == $price_display_type ) {
				$display_price = '<del>' . fgf_price( $product_price , false ) . '</del> <ins>' . fgf_price( $cart_item[ 'fgf_gift_product' ][ 'price' ] , false ) . '</ins>' ;
			} else {
				$display_price = esc_html__( 'Free' , 'free-gifts-for-woocommerce' ) ;
			}

			return $display_price ;
		}

		/**
		 * Remove the gift products from cart when cart is empty.
		 * 
		 * @return void
		 * */
		public static function remove_gift_product_cart_empty( $removed_cart_item_key, $cart ) {
			// Return if the cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return ;
			}

			// Return if the cart is empty.
			if ( WC()->cart->get_cart_contents_count() == 0 ) {
				return ;
			}

			$free_products_count = fgf_get_free_gift_products_count_in_cart() ;
			$cart_items_count    = WC()->cart->get_cart_contents_count() - $free_products_count ;

			// Return if the gift products is exists.
			if ( $cart_items_count ) {
				return ;
			}

			// Remove all gift products from the cart.
			WC()->cart->empty_cart() ;

			// Error Notice.
			wc_add_notice( get_option( 'fgf_settings_free_gift_error_message' ) , 'notice' ) ;
		}

	}

	FGF_Cart_Handler::init() ;
}
