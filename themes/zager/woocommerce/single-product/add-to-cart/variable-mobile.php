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

$attribute_keys = array_keys( $attributes ); ?>

<?php
	$count = count($attributes);
	// print $count . '<br><br>';

	// print '<pre>';
	// print_r($attribute_keys);
	// print '</pre>';
?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
  <?php do_action( 'woocommerce_before_variations_form' ); ?>

  <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
    <p class="stock out-of-stock">
      <?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?>
    </p>
  <?php else : ?>
    <table class="variations" cellspacing="0">
      <tbody>
      	<?php
      		$index = 0;
      	?>

        <?php foreach ( $attributes as $name => $options ) : ?>
          <?php $sanitized_name = sanitize_title( $name ); ?>
          <tr class="attribute attribute-<?php echo esc_attr( $sanitized_name ); ?>">
            <td>
              <div class="MobilePopup MobilePopup-productOptions" id="MobilePopup-<?php echo esc_attr( $sanitized_name ); ?>">
                <div class="MobilePopup_overlay"></div>
                <div class="MobilePopup_wrapper">
	                <div class="MobilePopup_header">
                		<a class="MobilePopup_prev" href="<?php echo ($index - 1) < 0 ? '#" data-action="closeMobilePopup' : '#MobilePopup-' . $attribute_keys[$index - 1] . '" data-action="openMobilePopup' ?>"></a>

	                  <h3 class="MobilePopup_title">
	                    <?php echo wc_attribute_label( $name ); ?>
	                  </h3>

	                  <a class="MobilePopup_link FancyboxPopupLink" href="#" data-src="#CompareSizesPopup">Compare Sizes</a>

	                  <a class="MobilePopup_next" href="<?php echo ($index + 1) != $count ? '#MobilePopup-' . $attribute_keys[$index + 1] : '#TotalPriceMobilePopup' ?>" data-action="openMobilePopup"></a>
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
	                <div class="MobilePopup_body">
	                  <div class="Variations value attribute__value">
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
	                    ?>
	                  </div>
	                </div>
                </div>
              </div>
            </td>
          </tr>
          <?php $index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php woocommerce_single_mobile_variation_add_to_cart_button(); ?>

  <?php endif; ?>

  <?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
