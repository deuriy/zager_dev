<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.1
 *
 * Modified to use radio buttons instead of dropdowns
 * @author 8manos
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $woocommerce;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<div class="ProductOptions Sidebar_productOptions">
	<a class="Offer ProductOptions_offer" href="#">Try this guitar for 30 days. Includes free shipping both ways.
	</a>
	<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
		<?php do_action( 'woocommerce_before_variations_form' ); ?>

		<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
			<p class="stock out-of-stock">
				<?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?>
			</p>
		<?php else : ?>
			<div class="ProductOptions_variationsBlocks">
				<?php foreach ( $attributes as $name => $options ) : ?>
					<div class="VariationsBlock ProductOptions_variationsBlock">
						<?php $sanitized_name = sanitize_title( $name ); ?>
						<div class="attribute-<?php echo esc_attr( $sanitized_name ); ?>">
							<div class="VariationsBlock_header">
								<h3 class="VariationsBlock_title"><?php echo wc_attribute_label( $name ); ?></h3>
								<a class="FancyboxPopupLink VariationsBlock_link" href="#" data-src="#CompareSizesPopup">Compare Sizes</a>
							</div>
							<?php
							if ( isset( $_REQUEST[ 'attribute_' . $sanitized_name ] ) ) {
								$checked_value = $_REQUEST[ 'attribute_' . $sanitized_name ];
							} elseif ( isset( $selected_attributes[ $sanitized_name ] ) ) {
								$checked_value = $selected_attributes[ $sanitized_name ];
							} else {
								$checked_value = '';
							}
							?>
							<div class="Variations VariationsBlock_items">
								<?php
								if ( ! empty( $options ) ) {
									if ( taxonomy_exists( $name ) ) {
									// Get terms if this is a taxonomy - ordered. We need the names too.
										$terms = wc_get_product_terms( $product->get_id(), $name, array( 'fields' => 'all' ) );

										foreach ( $terms as $term ) {
											if ( ! in_array( $term->slug, $options ) ) {
												continue;
											}
											custom_print_attribute_radio( $checked_value, $term->slug, $term->name, $sanitized_name );
										}
									} else {
										foreach ( $options as $option ) {
											custom_print_attribute_radio( $checked_value, $option, $option, $sanitized_name );
										}
									}
								}

							// echo end( $attribute_keys ) === $name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
								?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="TotalPrice TotalPrice-productOptions ProductOptions_totalPrice">
				<div class="TotalPrice_textWrapper">
					<?php //woocommerce_template_single_price(); ?>
					<div class="TotalPrice_price"><?php echo $product->get_price_html(); ?></div>
					<div class="TotalPrice_textAndBtn">
						<div class="TotalPrice_text">Starting at <strong>$72/mo</strong> with <img class="TotalPrice_affirmLogo" src="<?php echo get_template_directory_uri(); ?>/img/affirm_logo.webp" alt="Affirm logo"></div><a class="BtnGrey BtnGrey-totalPrice TotalPrice_prequalifyBtn" href="#">Prequalify now</a>
					</div>
				</div>
				<?php
				if ( version_compare($woocommerce->version, '3.4.0') < 0 ) {
					do_action( 'woocommerce_before_add_to_cart_button' );
				}
				?>

				<div class="single_variation_wrap">
					<?php
					do_action( 'woocommerce_before_single_variation' );
					do_action( 'woocommerce_single_variation' );
					do_action( 'woocommerce_after_single_variation' );
					?>
				</div>

				<?php
				if ( version_compare($woocommerce->version, '3.4.0') < 0 ) {
					do_action( 'woocommerce_after_add_to_cart_button' );
				}
				?>
			</div>

			
		<?php endif; ?>

		<?php do_action( 'woocommerce_after_variations_form' ); ?>
	</form>
</div>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
