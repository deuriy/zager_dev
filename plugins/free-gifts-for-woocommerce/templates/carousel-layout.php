<?php
/**
 * This template displays contents inside carousel layout
 *
 * This template can be overridden by copying it to yourtheme/free-gifts-for-woocommerce/gift-products.php
 *
 * To maintain compatibility, Free Gifts for WooCommerce will update the template files and you have to copy the updated files to your theme
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit ; // Exit if accessed directly.
}
?>
<div class="fgf_gift_products_wrapper">
	<?php
	/**
	 * Hook: fgf_before_gift_products_content
	 */
	do_action( 'fgf_before_gift_products_content' ) ;
	?>
	<h3><?php echo esc_html( get_option( 'fgf_settings_free_gift_heading_label' ) ) ; ?></h3>
	<div class="fgf-gift-products-content">
		<div class="fgf-owl-carousel-items owl-carousel">

			<?php
			foreach ( $gift_products as $key => $gift_product ) :

				$link_classes = array( 'fgf_add_to_cart_link' ) ;
				if ( $gift_product[ 'hide_add_to_cart' ] ) {
					$link_classes[] = 'fgf_disable_links' ;
				}

				$_product = wc_get_product( $gift_product[ 'parent_id' ] ) ;
				?>

				<div class="fgf-owl-carousel-item fgf-owl-carousel-item<?php echo esc_attr( $key ) ; ?>">

					<?php fgf_render_product_image( $_product ) ; ?>
					<h5><?php fgf_render_product_name( $_product ) ; ?></h5>
					<span class="<?php echo esc_attr( implode( ' ' , $link_classes ) ) ; ?>">

						<?php if ( fgf_check_is_array( $gift_product[ 'variation_ids' ] ) ) : ?>
							<select class="fgf-product-variations" data-rule_id="<?php echo esc_attr( $gift_product[ 'rule_id' ] ) ; ?>">
								<?php
								foreach ( $gift_product[ 'variation_ids' ] as $variation_id ) :
									$_variation = wc_get_product( $variation_id ) ;
									?>
									<option value="<?php echo esc_attr( $_variation->get_id() ) ; ?>"><?php echo esc_html( $_variation->get_name() ) ; ?></option>
								<?php endforeach ; ?>
							</select>
						<?php endif ; ?>

						<a class="<?php echo esc_attr( implode( ' ' , fgf_get_gift_product_add_to_cart_classes() ) ) ; ?>" 
						   data-product_id="<?php echo esc_attr( $gift_product[ 'product_id' ] ) ; ?>" 
						   data-rule_id="<?php echo esc_attr( $gift_product[ 'rule_id' ] ) ; ?>" 
						   href="<?php echo esc_url( fgf_get_gift_product_add_to_cart_url( $gift_product ) ) ; ?>">
							   <?php echo esc_html( get_option( 'fgf_settings_free_gift_add_to_cart_button_label' ) ) ; ?>
						</a>
					</span>
				</div>
			<?php endforeach ; ?> 
		</div>
	</div>
	<?php
	/*
	 * Hook: fgf_after_gift_products_content
	 */

	do_action( 'fgf_after_gift_products_content' ) ;
	?>
	<input type="hidden" id="fgf_gift_products_type" value='<?php echo esc_attr( $mode ) ; ?>'>
</div>
<?php

