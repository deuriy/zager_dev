<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // phpcs:ignore WordPress.Security.NonceVerification, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

	<div class="TotalPrice_textWrapper">
		<div class="TotalPrice_textAndBtn">
			<div class="TotalPrice_text">Starting at <strong>$72/mo</strong> with <img class="TotalPrice_affirmLogo" src="<?php echo get_template_directory_uri(); ?>/img/affirm_logo.webp" alt="Affirm logo"></div>
			<a class="BtnGrey BtnGrey-totalPrice TotalPrice_prequalifyBtn" href="#">Prequalify now</a>
		</div>
	</div>

	<div class="TotalPrice_buttons">
		<?php if (wp_is_mobile()): ?>
			<button name="add-to-cart" type="submit" class="single_add_to_cart_button BtnYellow BtnYellow-totalPrice TotalPrice_btn">Add to cart</button>

			<button name="add-to-cart-checkout" type="submit" class="BtnOutline BtnOutline-totalPrice BtnOutline-darkText BtnOutline-lightBeigeBg TotalPrice_btn">Checkout</button>
		<?php else: ?>
			<button name="add-to-cart" type="submit" class="single_add_to_cart_button BtnYellow BtnYellow-totalPrice TotalPrice_btn">
				Try this guitar now!
			</button>

			<button name="add-to-cart-checkout" type="submit" class="BtnOutline BtnOutline-totalPrice BtnOutline-darkText BtnOutline-lightBeigeBg TotalPrice_btn">
				View total with shipping
			</button>
		<?php endif ?>
	</div>
	

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
