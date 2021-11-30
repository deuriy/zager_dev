<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

if ( $product->is_in_stock() ) : ?>

	<div class="ProductOptions Sidebar_productOptions">
		<div class="ProductOptions_inner">

			<?php echo wc_get_stock_html( $product ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

			<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

			<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
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

				<div class="TotalPrice TotalPrice-productOptions">
					<div class="TotalPrice_textWrapper">
						<div class="TotalPrice_price"><?php echo $product->get_price_html(); ?></div>
						<div class="TotalPrice_textAndBtn">
							<div class="TotalPrice_text">Starting at <strong>$72/mo</strong> with <img class="TotalPrice_affirmLogo" src="<?php echo get_template_directory_uri(); ?>/img/affirm_logo.webp" alt="Affirm logo"></div><a class="BtnGrey BtnGrey-totalPrice TotalPrice_prequalifyBtn" href="#">Prequalify now</a>
						</div>
					</div>
					<div class="TotalPrice_buttons">
						<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-outline-primary BtnYellow BtnYellow-totalPrice TotalPrice_btn"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
					</div>
				</div>

				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>
		</div>
	</div>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

	<?php
endif;
