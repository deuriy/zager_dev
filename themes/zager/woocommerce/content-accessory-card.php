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

// defined( 'ABSPATH' ) || exit;

// global $product;

// // Ensure visibility.
// if ( empty( $product ) || ! $product->is_visible() ) {
// 	return;
// }

// $id = $product->get_id();
$id = get_the_ID();
$product = wc_get_product($id);
$product_image = $product->get_image('full', array('class' => 'AccessoryCard_img'));
$product_url = get_permalink($id);
?>

<div <?php wc_product_class( 'AccessoryCard Accessories_item', $product ); ?>>
	<?php if ($product_image || $additional_labels): ?>
    <div class="AccessoryCard_imgWrapper">
      <?php if ($product_image): ?>
      	<a href="<?php echo $product_url ?>">
        	<?php echo $product_image ?>
        </a>
      <?php endif ?>

      <?php if ($product->is_on_sale()): ?>
      	<span class="Tag Tag-accessoryCard AccessoryCard_tag">
      		<?php echo esc_html__( 'On sale', 'woocommerce' ) ?>
      	</span>
      <?php endif ?>
    </div>
  <?php endif ?>

  <div class="AccessoryCard_textWrapper">
    <h3 class="AccessoryCard_title">
    	<a href="<?php echo $product_url ?>">
    		<?php echo $product->get_name() ?>
    	</a>
    </h3>

    <div class="AccessoryCard_price">
    	<?php echo $product->get_price_html() ?>
    </div>

    <?php woocommerce_template_loop_add_to_cart() ?>

    <a class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-darkText BtnOutline-accessoryCard AccessoryCard_btn hidden-xs" href="<?php echo $product_url ?>">view details</a>
  </div>
</div>

