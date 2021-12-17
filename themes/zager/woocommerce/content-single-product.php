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

	<div class="Product_notices">
		<?php wc_print_notices(); ?>
	</div>

		<?php
		$id = $product->get_id();
		$product_left_blocks = get_field('after_product_left', $id);
		$reviews_count = 0;

		if ($product_left_blocks) {
			$product_layouts_names = array_column($product_left_blocks, 'customer_reviews');

			if ($product_layouts_names) {
				$reviews = array_column($product_layouts_names, 'customer_reviews');

				if ($reviews) {
		  		$reviews_count = count($reviews[0]);
				}
			}
		}
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
				<?php if ($reviews_count != 0): ?>
					<div class="RatingStars">
						<ul class="RatingStars_list">
							<li class="RatingStars_item RatingStars_item-filled"></li>
							<li class="RatingStars_item RatingStars_item-filled"></li>
							<li class="RatingStars_item RatingStars_item-filled"></li>
							<li class="RatingStars_item RatingStars_item-filled"></li>
							<li class="RatingStars_item RatingStars_item-filled"></li>
						</ul>
					</div>
					<a class="Product_reviewsLabel" href="#ReviewsSection">
						<?php echo $reviews_count ?> reviews
					</a>
				<?php endif ?>
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
			<div class="PriceCard_price">
				<?php echo $product->get_price_html() ?>
			</div>

			<div class="PriceCard_description">
				<p>Starting at <strong>$72/mo</strong> with <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/affirm_logo.webp" alt="Affirm logo"></p>
			</div>

			<?php if ($product->is_type('simple')): ?>
				<a class="BtnYellow BtnYellow-productOptions Product_optionsBtn" href="#TotalPriceMobilePopup" data-action="openMobilePopup">See options</a>
			<?php else: ?>
				<?php
					$attributes = $product->get_variation_attributes();
					$attribute_keys = array_keys( $attributes );
					$sanitized_first_attribute = sanitize_title( $attribute_keys[0] );
				?>

				<a class="BtnYellow BtnYellow-priceCard PriceCard_btn" href="#MobilePopup-<?php echo $sanitized_first_attribute ?>" data-action="openMobilePopup">See options</a>
			<?php endif ?>
			
		</div>

		<?php get_template_part('partials/blocks/product-quote'); ?>

		<?php
			$selected_product_tabs = get_field('display_product_tabs');

			if ($selected_product_tabs):
				$product_tabs = [
					'features' => [
						'title' => get_field('override_features_tab_title') === 'yes' ? get_field('features_tab_title') : 'Features',
						'fields' => get_field('features_tab_blocks')
					],
					'specifications' => [
						'title' => get_field('override_specifications_tab_title') === 'yes' ? get_field('specifications_tab_title') : 'Specifications',
						'fields' => get_field('specifications_tab_blocks')
					],
					'finance' => [
						'title' => get_field('override_finance_tab_title') === 'yes' ? get_field('finance_tab_title') : 'Finance',
						'fields' => get_field('finance_tab_blocks')
					],
					'faq' => [
						'title' => get_field('override_faq_tab_title') === 'yes' ? get_field('faq_tab_title') : 'FAQ',
						'fields' => get_field('faq_tab_blocks')
					]
				];
			?>

			<div class="Accordion hidden-smPlus">
				<?php foreach ($selected_product_tabs as $key => $selected_tab): ?>
					<div class="AccordionPanel Accordion_item">
						<h3 class="AccordionPanel_title">
							<?php echo $product_tabs[$selected_tab]['title'] ?>
						</h3>

						<div class="AccordionPanel_content">
							<?php
							$selected_tab_fields = $product_tabs[$selected_tab]['fields'];
							render_page_layouts($selected_tab_fields);
							?>
						</div>
					</div>
				<?php endforeach ?>
			</div>

			<div class="Tabs Tabs-defaultStyle Tabs-product hidden-xs">
				<ul class="Tabs_list">
					<?php foreach ($selected_product_tabs as $key => $selected_tab): ?>
						<li class="Tabs_item<?php echo $key === 0 ? ' Tabs_item-active' : '' ?>">
							<?php echo $product_tabs[$selected_tab]['title'] ?>
						</li>
					<?php endforeach ?>
				</ul>

				<div class="Tabs_container">
					<?php foreach ($selected_product_tabs as $key => $selected_tab): ?>
						<div class="Tabs_content<?php echo $key === 0 ? ' Tabs_content-active' : '' ?>">
							<?php
							$selected_tab_fields = $product_tabs[$selected_tab]['fields'];
							render_page_layouts($selected_tab_fields);
							?>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="Product_optionsBtnWrapper hidden-mdPlus">
			<?php if ($product->is_type('simple')): ?>
				<a class="BtnYellow BtnYellow-productOptions Product_optionsBtn" href="#TotalPriceMobilePopup" data-action="openMobilePopup">See options</a>
			<?php else: ?>
				<?php
					$attributes = $product->get_variation_attributes();
					$attribute_keys = array_keys( $attributes );
					$sanitized_first_attribute = sanitize_title( $attribute_keys[0] );
				?>

				<a class="BtnYellow BtnYellow-productOptions Product_optionsBtn" href="#MobilePopup-<?php echo $sanitized_first_attribute ?>" data-action="openMobilePopup">See options</a>
			<?php endif ?>
		</div>
</div>
</div>

<?php render_page_layouts(get_field('after_product_left')); ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
