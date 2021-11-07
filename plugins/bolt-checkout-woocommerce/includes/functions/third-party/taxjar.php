<?php

namespace BoltCheckout;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Bolt Third-party addons support
 *
 * Class to support TaxJar module
 *
 * @package Woocommerce_Bolt_Checkout/Functions
 * @version 1.0.0
 */
Class TaxjarHelper {

	/**
	 * Constructor Function.
	 *
	 */
	public function __construct() {
		// TaxJar do API call and calculate taxes only on cart page and checkout page
		// so we need to emulate that we are on checkout page in necessary cases

		add_filter( 'woocommerce_is_checkout', array( $this, 'is_woocommerce_checkout' ), 10 );
	}

	/**
	 * Return true if we should support taxjar plugin
	 */
	public static function is_enabled() {
		return apply_filters( 'bolt_woocommerce_is_taxjar_enabled', class_exists( 'WC_Taxjar_Integration' ) );
	}

	/**
	 * Hook to emulate that we are on checkout page. It needs when we do calculation on shipping&tax step
	 */
	public function is_woocommerce_checkout( $is_checkout ) {
		return true;
	}

}
