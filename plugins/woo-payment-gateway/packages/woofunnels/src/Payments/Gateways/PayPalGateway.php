<?php


namespace PaymentPlugins\WooFunnels\Braintree\Payments\Gateways;


use PaymentPlugins\WooFunnels\Braintree\Client;

class PayPalGateway extends BasePaymentGateway {

	public $key = 'braintree_paypal';

	public function __construct( ...$args ) {
		parent::__construct( ...$args );
		add_filter( 'wc_braintree_get_paypal_flow', [ $this, 'get_paypal_flow' ] );
	}

	public function get_paypal_flow( $type ) {
		if ( $type !== \PaymentPlugins\WC_Braintree_Constants::PAYPAL_VAULT ) {
			if ( $this->is_enabled() ) {
				$type = \PaymentPlugins\WC_Braintree_Constants::PAYPAL_VAULT;
			}
		}

		return $type;
	}

}