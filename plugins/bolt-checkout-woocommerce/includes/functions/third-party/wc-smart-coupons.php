<?php

namespace BoltCheckout;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Bolt Third-party addons support Functions
 *
 * Functions to support WooCommerce Smart Coupons.
 * Tested up to: 3.3.8
 *
 * @package Woocommerce_Bolt_Checkout/Functions
 * @version 1.0.0
 */


/**
 * Currently every time when $order->calculate_totals() is called after the order creation,
 * the store credit of `WooCommerce Smart Coupons` would be excluded from the order total calculation.
 * Then this function recalculate the order total with the store credit discount
 * if there is price difference between order total_discount and order discount_total.
 *
 *
 * @param bool $and_taxes Calc taxes if true.
 * @param WC_Order $order Order object of the newly created order
 *
 * @since 2.0.0
 * @access public
 *
 */
function recalculate_order_total_with_smart_coupons_store_credit_discount( $and_taxes, $order = null ) {
	if ( class_exists( '\WC_Smart_Coupons' ) ) {
		if ( empty( $order ) ) {
			return;
		}

		// Gets the total discount amount which would always include the correct discount.
		$total_discount = $order->get_total_discount();
		$total_discount = abs( convert_monetary_value_to_bolt_format( $total_discount ) );
		// Get prop discount_total which may exclude the store credit of `WooCommerce Smart Coupons` after order calculation.
		$discount_total = $order->get_discount_total();
		$discount_total = abs( convert_monetary_value_to_bolt_format( $discount_total ) );
		if ( $total_discount === $discount_total ) {
			return;
		}

		$total = $order->get_total();

		$coupons = ( is_object( $order ) && is_callable( array(
				$order,
				'get_items'
			) ) ) ? $order->get_items( 'coupon' ) : array();

		if ( ! empty( $coupons ) ) {
			$applied_discount_smart_coupon = 0;
			foreach ( $coupons as $coupon ) {
				$code = ( is_object( $coupon ) && is_callable( array(
						$coupon,
						'get_code'
					) ) ) ? $coupon->get_code() : '';
				if ( empty( $code ) ) {
					continue;
				}
				$_coupon       = new \WC_Coupon( $code );
				$discount_type = ( is_object( $_coupon ) && is_callable( array(
						$_coupon,
						'get_discount_type'
					) ) ) ? $_coupon->get_discount_type() : '';
				if ( ! empty( $discount_type ) && 'smart_coupon' == $discount_type ) {
					$discount                      = ( is_object( $coupon ) && is_callable( array(
							$coupon,
							'get_discount'
						) ) ) ? $coupon->get_discount() : 0;
					$applied_discount              = min( $total, $discount );
					$applied_discount_smart_coupon += $applied_discount;
				}
			}
			if ( ( $total_discount - $discount_total ) >= abs( convert_monetary_value_to_bolt_format( $applied_discount_smart_coupon ) ) ) {
				$total -= $applied_discount_smart_coupon;
				$order->set_total( $total );
				$order->save( $total );
			}
		}
	}
}

add_action( 'woocommerce_order_after_calculate_totals', '\BoltCheckout\recalculate_order_total_with_smart_coupons_store_credit_discount', 999, 2 );

/**
 * In the pre-auth order creation process, the Bolt plugin would call WC()->cart->calculate_totals() for
 * several times, but WooCommerce Smart Coupons set a limitation on calculation of its store credit that
 * only can run twice during the process. Then we have to reset the count to make discount calculation correct.
 *
 *
 * @since 2.0.2
 * @access public
 *
 */
function reset_count_after_calculate_totals_with_smart_coupons() {
	if ( isset( $_SERVER['REQUEST_URI'] ) && false !== strpos( $_SERVER['REQUEST_URI'], '/bolt/create-order' ) ) {
		global $wp_actions;
		-- $wp_actions['smart_coupons_after_calculate_totals'];
	}
}

add_action( 'smart_coupons_after_calculate_totals', '\BoltCheckout\reset_count_after_calculate_totals_with_smart_coupons' );

/**
 * The tax amount or shipping amount may update during Bolt checkout, to cover these fees, the Bolt plugin
 * send all the available credits of smart store credit to the bolt server.
 *
 *
 * @since 2.0.2
 * @access public
 *
 */
