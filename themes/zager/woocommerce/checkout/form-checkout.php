<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'understrap' ) ) );
	return;
}

?>

<div class="Container">
	<div class="multistage-form woocommerce__multistage-form" id="multistage-form">
		<ul class="stages__list multistage-form__stages-list">
			<li class="stages__item">Cart</li>
			<li class="stages__item stages__item--current" data-stage-index="0">Information</li>
			<li class="stages__item" data-stage-index="1">Shipping</li>
			<li class="stages__item" data-stage-index="2">Payment</li>
		</ul>
		<div class="multistage-form__summary">

			<!-- <h3 id="order_review_heading"><?php //esc_html_e( 'Your order', 'understrap' ); ?></h3> -->

			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>

			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>

		<form name="checkout" method="post" class="checkout woocommerce-checkout multistage-form__checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

			<?php if ( $checkout->get_checkout_fields() ) : ?>

				<div class="stage-blocks multistage-form__stage-blocks">
					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

					<div class="stage-block multistage-form__stage-block multistage-form__stage-block--current" id="customer_details" data-stage-index="0">
						<div class="express-checkout checkout__express-checkout">
							<h4 class="express-checkout__label">Express checkout</h4>
							<div class="express-checkout__payment-methods">
								<div class="express-checkout__payment-method">
									<div class="express-checkout__payment-method-img-wrapper">
										<img src="<?php echo get_template_directory_uri(); ?>/img/paypal.svg" alt="" loading="lazy">
									</div>
								</div>
								<div class="express-checkout__payment-method">
									<div class="express-checkout__payment-method-img-wrapper">
										<img src="<?php echo get_template_directory_uri(); ?>/img/affirm.svg" alt="" loading="lazy">
									</div>
									<div class="express-checkout__payment-method-description">
										Starting at $91/mo with Affirm. <a href="#">Learn more</a>
									</div>
								</div>
							</div>
							<div class="express-checkout__text">
								<div class="express-checkout__text-inner">or</div>
							</div>
						</div>
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>

					<div class="stage-block multistage-form__stage-block" id="customer_details2" data-stage-index="1">
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>

					<div class="stage-block multistage-form__stage-block" data-stage-index="2">
						<h3 class="stage-block__title">Payment</h3>
						<div class="stage-block__description">
							<p>All transactions are secure and encrypted.</p>
						</div>
						<?php woocommerce_checkout_payment(); ?>
					</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
				</div>

			<?php endif; ?>

			<div class="multistage-form__buttons multistage-form__buttons--justify-end">
				<button type="button" class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-multistepForm multistage-form__step-btn hidden" data-action="prevStep">Prev</button>
				<button type="button" class="BtnYellow BtnYellow-multistepForm multistage-form__step-btn" data-action="nextStep">Next</button>
			</div>

		</form>
	</div>
</div>

<?php
// do_action( 'woocommerce_after_checkout_form', $checkout );
