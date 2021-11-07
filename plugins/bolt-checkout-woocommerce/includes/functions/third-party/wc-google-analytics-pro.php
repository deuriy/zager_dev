<?php

namespace BoltCheckout;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Bolt Third-party addons support
 *
 * Class to support Woocommerce Google Analytics Pro
 *
 * Restrictions: only checkout on the cart page.
 * No support for Product page checkout / subscription / payment only
 *
 * @package Woocommerce_Bolt_Checkout/Functions
 * @version 1.0.0
 */
class WC_Google_Analytics_Pro {

	const GA_COOKIE_NAME = '_ga';

	public function __construct() {
		if ( ! self::is_enabled() ) {
			return;
		}
		// Add filter for save GA cookie in our session table
		add_filter(
			'wc_bolt_update_cart_session',
			array( $this, 'update_cart_session' ), 10, 3
		);
		// Add action for restore GA cookie from our session table
		add_action(
			'wc_bolt_after_set_cart_by_bolt_reference',
			array( $this, 'after_set_cart_by_bolt_reference' ), 10, 2
		);
		// Add action for add Ajax call when we start checkout
		add_action(
			'wc_bolt_cart_js_params',
			array( $this, 'add_ajax_call_when_start_checkout' ), 10, 2
		);
		// Add action for record step 1 of checkout funnel when we open checkout modal
		add_action(
			'wc_ajax_wc_bolt_start_checkout',
			array( $this, 'record_event_on_start_checkout' )
		);
		// Add action for record step 2 of checkout funnel when user provides email
		// Need to have a priority less than 5 because of action with priority 10 send an answer and call exit()
		add_action(
			'wc_ajax_wc_bolt_save_email',
			array( $this, 'record_event_on_save_email' ), 5
		);
		// Add action for record step 3 of checkout funnel when we calculate shipping options
		add_filter(
			'wc_bolt_after_load_shipping_options',
			array( $this, 'after_load_shipping_options' ), 10, 2
		);
		// Add action for fix GA event options
		add_filter(
			'wc_google_analytics_pro_api_ec_checkout_option_parameters',
			array( $this, 'ec_checkout_option_parameters' )
		);
	}

	/**
	 * Return true if we should support the plugin
	 */
	public static function is_enabled() {
		return apply_filters( 'bolt_woocommerce_is_wc_google_analytics_pro_enabled', function_exists( 'wc_google_analytics_pro' ) );
	}

	/**
	 * Save GA cookies on our session table
	 *
	 * @param array $data data should be saved in our session table
	 * @param $type not used
	 * @param $order_id not used
	 *
	 * @return array
	 *
	 * @since 2.2.0
	 */
	public function update_cart_session( $data, $type, $order_id ) {
		if ( isset( $_COOKIE[ SELF::GA_COOKIE_NAME ] ) ) {
			$data[ BOLT_FIELD_NAME_ADDITIONAL ][ SELF::GA_COOKIE_NAME ] = $_COOKIE[ SELF::GA_COOKIE_NAME ];
		}

		return $data;
	}

	/**
	 * Restore GA cookies from session data
	 *
	 * @param string $reference order reference, not used
	 * @param array $original_session_data session data
	 *
	 * @since 2.2.0
	 */
	public function after_set_cart_by_bolt_reference( $reference, $original_session_data ) {
		if ( isset( $original_session_data[ BOLT_FIELD_NAME_ADDITIONAL ][ SELF::GA_COOKIE_NAME ] ) ) {
			$_COOKIE[ SELF::GA_COOKIE_NAME ] = $original_session_data[ BOLT_FIELD_NAME_ADDITIONAL ][ SELF::GA_COOKIE_NAME ];
		}
	}

	/**
	 * Add Ajax call when we start checkout
	 *
	 * @param array $template_params tempate parameters
	 * @param array $render_bolt_checkout_params not used
	 *
	 * @return array
	 *
	 * @since 2.2.0
	 */
	public function add_ajax_call_when_start_checkout( $template_params, $render_bolt_checkout_params ) {
		$template_params['check'] .= "jQuery.ajax({ type: 'POST', url: get_ajax_url('start_checkout') });";

		return $template_params;
	}


	/**
	 * Record step 1 of checkout funnel when we open checkout modal
	 *
	 * @since 2.2.0
	 */
	public function record_event_on_start_checkout() {
		$properties = array(
			'eventCategory'  => 'Checkout',
			'nonInteraction' => true,
		);
		$ec         = array( 'checkout_option' => array( 'step' => 1, 'option' => BOLT_PLUGIN_NAME ) );
		wc_google_analytics_pro()->get_integration()->api_record_event( 'started checkout', $properties, $ec );
	}

	/**
	 * Record step 2 of checkout funnel when we user provides email
	 *
	 * @since 2.2.0
	 */
	public function record_event_on_save_email() {
		$properties = array(
			'eventCategory'  => 'Checkout',
			'nonInteraction' => true,
		);
		$ec         = array( 'checkout_option' => array( 'step' => 2, 'option' => BOLT_PLUGIN_NAME ) );
		wc_google_analytics_pro()->get_integration()->api_record_event( 'provided billing email', $properties, $ec );
	}

	/**
	 * Record step 3 of checkout funnel when we calculate shipping options
	 * We use action wc_bolt_after_load_shipping_options for that so function should get $shipping_options
	 * and return it without changes
	 *
	 * @param array $shipping_options
	 * @param $bolt_order
	 *
	 * @return array - unchanged shipping options
	 *
	 * @since 2.2.0
	 */
	public function after_load_shipping_options( $shipping_options, $bolt_order ) {
		$properties = array(
			'eventCategory'  => 'Checkout',
			'nonInteraction' => true,
		);
		$ec         = array( 'checkout_option' => array( 'step' => 3, 'option' => BOLT_PLUGIN_NAME ) );
		wc_google_analytics_pro()->get_integration()->api_record_event( 'selected payment method', $properties, $ec );

		return $shipping_options;
	}

	/**
	 * Fix GA event options
	 *
	 * We need to use product action 'checkout,' but the plugin can use it only after WooC order creation
	 * So we use the product action 'checkout option' and change it to 'checkout' before the plugin sends it.
	 *
	 * @param array $params
	 *
	 * @return array
	 * @since 2.2.0
	 */
	public function ec_checkout_option_parameters( $params ) {
		if ( $params['col'] == BOLT_PLUGIN_NAME && $params['pa'] == 'checkout_option' ) {
			$params['pa']  = 'checkout';
			$params['col'] = '';
		}

		return $params;
	}
}

new WC_Google_Analytics_Pro();

