<?php

namespace BoltCheckout;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Bolt Third-party addons support Functions
 *
 * Functions to support WooCommerce AvaTax.
 * Tested up to: 1.10.3
 *
 * @package Woocommerce_Bolt_Checkout/Functions
 * @version 1.0.0
 */


/**
 * By default, WC Avatax plugin does not calculate the taxes for rest api,
 * this function is to enable the calculation for shipping&tax endpoint if WC session has related flag.
 *
 *
 * @param bool $needs_calculation Whether the cart needs new taxes calculated.
 *
 * @since 2.14.0
 * @access public
 *
 */
function enable_avatax_calculation_for_shipping_tax_api( $needs_calculation ) {
	if ( class_exists( '\WC_AvaTax' )
	     && \wc_avatax()->get_tax_handler()->is_available()
	     && WC()->session->get( 'bolt_enable_avatax_calculation', null ) === true ) {
		$needs_calculation = true;
	}

	return $needs_calculation;
}

add_filter( 'wc_avatax_cart_needs_calculation', '\BoltCheckout\enable_avatax_calculation_for_shipping_tax_api', 999, 1 );

/**
 * By default, WC Avatax plugin does not calculate the taxes for rest api,
 * this function is for adding a flag into the WC session, this flag indicates the cart needs taxes calculated.
 *
 * @since 2.14.0
 * @access public
 *
 */
function enable_avatax_calculation_for_shipping_tax_api_set_session( $bolt_order ) {
	if ( class_exists( '\WC_AvaTax' ) && \wc_avatax()->get_tax_handler()->is_available() ) {
		WC()->session->set( 'bolt_enable_avatax_calculation', true );
	}

	return $bolt_order;
}

add_filter( 'wc_bolt_shipping_validation', '\BoltCheckout\enable_avatax_calculation_for_shipping_tax_api_set_session', 10, 1 );

/**
 * After WC Avatax plugin calculates the taxes for shipping&tax endpoint,
 * this function is for removing the flag from the WC session.
 *
 * @since 2.14.0
 * @access public
 *
 */
function enable_avatax_calculation_for_shipping_tax_api_unset_session( $shipping_options, $bolt_order ) {
	if ( class_exists( '\WC_AvaTax' ) && \wc_avatax()->get_tax_handler()->is_available() ) {
		WC()->session->set( 'bolt_enable_avatax_calculation', null );
	}

	return $shipping_options;
}

add_filter( 'wc_bolt_after_load_shipping_options', '\BoltCheckout\enable_avatax_calculation_for_shipping_tax_api_unset_session', 10, 2 );

/**
 * WC may cache taxes on the cart page,then in the Bolt modal, we need to clear those cache before calculating cart taxes for shipping&tax endpoint.
 *
 * @since 2.14.0
 * @access public
 *
 */
function remove_avatax_cache_for_shipping_tax_api( $shipping_methods ) {
	if ( class_exists( '\WC_AvaTax' ) && \wc_avatax()->get_tax_handler()->is_available() ) {
		WC()->session->set( 'bolt_enable_avatax_calculation', true );

		$shipping_tax_class = get_option( 'woocommerce_shipping_tax_class' );

		if ( 'inherit' !== $shipping_tax_class ) {
			$tax_class = $shipping_tax_class;
		}

		$location = \WC_Tax::get_tax_location( $tax_class, null );

		if ( 4 === count( $location ) ) {
			list( $country, $state, $postcode, $city ) = $location;
			$postcode = wc_normalize_postcode( wc_clean( $postcode ) );

			if ( $country ) {
				$cache_key = \WC_Cache_Helper::get_cache_prefix( 'taxes' ) . 'wc_tax_rates_' . md5( sprintf( '%s+%s+%s+%s+%s', $country, $state, $city, $postcode, $tax_class ) );
				wp_cache_set( $cache_key, false, 'taxes' );
			}
		}
	}
}

add_action( 'wc_bolt_before_calculate_shipping_tax', '\BoltCheckout\remove_avatax_cache_for_shipping_tax_api', 10, 1 );

/**
 * By default, WC Avatax plugin does not calculate the taxes for rest api,
 * this function is for adding a flag into the WC session, this flag indicates the cart needs taxes calculated.
 *
 * @since 2.14.0
 * @access public
 *
 */
function reset_avatax_taxes_for_shipping_tax_api_set_session( $shipping_methods ) {
	if ( class_exists( '\WC_AvaTax' ) && \wc_avatax()->get_tax_handler()->is_available() ) {
		WC()->session->set( 'bolt_reset_avatax_calculation', true );
	}
}

add_action( 'wc_bolt_before_calculate_shipping_tax', '\BoltCheckout\reset_avatax_taxes_for_shipping_tax_api_set_session', 10, 1 );

/**
 * After WC Avatax plugin calculates the taxes for shipping&tax endpoint,
 * this function is for removing the flag from the WC session.
 *
 * @since 2.14.0
 * @access public
 *
 */
function reset_avatax_taxes_for_shipping_tax_api_unset_session( $tax_calculation, $shipping_methods ) {
	if ( class_exists( '\WC_AvaTax' ) && \wc_avatax()->get_tax_handler()->is_available() ) {
		WC()->session->set( 'bolt_reset_avatax_calculation', null );
	}
}

add_action( 'wc_bolt_after_calculate_shipping_tax', '\BoltCheckout\reset_avatax_taxes_for_shipping_tax_api_unset_session', 10, 2 );

/**
 * By default, WC Avatax plugin does not calculate the taxes for rest api,
 * this function is to simulate a transaction on checkout page,
 * so WC Avatax plugin can replace WooCommerce core tax rates with those estimated taxes.
 *
 */
function bolt_reset_tax_cache_checkout( $flag ) {
	if ( class_exists( '\WC_AvaTax' )
	     && \wc_avatax()->get_tax_handler()->is_available()
	     && WC()->session
	     && WC()->session->get( 'bolt_reset_avatax_calculation', null ) === true ) {
		return true;
	}

	return $flag;
}

add_filter( 'woocommerce_is_checkout', '\BoltCheckout\bolt_reset_tax_cache_checkout', 999, 1 );

/**
 * Before Avatax plugin sets the shipping tax data for a cart, it needs shipping packages calculated.
 * This function is to fix the compatibility issue.
 *
 */
function bolt_calculate_shipping_before_update_session_for_avatax( $posted_data, $shipping_methods ) {
	if ( ! isset( $_POST['in_bolt_checkout'] )
	     || ! class_exists( '\WC_AvaTax' )
	     || ! \wc_avatax()->get_tax_handler()->is_available() ) {
		return;
	}

	WC()->cart->calculate_shipping();
}

add_action( 'wc_bolt_before_update_session_in_checkout', '\BoltCheckout\bolt_calculate_shipping_before_update_session_for_avatax', 10, 2 );

/**
 * Before Avatax plugin sets the shipping tax data for a cart, it needs shipping packages calculated.
 * This function is to fix the compatibility issue.
 *
 */
function bolt_calculate_tax_per_each_option_for_avatax( $flag ) {
	if ( class_exists( '\WC_AvaTax' ) && \wc_avatax()->get_tax_handler()->is_available() ) {
		return true;
	}

	return $flag;
}

add_filter( 'wc_bolt_calculate_tax_per_each_option', '\BoltCheckout\bolt_calculate_tax_per_each_option_for_avatax', 20, 1 );