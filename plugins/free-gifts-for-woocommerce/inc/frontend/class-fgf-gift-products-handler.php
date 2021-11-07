<?php

/**
 *  Handles the free gift products.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit ; // Exit if accessed directly.
}
if ( ! class_exists( 'FGF_Gift_Products_Handler' ) ) {

	/**
	 * Class.
	 */
	class FGF_Gift_Products_Handler {

		/**
		 * Class.
		 */
		public static function init() {
			// Add automatic gift products to the cart.
			add_action( 'wp' , array( __CLASS__ , 'add_to_cart_automatic_gift_product' ) ) ;
			// Add manual gift products to the cart.
			add_action( 'wp' , array( __CLASS__ , 'add_to_cart_manual_gift_product' ) ) ;
			// Remove the gift products from the cart.
			add_action( 'wp' , array( __CLASS__ , 'remove_gift_product_from_cart' ) ) ;
			// Add automatic gift products to the cart via cart ajax.
			add_action( 'woocommerce_before_cart' , array( __CLASS__ , 'add_to_cart_automatic_gift_product_ajax' ) ) ;
			// Remove the gift products from the cart via cart ajax.
			add_action( 'woocommerce_before_cart' , array( __CLASS__ , 'remove_gift_product_from_cart_ajax' ) ) ;
			// Add to automatic gift product in the mini cart.
			add_action( 'woocommerce_before_mini_cart' , array( __CLASS__ , 'add_to_cart_automatic_gift_product_mini_cart' ) ) ;
			// Remove the free gift products from the mini cart.
			add_action( 'woocommerce_before_mini_cart' , array( __CLASS__ , 'remove_gift_product_from_mini_cart' ) ) ;
			// Add automatic gift products to the cart via checkout ajax.
			add_action( 'woocommerce_review_order_before_cart_contents' , array( __CLASS__ , 'add_to_cart_automatic_gift_product_ajax' ) ) ;
			// Remove the gift products from the cart via checkout ajax.
			add_action( 'woocommerce_review_order_before_cart_contents' , array( __CLASS__ , 'remove_gift_product_from_cart_ajax' ) ) ;

			// Define the gift display hooks.
			self::define_gift_display_cart_page_hook() ;
			self::define_gift_display_checkout_page_hook() ;
		}

		/**
		 * Define the gift display cart page hook.
		 * 
		 * @return void
		 * */
		public static function define_gift_display_cart_page_hook() {

			$customize_hook = self::get_gift_display_cart_page_current_location() ;
			if ( ! fgf_check_is_array( $customize_hook ) ) {
				return ;
			}

			// Hook for the gift display.
			add_action( $customize_hook[ 'hook' ] , array( __CLASS__ , 'display_gift_products' ) , $customize_hook[ 'priority' ] ) ;
		}

		/**
		 * Get the gift display cart page current location.
		 *
		 * @return array.
		 */
		public static function get_gift_display_cart_page_current_location() {

			$cart_location = get_option( 'fgf_settings_gift_cart_page_display_position' ) ;

			$location_details = apply_filters( 'fgf_gift_display_cart_page_position' , array(
				'1' => array(
					'hook'     => 'woocommerce_after_cart_table' ,
					'priority' => 10
				) ,
				'2' => array(
					'hook'     => 'woocommerce_before_cart_table' ,
					'priority' => 10
				)
					) ) ;

			$location_detail = isset( $location_details[ $cart_location ] ) ? $location_details[ $cart_location ] : reset( $location_details ) ;

			return $location_detail ;
		}

		/**
		 * Define the gift display checkout page hook.
		 * 
		 * @return void
		 * */
		public static function define_gift_display_checkout_page_hook() {

			$customize_hook = self::get_gift_display_checkout_page_current_location() ;
			if ( ! fgf_check_is_array( $customize_hook ) ) {
				return ;
			}

			// Hook for the gift display.
			add_action( $customize_hook[ 'hook' ] , array( __CLASS__ , 'display_gift_products' ) , $customize_hook[ 'priority' ] ) ;
		}

		/**
		 * Get the gift display checkout page current location.
		 *
		 * @return array.
		 */
		public static function get_gift_display_checkout_page_current_location() {

			$location_details = apply_filters( 'fgf_gift_display_checkout_page_position' , array(
				'1' => array(
					'hook'     => 'woocommerce_checkout_order_review' ,
					'priority' => 10
				)
					) ) ;

			return reset( $location_details ) ;
		}

		/**
		 * Remove Gift products from cart.
		 * 
		 * @return mixed
		 * */
		public static function remove_gift_product_from_cart() {
			if ( isset( $_REQUEST[ 'payment_method' ] ) || isset( $_REQUEST[ 'woocommerce-cart-nonce' ] ) ) {
				return ;
			}

			self::remove_gift_products() ;
		}

		/**
		 * Remove Gift products from cart via ajax.
		 * 
		 * @return mixed
		 * */
		public static function remove_gift_product_from_cart_ajax() {
			if ( ! isset( $_REQUEST[ 'payment_method' ] ) && ! isset( $_REQUEST[ 'woocommerce-cart-nonce' ] ) ) {
				return ;
			}

			self::remove_gift_products() ;
		}

		/**
		 * Remove Gift products from the mini cart.
		 * 
		 * @return mixed
		 * */
		public static function remove_gift_product_from_mini_cart() {
			if ( isset( $_REQUEST[ 'payment_method' ] ) || isset( $_REQUEST[ 'woocommerce-cart-nonce' ] ) ) {
				return ;
			}

			self::remove_gift_products() ;
		}

		/**
		 * Add to automatic gift product in cart via ajax.
		 * 
		 * @return mixed
		 * */
		public static function add_to_cart_automatic_gift_product_ajax() {

			if ( ! isset( $_REQUEST[ 'payment_method' ] ) && ! isset( $_REQUEST[ 'woocommerce-cart-nonce' ] ) ) {
				return ;
			}

			self::automatic_gift_product( false ) ;
			self::bogo_gift_product( false ) ;
			self::coupon_gift_product( false ) ;
		}

		/**
		 * Add to automatic gift product in cart.
		 * 
		 * @return mixed
		 * */
		public static function add_to_cart_automatic_gift_product() {

			if ( isset( $_REQUEST[ 'payment_method' ] ) || isset( $_REQUEST[ 'woocommerce-cart-nonce' ] ) ) {
				return ;
			}

			self::automatic_gift_product() ;
			self::bogo_gift_product() ;
			self::coupon_gift_product() ;
		}

		/**
		 * Add to automatic gift product in the mini cart.
		 * 
		 * @return mixed
		 * */
		public static function add_to_cart_automatic_gift_product_mini_cart() {

			if ( isset( $_REQUEST[ 'payment_method' ] ) || isset( $_REQUEST[ 'woocommerce-cart-nonce' ] ) ) {
				return ;
			}

			self::automatic_gift_product( false ) ;
			self::bogo_gift_product( false ) ;
			self::coupon_gift_product( false ) ;
		}

		/*
		 * Display Gift Products in after cart table
		 */

		public static function display_gift_products() {
			/**
			 * Hooks : fgf_before_manual_gift_products_summary.
			 */
			do_action( 'fgf_before_manual_gift_products_summary' ) ;

			// Hide table if gift products per order count exists
			if ( FGF_Rule_Handler::check_per_order_count_exists() ) {
				return ;
			}

			// Return if data args does not exists.
			$data_args = self::get_gift_product_data() ;
			if ( ! $data_args ) {
				return ;
			}

			if ( is_checkout() || '2' == get_option( 'fgf_settings_gift_cart_page_display' ) ) {
				$data_args[ 'mode' ] = 'popup' ;
				// Display Gift Products popup layout.
				fgf_get_template( 'popup-layout.php' , array( 'data_args' => $data_args ) ) ;
			} else {
				$data_args[ 'mode' ] = 'inline' ;
				// Display Gift Products layout
				fgf_get_template( $data_args[ 'template' ] , $data_args ) ;
			}

			/**
			 * Hooks : fgf_after_manual_gift_products_summary.
			 */
			do_action( 'fgf_after_manual_gift_products_summary' ) ;
		}

		/**
		 *  Get Gift Product Data
		 */
		public static function get_gift_product_data() {
			$gift_products = FGF_Rule_Handler::get_manual_gift_products() ;
			if ( ! fgf_check_is_array( $gift_products ) ) {
				return false ;
			}

			$display_type = get_option( 'fgf_settings_gift_display_type' ) ;

			switch ( $display_type ) {
				case '3':
					$data_args = array(
						'template'      => 'dropdown-layout.php' ,
						'gift_products' => $gift_products ,
							) ;
					break ;

				case '2':
					$data_args = array(
						'template'      => 'carousel-layout.php' ,
						'gift_products' => $gift_products ,
							) ;
					break ;

				default:
					$per_page     = fgf_get_free_gifts_per_page_column_count() ;
					$current_page = 1 ;

					/* Calculate Page Count */
					$default_args[ 'posts_per_page' ] = $per_page ;
					$default_args[ 'offset' ]         = ( $current_page - 1 ) * $per_page ;
					$page_count                       = ceil( count( $gift_products ) / $per_page ) ;

					$data_args = array(
						'template'      => 'gift-products-layout.php' ,
						'gift_products' => array_slice( $gift_products , $default_args[ 'offset' ] , $per_page ) ,
						'pagination'    => array(
							'page_count'      => $page_count ,
							'current_page'    => $current_page ,
							'next_page_count' => ( ( $current_page + 1 ) > ( $page_count - 1 ) ) ? ( $current_page ) : ( $current_page + 1 ) ,
						) ,
							) ;
					break ;
			}

			return $data_args ;
		}

		/**
		 * Add to gift product in cart.
		 */
		public static function add_to_cart_manual_gift_product() {

			if ( ! isset( $_GET[ 'fgf_gift_product' ] ) || ! isset( $_GET[ 'fgf_rule_id' ] ) ) {
				return ;
			}

			// Return if cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return ;
			}

			// return if cart is empty
			if ( WC()->cart->get_cart_contents_count() == 0 ) {
				return ;
			}

			// Restrict Adding gift product if gift products per order count exists
			if ( FGF_Rule_Handler::check_per_order_count_exists() ) {
				return ;
			}

			$product_id = absint( $_GET[ 'fgf_gift_product' ] ) ;
			$rule_id    = absint( $_GET[ 'fgf_rule_id' ] ) ;

			// Check is valid rule
			if ( ! FGF_Rule_Handler::rule_product_exists( $rule_id , $product_id ) ) {
				return ;
			}

			$gift_products = FGF_Rule_Handler::get_manual_gift_products() ;
			if ( ! fgf_check_is_array( $gift_products ) ) {
				return ;
			}

			$rule    = fgf_get_rule( $rule_id ) ;
			$product = wc_get_product( $product_id ) ;

			// return if product id is not proper product
			if ( ! $product ) {
				return ;
			}

			// return if rule id is not proper rule
			if ( ! $rule->exists() ) {
				return ;
			}

			$cart_item_data = array(
				'fgf_gift_product' => array(
					'mode'       => 'manual' ,
					'rule_id'    => $rule_id ,
					'product_id' => $product_id ,
					'price'      => apply_filters( 'fgf_manual_gift_product_price' , 0 , $rule_id , $product_id ) ,
				) ,
					) ;

			// Add to Gift product in cart
			WC()->cart->add_to_cart( $product_id , '1' , 0 , array() , $cart_item_data ) ;

			// Success Notice
			wc_add_notice( get_option( 'fgf_settings_free_gift_success_message' ) ) ;

			// Safe Redirect
			wp_safe_redirect( get_permalink() ) ;
			exit() ;
		}

		/**
		 * Add to automatic gift product in cart.
		 * 
		 * @return mixed
		 * */
		public static function automatic_gift_product( $redirect = true ) {
			// Return if cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return ;
			}

			// Return if cart is empty.
			if ( WC()->cart->get_cart_contents_count() == 0 ) {
				return ;
			}

			// Restrict Adding gift product if gift products per order count exists.
			if ( FGF_Rule_Handler::check_per_order_count_exists() ) {
				return ;
			}

			$automatic_gift_products = FGF_Rule_Handler::get_automatic_gift_products() ;
			if ( ! fgf_check_is_array( $automatic_gift_products ) ) {
				return ;
			}

			if ( apply_filters( 'fgf_validate_automatic_gift_products' , false ) ) {
				return ;
			}

			$products_added                  = false ;
			$free_products_cart_count        = fgf_get_free_gift_products_count_in_cart( true ) ;
			$free_gifts_products_order_count = floatval( get_option( 'fgf_settings_gifts_count_per_order' ) ) ;

			foreach ( $automatic_gift_products as $key => $automatic_gift_product ) {

				// Return if order count exists.
				if ( $free_gifts_products_order_count && $free_products_cart_count >= $free_gifts_products_order_count ) {
					break ;
				}

				// Check is valid rule.
				if ( ! FGF_Rule_Handler::rule_product_exists( $automatic_gift_product[ 'rule_id' ] , $automatic_gift_product[ 'product_id' ] , true ) ) {
					continue ;
				}

				// Return If already added this product in cart.
				if ( $automatic_gift_product[ 'hide_add_to_cart' ] ) {
					continue ;
				}

				$rule    = fgf_get_rule( $automatic_gift_product[ 'rule_id' ] ) ;
				$product = wc_get_product( $automatic_gift_product[ 'product_id' ] ) ;

				// Return if product id is not proper product.
				if ( ! $product ) {
					return ;
				}

				// Return if rule id is not proper rule.
				if ( ! $rule->exists() ) {
					return ;
				}

				$cart_item_data = array(
					'fgf_gift_product' => array(
						'mode'       => 'automatic' ,
						'rule_id'    => $automatic_gift_product[ 'rule_id' ] ,
						'product_id' => $automatic_gift_product[ 'product_id' ] ,
						'price'      => apply_filters( 'fgf_automatic_gift_product_price' , 0 , $automatic_gift_product ) ,
						'qty'        => $automatic_gift_product[ 'qty' ] ,
					) ,
						) ;

				$products_added = true ;

				$free_products_cart_count ++ ;

				// Add to Gift product in cart
				WC()->cart->add_to_cart( $automatic_gift_product[ 'product_id' ] , $automatic_gift_product[ 'qty' ] , 0 , array() , $cart_item_data ) ;
			}

			if ( $products_added ) {
				// Success Notice.
				wc_add_notice( get_option( 'fgf_settings_free_gift_automatic_success_message' ) ) ;

				if ( $redirect ) {
					// Safe Redirect.
					wp_safe_redirect( get_permalink() ) ;
					exit() ;
				}
			}
		}

		/**
		 * Add to BOGO gift product in cart.
		 * 
		 * @return mixed
		 * */
		public static function bogo_gift_product( $redirect = true ) {

			// Return if cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return ;
			}

			// Return if cart is empty.
			if ( WC()->cart->get_cart_contents_count() == 0 ) {
				return ;
			}

			$bogo_gift_products = FGF_Rule_Handler::get_bogo_gift_products() ;
			if ( ! fgf_check_is_array( $bogo_gift_products ) ) {
				return ;
			}

			if ( apply_filters( 'fgf_validate_bogo_gift_products' , false ) ) {
				return ;
			}

			$products_added = false ;

			foreach ( $bogo_gift_products as $key => $bogo_gift_product ) {

				// Return if already added this product in the cart.
				if ( $bogo_gift_product[ 'hide_add_to_cart' ] ) {
					continue ;
				}

				$rule    = fgf_get_rule( $bogo_gift_product[ 'rule_id' ] ) ;
				$product = wc_get_product( $bogo_gift_product[ 'product_id' ] ) ;

				// Return if product id is not a proper product.
				if ( ! $product ) {
					return ;
				}

				// Return if rule id is not proper rule.
				if ( ! $rule->exists() ) {
					return ;
				}

				$cart_item_data = array(
					'fgf_gift_product' => array(
						'mode'           => 'bogo' ,
						'rule_id'        => $bogo_gift_product[ 'rule_id' ] ,
						'product_id'     => $bogo_gift_product[ 'product_id' ] ,
						'buy_product_id' => $bogo_gift_product[ 'buy_product_id' ] ,
						'price'          => apply_filters( 'fgf_bogo_gift_product_price' , 0 , $bogo_gift_product ) ,
					) ,
						) ;

				$products_added = true ;

				// Add to Gift product in cart.
				WC()->cart->add_to_cart( $bogo_gift_product[ 'product_id' ] , $bogo_gift_product[ 'qty' ] , 0 , array() , $cart_item_data ) ;
			}

			if ( $products_added ) {
				// Success Notice.
				wc_add_notice( get_option( 'fgf_settings_free_gift_bogo_success_message' ) ) ;

				if ( $redirect ) {
					// Safe Redirect.
					wp_safe_redirect( get_permalink() ) ;
					exit() ;
				}
			}
		}

		/**
		 * Add to coupon gift product in the cart.
		 * 
		 * @return mixed
		 * */
		public static function coupon_gift_product( $redirect = true ) {

			// Return if the cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return ;
			}

			// Return if the cart is empty.
			if ( WC()->cart->get_cart_contents_count() == 0 ) {
				return ;
			}

			$coupon_gift_products = FGF_Rule_Handler::get_coupon_gift_products() ;
			if ( ! fgf_check_is_array( $coupon_gift_products ) ) {
				return ;
			}

			if ( apply_filters( 'fgf_validate_coupon_gift_products' , false ) ) {
				return ;
			}

			$products_added = false ;

			foreach ( $coupon_gift_products as $key => $coupon_gift_product ) {

				// Return if already added this product in the cart.
				if ( $coupon_gift_product[ 'hide_add_to_cart' ] ) {
					continue ;
				}

				$rule    = fgf_get_rule( $coupon_gift_product[ 'rule_id' ] ) ;
				$product = wc_get_product( $coupon_gift_product[ 'product_id' ] ) ;

				// Return if the product id is not a proper product.
				if ( ! $product ) {
					return ;
				}

				// Return if the rule id is not a proper rule.
				if ( ! $rule->exists() ) {
					return ;
				}

				$cart_item_data = array(
					'fgf_gift_product' => array(
						'mode'       => 'coupon' ,
						'rule_id'    => $coupon_gift_product[ 'rule_id' ] ,
						'product_id' => $coupon_gift_product[ 'product_id' ] ,
						'coupon_id'  => $coupon_gift_product[ 'coupon_id' ] ,
						'price'      => apply_filters( 'fgf_coupon_gift_product_price' , 0 , $coupon_gift_product ) ,
					) ,
						) ;

				$products_added = true ;

				// Add to gift product in the cart.
				WC()->cart->add_to_cart( $coupon_gift_product[ 'product_id' ] , $coupon_gift_product[ 'qty' ] , 0 , array() , $cart_item_data ) ;
			}

			if ( $products_added ) {
				// Success Notice.
				wc_add_notice( get_option( 'fgf_settings_free_gift_coupon_success_message' ) ) ;

				if ( $redirect ) {
					// Safe Redirect.
					wp_safe_redirect( get_permalink() ) ;
					exit() ;
				}
			}
		}

		/**
		 * Remove Gift products from cart.
		 * */
		public static function remove_gift_products() {
			// Return if cart object is not initialized.
			if ( ! is_object( WC()->cart ) ) {
				return ;
			}

			$products_removed = false ;

			foreach ( WC()->cart->get_cart() as $key => $value ) {

				if ( ! isset( $value[ 'fgf_gift_product' ] ) ) {
					continue ;
				}

				switch ( $value[ 'fgf_gift_product' ][ 'mode' ] ) {
					case 'manual':
						$rule_qty = FGF_Rule_Handler::rule_product_exists( $value[ 'fgf_gift_product' ][ 'rule_id' ] , $value[ 'fgf_gift_product' ][ 'product_id' ] ) ;
						if ( ! $rule_qty ) {
							$products_removed = true ;

							// Remove gift products if not matched.
							WC()->cart->remove_cart_item( $key ) ;
						}
						break ;

					case 'automatic':
						$rule_qty = FGF_Rule_Handler::rule_product_exists( $value[ 'fgf_gift_product' ][ 'rule_id' ] , $value[ 'fgf_gift_product' ][ 'product_id' ] , true ) ;
						if ( ! $rule_qty ) {
							$products_removed = true ;

							// Remove gift products if not matched.
							WC()->cart->remove_cart_item( $key ) ;
						} elseif ( $rule_qty < $value[ 'quantity' ] ) {
							$products_removed = true ;

							// Update gift products quantity.
							WC()->cart->set_quantity( $key , $rule_qty ) ;
						}

						break ;

					case 'bogo':
						$rule_qty = FGF_Rule_Handler::get_bogo_rule_product_qty( $value[ 'fgf_gift_product' ] ) ;

						if ( ! $rule_qty ) {
							$products_removed = true ;

							// Remove gift products if not matched.
							WC()->cart->remove_cart_item( $key ) ;
						} elseif ( $rule_qty < $value[ 'quantity' ] ) {
							$products_removed = true ;

							// Update gift products quantity.
							WC()->cart->set_quantity( $key , $rule_qty ) ;
						}

						break ;

					case 'coupon':
						$rule_qty = FGF_Rule_Handler::get_coupon_rule_product_qty( $value[ 'fgf_gift_product' ] ) ;

						if ( ! $rule_qty ) {
							$products_removed = true ;

							// Remove gift products if not matched.
							WC()->cart->remove_cart_item( $key ) ;
						} elseif ( $rule_qty < $value[ 'quantity' ] ) {
							$products_removed = true ;

							// Update gift products quantity.
							WC()->cart->set_quantity( $key , $rule_qty ) ;
						}

						break ;
				}
			}

			// Error Notice
			if ( $products_removed ) {
				wc_add_notice( get_option( 'fgf_settings_free_gift_error_message' ) , 'notice' ) ;
			}
		}

	}

	FGF_Gift_Products_Handler::init() ;
}
