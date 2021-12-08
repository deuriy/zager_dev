<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

opcache_reset();

$id = $product->get_id();
$product_image = $product->get_image('full', array('class' => 'ProductCard_img'));
$product_attributes = $product->get_attributes();
$product_url = get_permalink($id);
$additional_labels = get_field('additional_labels', $id);
$has_save_label = false;

if ($product->get_short_description()) {
  $product_description = $product->get_short_description();
} else {
  $product_description = wp_trim_words($product->get_description(), 18, '...');
}
?>

<div <?php wc_product_class( 'ProductCard ProductCard-twoColumnLg Products_item', $product ); ?>>
  <div class="ProductCard_wrapper">
  	<?php if ($product_image || $additional_labels): ?>
      <div class="ProductCard_imgWrapper">
        <?php if ($product_image): ?>
        	<a href="<?php echo $product_url ?>">
          	<?php echo $product_image ?>
          </a>
        <?php endif ?>

        <?php if ($additional_labels): ?>
          <?php foreach ($additional_labels as $additional_label): ?>
            <?php if ($additional_label['value'] == 'special_addition'): ?>
              <span class="Label Label-productCard ProductCard_label">
                <?php echo $additional_label['label'] ?>
              </span>
            <?php endif ?>

            <?php if ($additional_label['value'] == 'save'): ?>
              <?php
              	$has_save_label = true;
                $discount = get_field('discount', $id);
              ?>

              <?php if ($discount): ?>
              	<span class="Tag Tag-productCard ProductCard_tag">
              		<?php echo $additional_label['label'] . ' ' . $discount . '%' ?>
              	</span>
              <?php else: ?>
              	<span class="Tag Tag-stars ProductCard_tag">
              		<?php echo esc_html__( 'On sale!', 'woocommerce' ) ?>
              	</span>
              <?php endif ?>
            <?php endif ?>
          <?php endforeach ?>

          <?php if ($product->is_on_sale() && !$has_save_label): ?>
          	<span class="Tag Tag-stars ProductCard_tag">
          		<?php echo esc_html__( 'Sale!', 'woocommerce' ) ?>
          	</span>
          <?php endif ?>
        <?php endif ?>
      </div>
    <?php endif ?>

    <div class="ProductCard_textWrapper">
      <h3 class="ProductCard_title">
      	<a href="<?php echo $product_url ?>">
      		<?php echo $product->get_name() ?>
      	</a>
      </h3>

      <?php if ($product_description): ?>
        <div class="ProductCard_description">
          <?php echo $product_description ?>
        </div>
      <?php endif ?>

      <?php if ($product_attributes): ?>
        <div class="ProductCard_tags">
          <div class="ProductCard_tagsLabel">Available in</div>
          <ul class="ProductCard_tagsList">
            <?php foreach ($product_attributes as $key => $value): ?>
              <?php foreach (wc_get_product_terms($id, $key) as $term): ?>
                <li class="ProductCard_tagsItem">
                  <span class="CategoryTag CategoryTag-productCard">
                    <?php echo $term->name; ?>
                  </span>
                </li>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif ?>

      <div class="ProductCard_prices">
      	<?php echo $product->get_price_html() ?>
      </div>

      <a class="BtnYellow BtnYellow-productCard ProductCard_btn" href="<?php echo $product_url ?>">View options and features</a>
    </div>
  </div>
</div>

