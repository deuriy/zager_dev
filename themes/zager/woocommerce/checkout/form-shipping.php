<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-additional-fields">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<!-- <h3 class="woocommerce-billing-fields__title"><?php //esc_html_e( 'Additional information', 'woocommerce' ); ?></h3> -->
			<h3 class="woocommerce-billing-fields__title"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<div class="shipping-location">
				<div class="shipping-location__field">
					<div class="shipping-location__label">Ship to:</div>
					<div class="shipping-location__text">4111 Richison Drive, Bozeman, Montana,  59715, United States</div>
					<div class="shipping-location__old-price">$396</div>
					<div class="shipping-location__type">Free</div>
				</div>
				<div class="shipping-location__title">Free Shipping - 52 anniversary sale</div>
			</div>
			
			<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div>

<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

		<!-- <div class="radio-group">
			<h3 class="radio-group__title">Billing Address</h3>
			<div class="radio-group__items">
				<div class="radio radio-group__item">
					<input type="radio" name="same_as_billing_address" id="billing_address_yes" value="yes">
					<label for="billing_address_yes">Same as shipping address</label>
				</div>
				<div class="radio radio-group__item">
					<input type="radio" name="same_as_billing_address" id="billing_address_no" value="no">
					<label for="billing_address_no">Use a different billing addresss</label>
				</div>
			</div>
		</div> -->

		<h3 id="ship-to-different-address" class="ship-to-different-address">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php esc_html_e( 'Ship to a different address?', 'woocommerce' ); ?></span>
			</label>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<div class="woocommerce-shipping-fields__field-wrapper">
				<?php
				$fields = $checkout->get_checkout_fields( 'shipping' );

				// print '<pre>';
				// print_r($fields);
				// print '</pre>';

				// foreach ( $fields as $key => $field ) {
				// 	woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				// }
				?>

				<div class="checkout-fieldgroup checkout-fieldgroup--shipping checkout-fields__group">
					<div class="checkout-fieldgroup__fields">
						<div class="checkout-fieldgroup__fields-row checkout-fieldgroup__fields-row--single">
							<div class="checkout-fieldgroup__field">
								<?php woocommerce_form_field( 'shipping_address_1', $fields['shipping_address_1'], $checkout->get_value( 'shipping_address_1' ) ); ?>
							</div>
						</div>
						<div class="checkout-fieldgroup__fields-row">
							<div class="checkout-fieldgroup__field">
								<?php woocommerce_form_field( 'shipping_address_2', $fields['shipping_address_2'], $checkout->get_value( 'shipping_address_2' ) ); ?>
							</div>
							<div class="checkout-fieldgroup__field">
								<?php woocommerce_form_field( 'shipping_city', $fields['shipping_city'], $checkout->get_value( 'shipping_city' ) ); ?>
							</div>
						</div>
						<div class="checkout-fieldgroup__fields-row">
							<div class="checkout-fieldgroup__field">
								<?php woocommerce_form_field( 'shipping_country', $fields['shipping_country'], $checkout->get_value( 'shipping_country' ) ); ?>
							</div>
							<div class="checkout-fieldgroup__field">
								<?php woocommerce_form_field( 'shipping_state', $fields['shipping_state'], $checkout->get_value( 'shipping_state' ) ); ?>
							</div>
						</div>
						<div class="checkout-fieldgroup__fields-row">
							<div class="checkout-fieldgroup__field">
								<?php woocommerce_form_field( 'shipping_postcode', $fields['shipping_postcode'], $checkout->get_value( 'shipping_postcode' ) ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>
</div>
