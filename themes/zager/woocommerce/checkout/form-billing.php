<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<!-- <h3 class="woocommerce-billing-fields__title"><?php //esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3> -->

	<?php else : ?>

		<!-- <h3 class="woocommerce-billing-fields__title"><?php //esc_html_e( 'Billing details', 'woocommerce' ); ?></h3> -->

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper checkout-fields">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );

		// print '<pre>';
		// print_r($fields);
		// print '</pre>';

		// foreach ( $fields as $key => $field ) {
		// 	print '<pre>';
		// 	print_r($field);
		// 	print '</pre>';

		// 	woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		// }
		?>

		<div class="checkout-fieldgroup checkout-fields__group">
			<div class="checkout-fieldgroup__header">
				<h3 class="checkout-fieldgroup__title">Contact Information</h3>
				<?php if (!is_user_logged_in()): ?>
					<div class="checkout-fieldgroup__description">
						<p>Already  &nbsp;have an account? <a href="<?php echo wp_login_url(); ?>">Log in</a></p>
					</div>
				<?php endif ?>
			</div>
			<div class="checkout-fieldgroup__fields">
				<div class="checkout-fieldgroup__fields-row">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_email', $fields['billing_email'], $checkout->get_value( 'billing_email' ) ); ?>
					</div>
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_phone', $fields['billing_phone'], $checkout->get_value( 'billing_phone' ) ); ?>
					</div>
				</div>
				<div class="checkout-fieldgroup__fields-row checkout-fieldgroup__fields-row--single checkout-fieldgroup__fields-row--checkbox">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'kl_newsletter_checkbox', $fields['kl_newsletter_checkbox'], $checkout->get_value( 'kl_newsletter_checkbox' ) ); ?>
					</div>
				</div>
				<div class="checkout-fieldgroup__fields-row">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_first_name', $fields['billing_first_name'], $checkout->get_value( 'billing_first_name' ) ); ?>
					</div>
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_last_name', $fields['billing_last_name'], $checkout->get_value( 'billing_last_name' ) ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="checkout-fieldgroup checkout-fieldgroup--shipping checkout-fields__group">
			<div class="checkout-fieldgroup__header">
				<h3 class="checkout-fieldgroup__title">Shipping Information</h3>
			</div>
			<div class="checkout-fieldgroup__fields">
				<div class="checkout-fieldgroup__fields-row checkout-fieldgroup__fields-row--single">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_address_1', $fields['billing_address_1'], $checkout->get_value( 'billing_address_1' ) ); ?>
					</div>
				</div>
				<div class="checkout-fieldgroup__fields-row">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_address_2', $fields['billing_address_2'], $checkout->get_value( 'billing_address_2' ) ); ?>
					</div>
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_city', $fields['billing_city'], $checkout->get_value( 'billing_city' ) ); ?>
					</div>
				</div>
				<div class="checkout-fieldgroup__fields-row">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_country', $fields['billing_country'], $checkout->get_value( 'billing_country' ) ); ?>
					</div>
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_state', $fields['billing_state'], $checkout->get_value( 'billing_state' ) ); ?>
					</div>
				</div>
				<div class="checkout-fieldgroup__fields-row">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'billing_postcode', $fields['billing_postcode'], $checkout->get_value( 'billing_postcode' ) ); ?>
					</div>
				</div>
				<div class="checkout-fieldgroup__fields-row checkout-fieldgroup__fields-row--single checkout-fieldgroup__fields-row--checkbox">
					<div class="checkout-fieldgroup__field">
						<?php woocommerce_form_field( 'save_user_info', $fields['save_user_info'], $checkout->get_value( 'save_user_info' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
