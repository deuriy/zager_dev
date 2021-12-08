<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="Container Container-product">
	<div class="Product_notices">
		<?php

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

</div>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	// do_action( 'woocommerce_before_single_product_summary' );
	?>

	<!-- <div class="Product_notices"> -->
		<?php //wc_print_notices(); ?>
		<!-- </div> -->

		<?php
			opcache_reset();
			// $reviews_count = count($field['customer_reviews']['customer_reviews']);
			// print '<pre>';
			// print get_field('special_label');
			// print_r(get_field('after_product_left', $product->get_id()));
			// print '</pre>';
		?>

		<div class="Product_info">
			<?php woocommerce_show_product_sale_flash(); ?>

			<div class="Product_specialLabel">
				<?php if (get_field('display_special_label') == 'yes'): ?>
					<?php the_field('special_label') ?>
				<?php endif ?>
			</div>

			<?php woocommerce_template_single_title(); ?>

			<div class="Product_ratingWrapper">
				<div class="RatingStars">
					<ul class="RatingStars_list">
						<li class="RatingStars_item RatingStars_item-filled"></li>
						<li class="RatingStars_item RatingStars_item-filled"></li>
						<li class="RatingStars_item RatingStars_item-filled"></li>
						<li class="RatingStars_item RatingStars_item-filled"></li>
						<li class="RatingStars_item RatingStars_item-filled"></li>
					</ul>
				</div>
				<a class="Product_reviewsLabel" href="#ReviewsSection">345 reviews</a>
			</div>
		</div>

		<?php get_product_image_slider($product->get_id()); ?>

		<div class="Product_descriptionWrapper">
			<div class="Product_description Product_description-truncated">
				<?php the_content(); ?>
			</div>
			<a class="Product_descToggleLink" href="#">Read more</a>
		</div>

		<div class="PriceCard PriceCard-productOptions Product_priceCard hidden-mdPlus">
			<div class="PriceCard_price">$2,595</div>
			<div class="PriceCard_description">
				<p>Starting at <strong>$72/mo</strong> with <img src="img/affirm_logo.webp" alt="Affirm logo"></p>
			</div>
			<a class="BtnYellow BtnYellow-priceCard PriceCard_btn" href="#ProductSizesMobilePopup" data-action="openMobilePopup">See options</a>
		</div>

		<?php get_template_part('partials/blocks/product-quote'); ?>

		<!-- <div class="Accordion Product_accordion hidden-smPlus">
			<div class="AccordionPanel Accordion_item">
				<h3 class="AccordionPanel_title">Features</h3>
				<div class="AccordionPanel_content">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ex rem qui consectetur at quaerat nostrum, commodi esse cumque accusantium dolorum? Saepe reprehenderit laborum earum necessitatibus accusantium molestiae, dolore repellendus!</p>
				</div>
			</div>
			<div class="AccordionPanel Accordion_item">
				<h3 class="AccordionPanel_title">Specifications</h3>
				<div class="AccordionPanel_content">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ex rem qui consectetur at quaerat nostrum, commodi esse cumque accusantium dolorum? Saepe reprehenderit laborum earum necessitatibus accusantium molestiae, dolore repellendus!</p>
				</div>
			</div>
			<div class="AccordionPanel Accordion_item">
				<h3 class="AccordionPanel_title">Finance</h3>
				<div class="AccordionPanel_content">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ex rem qui consectetur at quaerat nostrum, commodi esse cumque accusantium dolorum? Saepe reprehenderit laborum earum necessitatibus accusantium molestiae, dolore repellendus!</p>
				</div>
			</div>
			<div class="AccordionPanel Accordion_item">
				<h3 class="AccordionPanel_title">FAQ</h3>
				<div class="AccordionPanel_content">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ex rem qui consectetur at quaerat nostrum, commodi esse cumque accusantium dolorum? Saepe reprehenderit laborum earum necessitatibus accusantium molestiae, dolore repellendus!</p>
				</div>
			</div>
		</div> -->

		<?php display_product_tabs(); ?>

		<div class="Product_optionsBtnWrapper hidden-mdPlus">
			<a class="BtnYellow BtnYellow-productOptions Product_optionsBtn" href="#ProductSizesMobilePopup" data-action="openMobilePopup">See options</a>
		</div>

		<?php
	/**
	 * Hook: woocommerce_single_product_summary.
	 *
	 * @hooked woocommerce_template_single_title - 5
	 * @hooked woocommerce_template_single_rating - 10
	 * @hooked woocommerce_template_single_price - 10
	 * @hooked woocommerce_template_single_excerpt - 20
	 * @hooked woocommerce_template_single_add_to_cart - 30
	 * @hooked woocommerce_template_single_meta - 40
	 * @hooked woocommerce_template_single_sharing - 50
	 * @hooked WC_Structured_Data::generate_product_data() - 60
	 */
	// do_action( 'woocommerce_single_product_summary' );
	?>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
</div>

<?php render_page_layouts(get_field('after_product_left')); ?>

<?php //do_action( 'woocommerce_after_single_product' ); ?>