function update_cart_discounts_with_smart_coupons( $bolt_cart ) {
	if ( class_exists( '\WC_Smart_Coupons' ) && isset( $bolt_cart[ BOLT_CART_DISCOUNTS ] ) && ! empty( $bolt_cart[ BOLT_CART_DISCOUNTS ] ) ) {
		$new_bolt_cart_discounts = array();
		foreach ( $bolt_cart[ BOLT_CART_DISCOUNTS ] as $discount ) {
			$coupon_code   = $discount[ BOLT_CART_DISCOUNT_REFERENCE ];
			$coupon        = new \WC_Coupon( $coupon_code );
			$discount_type = ( is_object( $coupon ) && is_callable( array(
					$coupon,
					'get_discount_type'
				) ) ) ? $coupon->get_discount_type() : '';
			if ( ! empty( $discount_type ) && 'smart_coupon' == $discount_type ) {
				$new_bolt_cart_discounts[] = array(
					BOLT_CART_DISCOUNT_AMOUNT      => convert_monetary_value_to_bolt_format( $coupon->get_amount() ),
					BOLT_CART_DISCOUNT_DESCRIPTION => $discount[ BOLT_CART_DISCOUNT_DESCRIPTION ],
					BOLT_CART_DISCOUNT_REFERENCE   => (string) $coupon_code,
					BOLT_CART_DISCOUNT_CATEGORY    => BOLT_DISCOUNT_CATEGORY_COUPON
				);
			} else {
				$new_bolt_cart_discounts[] = $discount;
			}
		}
		$bolt_cart[ BOLT_CART_DISCOUNTS ] = $new_bolt_cart_discounts;
	}

	return $bolt_cart;
}

add_action( 'wc_bolt_order_creation_cart_data', '\BoltCheckout\update_cart_discounts_with_smart_coupons' );

/**
 * Smart Coupon Store Credit does not add discount amount to the discount_total of WC cart,
 * this function is to fix this issue.
 *
 *
 * @since 2.6.0
 * @access public
 *
 */
function apply_smart_coupon_credit_to_cart( $cart_discount_total, $bolt_transaction, $error_handler ) {
	if ( class_exists( '\WC_Smart_Coupons' ) ) {
		$applied_coupons          = is_callable( array(
			WC()->cart,
			'get_applied_coupons'
		) ) ? WC()->cart->get_applied_coupons() : array();
		$smart_coupon_credit_used = isset( WC()->cart->smart_coupon_credit_used ) ? WC()->cart->smart_coupon_credit_used : array();

		if ( ! empty( $applied_coupons ) ) {
			foreach ( $applied_coupons as $code ) {
				if ( ! array_key_exists( $code, $smart_coupon_credit_used ) ) {
					continue;
				}
				$coupon              = new \WC_Coupon( $code );
				$cart_discount_total += abs( convert_monetary_value_to_bolt_format( $coupon->get_amount() ) );
			}
		}
	}

	return $cart_discount_total;

}

add_filter( 'wc_bolt_cart_discount_total', '\BoltCheckout\apply_smart_coupon_credit_to_cart', 10, 3 );

/**
 * Create WC()->cart->smart_coupon_credit_used when restoring Bolt cart.
 *
 *
 * @since 2.6.0
 * @access public
 *
 */
function set_smart_coupon_credit_total_credit_used( $reference, $original_session_data ) {
	if ( class_exists( '\WC_Smart_Coupons' ) ) {
		if ( ! class_exists( '\WC_SC_Apply_Before_Tax' ) ) {
			$file = trailingslashit( WP_PLUGIN_DIR . '/' . WC_SC_PLUGIN_DIRNAME ) . 'includes/class-wc-sc-apply-before-tax.php';
			if ( ! file_exists( $file ) ) {
				return;
			} else {
				include_once $file;
			}
		}
		$sc_apply_before_tax = \WC_SC_Apply_Before_Tax::get_instance();
		$sc_apply_before_tax->cart_set_total_credit_used();
	}
}

add_action( 'wc_bolt_after_set_cart_by_bolt_reference', '\BoltCheckout\set_smart_coupon_credit_total_credit_used', 10, 2 );

/**
 * When applying the store credit of smart coupons on WooC native checkout page, the function WC_Smart_Coupons\smart_coupons_discounted_totals
 * would check if the store credit is already in use, and if so, it does not calculate the discount for store credit, this causes the
 * cart total mismatch between cart provided amount and computed amount in Bolt cart. So we need to reset store credit used data for re-calculation.
 *
 * @since 2.13.0
 * @access public
 *
 */
function reset_smart_coupon_store_credit_for_payment_only_on_checkout_page( $type, $order_id ) {
	if ( $type === BOLT_CART_ORDER_TYPE_CHECKOUT ) {
		unset( WC()->cart->smart_coupon_credit_used );
	}
}

add_action( 'wc_bolt_before_build_cart', '\BoltCheckout\reset_smart_coupon_store_credit_for_payment_only_on_checkout_page', 10, 2 );