<?php
/*
Template Name: Cart Page Template
*/

// Exit if accessed directly.
get_header();

$layouts = get_field('page_blocks');

if ($layouts) {
	$before_content_blocks = [];
	$after_content_blocks = [];
	$bottom_blocks = [];

	foreach ($layouts as $layout) {
		if (isset($layout['block_position'])) {
			switch ($layout['block_position']) {
				case 'before_content':
					$before_content_blocks[] = $layout;
					break;
				case 'after_content':
					$after_content_blocks[] = $layout;
					break;
				case 'bottom':
					$bottom_blocks[] = $layout;
					break;
				default:
					$bottom_blocks[] = $layout;
					break;
			}
		} else {
			$bottom_blocks[] = $layout;
		}
	}
}
?>

<main class="Main">
	<div class="Product Product-cartPage" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="Product_wrapper">
			<div class="Product_content">
				<div class="Container Container-cart">
					<h2 class="SectionTitle SectionTitle-cartPage Product_title">
						<?php the_title(); ?>
					</h2>
					
					<?php render_page_layouts($before_content_blocks); ?>

					<?php the_content(); ?>

					<?php render_page_layouts($after_content_blocks); ?>
				</div><!-- .entry-content -->
			</div>

			<div class="Sidebar Sidebar-cartPage Product_sidebar">
				<div class="Shipping Sidebar_shipping">
					<h3 class="Shipping_title">Shipping</h3>
					<div class="Shipping_type">Free</div>
					<div class="Shipping_text">
						<p>Free Shipping - 52 year anniversary sale!</p>
					</div>
				</div>
				<div class="SubTotal Sidebar_subTotal">
					<div class="SubTotal_label">Sub total</div>
					<div class="SubTotal_cost">
						<?php echo WC()->cart->get_cart_total(); ?>
					</div>
				</div>
				<div class="Sidebar_checkoutBtnWrapper">
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward BtnYellow BtnYellow-cartSidebar">
						<?php esc_html_e( 'Checkout', 'woocommerce' ); ?>
					</a>
				</div>
				<div class="PaymentMethods Sidebar_paymentMethods">
					<img src="<?php echo get_template_directory_uri(); ?>/images/payment_methods.webp" alt="" class="PaymentMethods_img">
					<div class="PaymentMethods_text">
						<p>We accept all major payment methods</p>
					</div>
				</div>
				<div class="FinancingPurchase">
					<div class="FinancingPurchase_text">
						<strong>Finance this purchase</strong>
					</div>
					<div class="FinancingPurchase_textAndLogo">
						<div class="FinancingPurchase_text">
							Starting at <strong>$72/mo</strong> with
						</div>
						<img src="<?php echo get_template_directory_uri(); ?>/images/affirm_logo.svg" alt="">
					</div>
					<a href="#" class="BtnGrey BtnGrey-totalPrice FinancingPurchase_prequalifyBtn">Prequalify now</a>
				</div>
			</div>
		</div>

		<?php render_page_layouts($bottom_blocks); ?>

	</div><!-- #post-## -->
</main>

<?php get_footer(); ?>
