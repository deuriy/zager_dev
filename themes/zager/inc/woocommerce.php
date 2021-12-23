<?php
/**
 * Add WooCommerce support
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'understrap_woocommerce_support' );
if ( ! function_exists( 'understrap_woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function understrap_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add Product Gallery support.
		// add_theme_support( 'wc-product-gallery-lightbox' );
		// add_theme_support( 'wc-product-gallery-zoom' );
		// add_theme_support( 'wc-product-gallery-slider' );

		// Add Bootstrap classes to form fields.
		// add_filter( 'woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3 );
	}
}

// if ( ! function_exists( 'understrap_wc_form_field_args' ) ) {
	/**
	 * Filter hook function monkey patching form classes
	 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
	 *
	 * @param string $args Form attributes.
	 * @param string $key Not in use.
	 * @param null   $value Not in use.
	 *
	 * @return mixed
	 */
	// function understrap_wc_form_field_args( $args, $key, $value = null ) {
	// 	// Start field type switch case.
	// 	switch ( $args['type'] ) {
	// 		// Targets all select input type elements, except the country and state select input types.
	// 		case 'select':
	// 			/*
	// 			 * Add a class to the field's html element wrapper - woocommerce
	// 			 * input types (fields) are often wrapped within a <p></p> tag.
	// 			 */
	// 			$args['class'][] = 'form-group';
	// 			// Add a class to the form input itself.
	// 			$args['input_class'] = array( 'form-control' );
	// 			// Add custom data attributes to the form input itself.
	// 			$args['custom_attributes'] = array(
	// 				'data-plugin'      => 'select2',
	// 				'data-allow-clear' => 'true',
	// 				'aria-hidden'      => 'true',
	// 			);
	// 			break;
	// 		/*
	// 		 * By default WooCommerce will populate a select with the country names - $args
	// 		 * defined for this specific input type targets only the country select element.
	// 		 */
	// 		case 'country':
	// 			$args['class'][] = 'form-group single-country';
	// 			break;

	// 		 * By default WooCommerce will populate a select with state names - $args defined
	// 		 * for this specific input type targets only the country select element.

	// 		case 'state':
	// 			$args['class'][] = 'form-group';
	// 			$args['custom_attributes'] = array(
	// 				'data-plugin'      => 'select2',
	// 				'data-allow-clear' => 'true',
	// 				'aria-hidden'      => 'true',
	// 			);
	// 			break;
	// 		case 'password':
	// 		case 'text':
	// 		case 'email':
	// 		case 'tel':
	// 		case 'number':
	// 			$args['class'][]     = 'form-group';
	// 			$args['input_class'] = array( 'form-control' );
	// 			break;
	// 		case 'textarea':
	// 			$args['input_class'] = array( 'form-control' );
	// 			break;
	// 		case 'checkbox':
	// 			// Add a class to the form input's <label> tag.
	// 			$args['label_class'] = array( 'custom-control custom-checkbox' );
	// 			$args['input_class'] = array( 'custom-control-input' );
	// 			break;
	// 		case 'radio':
	// 			$args['label_class'] = array( 'custom-control custom-radio' );
	// 			$args['input_class'] = array( 'custom-control-input' );
	// 			break;
	// 		default:
	// 			$args['class'][]     = 'form-group';
	// 			$args['input_class'] = array( 'form-control' );
	// 			break;
	// 	} // End of switch ( $args ).
	// 	return $args;
	// }
// }

	if ( ! is_admin() && ! function_exists( 'wc_review_ratings_enabled' ) ) {
	/**
	 * Check if reviews are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	function wc_reviews_enabled() {
		return 'yes' === get_option( 'woocommerce_enable_reviews' );
	}

	/**
	 * Check if reviews ratings are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	function wc_review_ratings_enabled() {
		return wc_reviews_enabled() && 'yes' === get_option( 'woocommerce_enable_review_rating' );
	}
}

// Product page
function woocommerce_breadcrumb( $args = array() ) {
	$args = wp_parse_args(
		$args,
		apply_filters(
			'woocommerce_breadcrumb_defaults',
			array(
				'delimiter'   => '',
				'wrap_before' => '<div class="Breadcrumbs Breadcrumbs-product Product_breadcrumbs"><ul class="Breadcrumbs_list">',
				'wrap_after'  => '</ul></div>',
				'before'      => '<li class="Breadcrumbs_item">',
				'after'       => '</li>',
				'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
			)
		)
	);

	$breadcrumbs = new WC_Breadcrumb();

	if ( ! empty( $args['home'] ) ) {
		$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
	}

	$args['breadcrumb'] = $breadcrumbs->generate();

	/**
	 * WooCommerce Breadcrumb hook
	 *
	 * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
	 */
	do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

	wc_get_template( 'global/breadcrumb.php', $args );
}


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_action('woocommerce_before_single_product', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

add_action('woocommerce_single_product_summary', 'woocommerce_show_product_images', 6);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_after_main_content', 'woocommerce_output_related_products', 10);

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
add_action('woocommerce_before_shop_loop_item', 'zager_wc_template_loop_product_open', 10);
function zager_wc_template_loop_product_open() {
	echo '<div class="ProductCard_wrapper">';
}

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_more', 10);
function woocommerce_template_loop_product_link_more() {
	echo '<a href="' . get_the_permalink() . '" class="BtnYellow BtnYellow-productCard ProductCard_btn">View options<span class="hidden-xs"> and features</span></a>';
}

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action('woocommerce_after_shop_loop_item', 'zager_wc_template_loop_product_close', 10);
function zager_wc_template_loop_product_close() {
	echo '</div>';
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'zager_wc_loop_product_thumbnail', 10);
function zager_wc_loop_product_thumbnail() {
	echo '<a href="' . get_the_permalink() . '">' . woocommerce_get_product_thumbnail('full') . '</a>';
}

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'zager_wc_shop_loop_item_title', 10);
function zager_wc_shop_loop_item_title() {
	echo '<h3 class="ProductCard_title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
}

add_action('woocommerce_after_shop_loop_item_title', 'zager_wc_loop_product_attributes', 5);
function zager_wc_loop_product_attributes() {
	global $product;

	$product_attributes = $product->get_attributes(); ?>

	<?php if ($product_attributes): ?>
    <div class="ProductCard_tags">
      <div class="ProductCard_tagsLabel">Available in</div>
      <ul class="ProductCard_tagsList">
        <?php foreach ($product_attributes as $key => $value): ?>
          <?php foreach (wc_get_product_terms($product->get_id(), $key) as $term): ?>
            <li class="ProductCard_tagsItem">
              <span class="CategoryTag CategoryTag-productCard">
                <?php echo $term->name; ?>
              </span>
            </li>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif;
}

add_filter( 'wc_add_to_cart_message_html', '__return_false' );

// remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

add_filter( 'woocommerce_page_title', 'zager_woocommerce_page_title');
function zager_woocommerce_page_title( $page_title ) {
  if( $page_title == 'Shop' ) {
    return "Zager hand built guitars";
  }
}

// function woocommerce_get_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
// 	global $post, $product;

// 	$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
// 	$output = '';

// 	if ($product) {
// 		if ( $product->is_on_sale() ) {
// 			$output = '<div class="ProductCard_imgWrapper">' . $product->get_image( $image_size ) . apply_filters( 'woocommerce_sale_flash', '<div class="ProductCard_tag Tag Tag-stars">' . esc_html__( 'Sale!', 'woocommerce' ) . '</div>', $post, $product ) . '</div>';
// 		} else {
// 			$output = '<div class="ProductCard_imgWrapper">' . $product->get_image( $image_size ) . woocommerce_show_product_loop_sale_flash() . '</div>';
// 		}
// 	}

// 	return $output;
// }

function woocommerce_template_loop_product_title() {
	echo '<h2 class="ProductCard_title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}


// Checkout page
add_filter( 'woocommerce_checkout_fields', 'remove_label_from_fields' );
function remove_label_from_fields( $fields ){
	foreach ($fields as $category => $value) {
		foreach ($fields[$category] as $field => $property) {
			$fields[$category][$field]['placeholder'] = $fields[$category][$field]['label'];
			unset($fields[$category][$field]['label']);
		}
	}
	return $fields;
}

function woocommerce_form_field( $key, $args, $value = null ) {
	$defaults = array(
		'type'              => 'text',
		'label'             => '',
		'description'       => '',
		'placeholder'       => '',
		'maxlength'         => false,
		'required'          => false,
		'autocomplete'      => false,
		'id'                => $key,
		'class'             => array(),
		'label_class'       => array(),
		'input_class'       => array(),
		'return'            => false,
		'options'           => array(),
		'custom_attributes' => array(),
		'validate'          => array(),
		'default'           => '',
		'autofocus'         => '',
		'priority'          => '',
	);

	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

	if ( $args['required'] ) {
		$args['class'][] = 'validate-required';
		$required        = '&nbsp;<abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';
	} else {
		$required = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
	}

	if ( is_string( $args['label_class'] ) ) {
		$args['label_class'] = array( $args['label_class'] );
	}

	if ( is_null( $value ) ) {
		$value = $args['default'];
	}

		// Custom attribute handling.
	$custom_attributes         = array();
	$args['custom_attributes'] = array_filter( (array) $args['custom_attributes'], 'strlen' );

	if ( $args['maxlength'] ) {
		$args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
	}

	if ( ! empty( $args['autocomplete'] ) ) {
		$args['custom_attributes']['autocomplete'] = $args['autocomplete'];
	}

	if ( true === $args['autofocus'] ) {
		$args['custom_attributes']['autofocus'] = 'autofocus';
	}

	if ( $args['description'] ) {
		$args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
	}

	if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
		foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
		}
	}

	if ( ! empty( $args['validate'] ) ) {
		foreach ( $args['validate'] as $validate ) {
			$args['class'][] = 'validate-' . $validate;
		}
	}

	$field           = '';
	$label_id        = $args['id'];
	$sort            = $args['priority'] ? $args['priority'] : '';
	$field_container = '<div class="checkout__form-item %1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '">%3$s</div>';

	switch ( $args['type'] ) {
		case 'country':
		$countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

		if ( 1 === count( $countries ) ) {

			$field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

			$field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" readonly="readonly" />';

		} else {
			$data_label = ! empty( $args['label'] ) ? 'data-label="' . esc_attr( $args['label'] ) . '"' : '';

			$field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="country_to_state country_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ? $args['placeholder'] : esc_attr__( 'Select a country / region&hellip;', 'woocommerce' ) ) . '" ' . $data_label . '><option value="">' . esc_html__( 'Select a country / region&hellip;', 'woocommerce' ) . '</option>';

			foreach ( $countries as $ckey => $cvalue ) {
				$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
			}

			$field .= '</select>';

			$field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country / region', 'woocommerce' ) . '">' . esc_html__( 'Update country / region', 'woocommerce' ) . '</button></noscript>';

		}

		break;
		case 'state':
		/* Get country this state field is representing */
		$for_country = isset( $args['country'] ) ? $args['country'] : WC()->checkout->get_value( 'billing_state' === $key ? 'billing_country' : 'shipping_country' );
		$states      = WC()->countries->get_states( $for_country );

		if ( is_array( $states ) && empty( $states ) ) {

			$field_container = '<div class="checkout__form-item %1$s" id="%2$s" style="display: none">%3$s</div>';

			$field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" readonly="readonly" data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"/>';

		} elseif ( ! is_null( $for_country ) && is_array( $states ) ) {
			$data_label = ! empty( $args['label'] ) ? 'data-label="' . esc_attr( $args['label'] ) . '"' : '';

			$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ? $args['placeholder'] : esc_html__( 'Select an option&hellip;', 'woocommerce' ) ) . '"  data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . $data_label . '>
			<option value="">' . esc_html__( 'Select an option&hellip;', 'woocommerce' ) . '</option>';

			foreach ( $states as $ckey => $cvalue ) {
				$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
			}

			$field .= '</select>';

		} else {

			$field .= '<input type="text" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '"  placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"/>';

		}

		break;
		case 'textarea':
		$field .= '<textarea name="' . esc_attr( $key ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

		break;
		case 'checkbox':
		$field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
		<input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> ' . $args['label'] . $required . '</label>';

		break;
		case 'text':
		case 'password':
		case 'datetime':
		case 'datetime-local':
		case 'date':
		case 'month':
		case 'time':
		case 'week':
		case 'number':
		case 'email':
		case 'url':
		case 'tel':
		$field .= '<input type="' . esc_attr( $args['type'] ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

		break;
		case 'hidden':
		$field .= '<input type="' . esc_attr( $args['type'] ) . '" class="input-hidden ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

		break;
		case 'select':
		$field   = '';
		$options = '';

		if ( ! empty( $args['options'] ) ) {
			foreach ( $args['options'] as $option_key => $option_text ) {
				if ( '' === $option_key ) {
							// If we have a blank option, select2 needs a placeholder.
					if ( empty( $args['placeholder'] ) ) {
						$args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
					}
					$custom_attributes[] = 'data-allow_clear="true"';
				}
				$options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_html( $option_text ) . '</option>';
			}

			$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
			' . $options . '
			</select>';
		}

		break;
		case 'radio':
		$label_id .= '_' . current( array_keys( $args['options'] ) );

		if ( ! empty( $args['options'] ) ) {
			foreach ( $args['options'] as $option_key => $option_text ) {
				$field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" ' . implode( ' ', $custom_attributes ) . ' id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
				$field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . esc_html( $option_text ) . '</label>';
			}
		}

		break;
	}

	if ( ! empty( $field ) ) {
		$field_html = '';

		if ( $args['label'] && 'checkbox' !== $args['type'] ) {
			$field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . wp_kses_post( $args['label'] ) . $required . '</label>';
		}

		$field_html .= '<span class="woocommerce-input-wrapper">' . $field;

		if ( $args['description'] ) {
			$field_html .= '<span class="description" id="' . esc_attr( $args['id'] ) . '-description" aria-hidden="true">' . wp_kses_post( $args['description'] ) . '</span>';
		}

		$field_html .= '</span>';

		$container_class = esc_attr( implode( ' ', $args['class'] ) );
		$container_id    = esc_attr( $args['id'] ) . '_field';
		$field           = sprintf( $field_container, $container_class, $container_id, $field_html );
	}

		/**
		 * Filter by type.
		 */
		$field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

		/**
		 * General filter on form fields.
		 *
		 * @since 3.4.0
		 */
		$field = apply_filters( 'woocommerce_form_field', $field, $key, $args, $value );

		if ( $args['return'] ) {
			return $field;
		} else {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $field;
		}
	}

// add_filter( 'woocommerce_form_field', 'change_wc_form_field_markup', 10, 4 );
// function change_wc_form_field_markup( $field, $key, $args, $value ){
// 	// filter...

// 	return $field;
// }
remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10);

// add this filter in functions.php file
	add_filter( 'woocommerce_get_item_data', 'wc_checkout_description', 10, 2 );
	function wc_checkout_description( $other_data, $cart_item )
	{
		$post_data = get_post( $cart_item['product_id'] );
		$other_data[] = array( 'name' =>  $post_data->post_excerpt );
		return $other_data;
	}

	if ( ! function_exists( 'custom_print_attribute_radio' ) ) {
		function custom_print_attribute_radio( $checked_value, $value, $label, $name ) {
			global $product;

			$input_name = 'attribute_' . esc_attr( $name ) ;
			$esc_value = esc_attr( $value );
		$id = esc_attr( $name . '_v_' . $value . $product->get_id() ); //added product ID at the end of the name to target single products
		$checked = checked( $checked_value, $value, false );
		$filtered_label = apply_filters( 'woocommerce_variation_option_name', $label, esc_attr( $name ) );

		$attribute_term = get_term_by( 'slug', $value, $name );
		$attribute_term_id = $attribute_term->term_id;

		$attribute_icon_id = get_field('icon', $name . '_' . $attribute_term_id);
		$show_icon = get_field('show_icon_in_variations_block', $name . '_' . $attribute_term_id) === 'yes';

		$attribute_icon = $show_icon ? wp_get_attachment_image( $attribute_icon_id, 'full', false, array('class' => 'Variation_icon') ) : '';
		$variation_classes = $show_icon ? ' Variation-hasIcon' : '';

		printf( '<div class="Variation%7$s Variations_item"><input type="radio" name="%1$s" value="%2$s" id="%3$s" %4$s class="Variation_input"><label for="%3$s" class="Variation_label">%6$s%5$s</label></div>', $input_name, $esc_value, $id, $checked, $filtered_label, $attribute_icon, $variation_classes );
	}
}

if ( ! function_exists( 'get_product_image_slider' ) ) {
	function get_product_image_slider($product_id) {
		$product = wc_get_product($product_id);

		$main_image_id = $product->get_image_id();
		$attachment_ids = $product->get_gallery_image_ids();

		if ( $main_image_id || ($attachment_ids && $product->get_image_id()) ) {
			echo '<div class="ProductImgSwiper Product_swiperWrapper"><div class="ProductImgSwiper_galleryWrapper"><div class="swiper ProductImgSwiper_gallery"><div class="swiper-wrapper">';

			if ($main_image_id) {
				$main_image = wp_get_attachment_image_url( $main_image_id, 'full' );

				echo '<div class="swiper-slide ProductImgSwiper_gallerySlide"><a class="ProductImgSwiper_galleryLink" href="' . $main_image . '" data-fancybox="gallery">';
				echo wp_get_attachment_image( $main_image_id, 'full' );
				echo '</a></div>';
			}

			if ($attachment_ids && $product->get_image_id()) {
				foreach ( $attachment_ids as $attachment_id ) {
					$original_image_url = wp_get_attachment_url( $attachment_id );

					echo '<div class="swiper-slide ProductImgSwiper_gallerySlide"><a class="ProductImgSwiper_galleryLink" href="' . $original_image_url . '" data-fancybox="gallery">';
					echo wp_get_attachment_image( $attachment_id, 'full' );
					echo '</a></div>';
				}
			}

			echo '</div><button class="SwiperBtn SwiperBtn-prev SwiperBtn-transparentDarkBg ProductImgSwiper_prev hidden-smMinus" type="button"></button><button class="SwiperBtn SwiperBtn-next SwiperBtn-transparentDarkBg ProductImgSwiper_next hidden-smMinus" type="button"></button><a class="BtnBlack BtnBlack-transparent BtnBlack-fullScreen BtnBlack-fullScreenProduct ProductImgSwiper_fullScreenBtn" href="javascript:;" data-fancybox="gallery">full screen</a>';

			echo '</div></div><div class="swiper ProductImgSwiper_thumbs hidden-smMinus"><div class="swiper-wrapper">';

			if ($main_image_id) {
				$main_image = wp_get_attachment_image_url( $main_image_id, 'full' );

				echo '<div class="swiper-slide ProductImgSwiper_thumbsSlide">';
				echo wp_get_attachment_image( $main_image_id, 'full' );
				echo '</div>';
			}

			if ($attachment_ids && $product->get_image_id()) {
				foreach ( $attachment_ids as $attachment_id ) {
					echo '<div class="swiper-slide ProductImgSwiper_thumbsSlide">';
					echo wp_get_attachment_image( $attachment_id, 'full' );
					echo '</div>';
				}
			}

			echo '</div></div></div>';
		}
	}
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form' );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_review_order_after_cart_contents', 'woocommerce_checkout_coupon_form', 10 );

add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {
	return __( 'Pay now', 'woocommerce' ); 
}

add_filter( 'woocommerce_add_to_cart_redirect', 'redirect_after_adding_product' );
 
function redirect_after_adding_product( $url ) {

	if (isset($_REQUEST['add-to-cart-checkout'])) {
		return wc_get_checkout_url();
	}

	if (isset($_REQUEST['add-to-cart'])) {
		return wc_get_cart_url();
	}

	return $url;
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	$fields['billing']['save_user_info'] = array(
		'type'      => 'checkbox',
		'label'     => __('Save this information for later', 'woocommerce'),
		'required'  => false,
	);

	return $fields;
}

// add_filter('woocommerce_checkout_update_customer_data', '__return_false' );
add_filter('woocommerce_checkout_update_customer_data', 'remove_default_saving_user_info' );
function remove_default_saving_user_info () {
	session_start();
	if ($_SESSION['save_user_info_check'] === 'false') {
		return false;
	} else {
		return true;
	}
}

add_action( 'wp_ajax_check_save_user_info', 'check_save_user_info' );
add_action( 'wp_ajax_nopriv_check_save_user_info', 'check_save_user_info' );
function check_save_user_info () {
	session_start();
	$_SESSION['save_user_info_check'] = $_POST['check'];
	if ($_SESSION['save_user_info_check'] === 'true') {
		echo $_SESSION['save_user_info_check'];
	}

	wp_die();
}


add_filter( 'woocommerce_available_payment_gateways', 'gateway_disable_postcode' );
function gateway_disable_postcode( $available_gateways ) {

   if ( ! is_admin() ) {

   		$available_gateways['paypal']->title = '<svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" width="91" height="22"><style>.shp0{fill:#253b80}.shp1{fill:#179bd7}</style><g id="Checkout shipping – 1"><g id="Group 252"><path id="Path 512" fill-rule="evenodd" class="shp0" d="M38.18 6.19c.64.76.86 1.84.64 3.22-.5 3.15-2.4 4.74-5.68 4.74h-1.58c-.34 0-.63.25-.68.59l-.55 3.44c-.05.34-.34.59-.68.59h-2.38c-.26 0-.45-.23-.41-.48L28.88 5.5c.05-.33.34-.58.68-.58h4.99c1.66 0 2.92.44 3.63 1.27Zm-3.3 2.01c-.44-.51-1.29-.51-2.19-.51h-.34c-.21 0-.38.15-.42.35l-.52 3.34h.75c1.32 0 2.69 0 2.96-1.79.1-.63.02-1.08-.24-1.39Z"/><path id="Path 513" fill-rule="evenodd" class="shp0" d="m49.86 10.01-1.29 8.17c-.06.34-.35.59-.69.59h-2.15c-.25 0-.45-.23-.41-.48l.11-.67s-1.18 1.37-3.31 1.37c-1.23 0-2.28-.36-3-1.21-.8-.94-1.12-2.27-.89-3.67.44-2.8 2.69-4.8 5.33-4.8 1.15 0 2.3.25 2.82 1l.16.24.11-.67c.03-.2.21-.35.41-.35h2.39c.25 0 .45.23.41.48Zm-4.14 2.48c-.37-.43-.92-.65-1.6-.65-1.36 0-2.46.94-2.67 2.3-.11.66.02 1.26.37 1.67.36.43.91.65 1.61.65 1.38 0 2.46-.92 2.69-2.28.1-.66-.04-1.26-.4-1.69Z"/><path id="Path 514" class="shp0" d="M62.51 10.18 54.53 21.7c-.13.19-.35.3-.57.3h-2.4c-.34 0-.53-.38-.34-.66l2.48-3.5-2.64-7.76c-.09-.27.11-.55.4-.55h2.35c.31 0 .58.2.67.5l1.4 4.68 3.31-4.87c.13-.19.35-.31.57-.31h2.4c.34 0 .54.38.35.65Z"/><path id="Path 515" fill-rule="evenodd" class="shp1" d="M73.74 6.19c.65.76.86 1.84.64 3.22-.5 3.15-2.39 4.74-5.68 4.74h-1.58c-.34 0-.63.25-.68.59l-.57 3.62c-.04.24-.24.41-.48.41h-2.56c-.25 0-.45-.23-.41-.48L64.44 5.5c.05-.33.34-.58.68-.58h4.99c1.67 0 2.92.44 3.63 1.27Zm-3.3 2.01c-.44-.51-1.29-.51-2.19-.51h-.34a.41.41 0 0 0-.41.35l-.53 3.34h.75c1.32 0 2.69 0 2.96-1.79.1-.63.02-1.08-.24-1.39Z"/><path id="Path 516" fill-rule="evenodd" class="shp1" d="m85.42 10.01-1.29 8.17c-.05.34-.34.59-.68.59H81.3c-.26 0-.45-.23-.41-.48l.1-.67s-1.18 1.37-3.3 1.37c-1.24 0-2.28-.36-3.01-1.21-.79-.94-1.12-2.27-.89-3.67.44-2.8 2.69-4.8 5.33-4.8 1.15 0 2.3.25 2.82 1l.17.24.1-.67c.03-.2.21-.35.41-.35h2.39c.26 0 .45.23.41.48Zm-4.14 2.48c-.37-.43-.92-.65-1.59-.65-1.36 0-2.46.94-2.68 2.3-.11.66.02 1.26.37 1.67.36.43.92.65 1.61.65 1.38 0 2.46-.92 2.69-2.28.11-.66-.04-1.26-.4-1.69Z"/><path id="Path 517" class="shp1" d="M88.23 4.92h2.31c.25 0 .45.23.41.48l-2.02 12.78c-.05.34-.34.59-.69.59h-2.05c-.26 0-.45-.23-.41-.48l2.04-13.02c.04-.2.21-.35.41-.35Z"/><path id="Path 518" class="shp0" d="m6.15 21.25.39-2.42-.85-.02H1.63L4.45.94c.01-.05.04-.1.08-.14.04-.03.09-.05.15-.05h6.84c2.27 0 3.83.47 4.65 1.4.38.44.63.9.75 1.4.12.53.12 1.16 0 1.93l-.01.05v.5l.39.21c.32.17.58.37.77.59.33.38.54.85.63 1.42.1.58.06 1.27-.09 2.05-.17.9-.46 1.68-.84 2.32-.35.59-.8 1.08-1.33 1.46-.5.36-1.11.63-1.79.8-.66.18-1.41.26-2.24.26h-.53c-.38 0-.75.14-1.04.39-.29.25-.48.59-.54.96l-.04.22-.68 4.27-.03.16c-.01.05-.02.07-.04.09-.02.01-.04.02-.07.02H6.15Z"/><path id="Path 519" class="shp1" d="M18.63 6.34c.88.99 1.05 2.41.72 4.1-.79 4.05-3.49 5.45-6.94 5.45h-.53c-.42 0-.78.3-.85.72l-.04.23-.67 4.26-.03.18c-.07.41-.43.72-.85.72H5.88c-.31 0-.55-.28-.51-.59l.3-1.85 1.02-6.52a.98.98 0 0 1 .97-.82h2c3.94 0 7.03-1.6 7.93-6.23.03-.14.05-.27.07-.4.38.2.71.45.97.75Z"/><path id="Path 520" d="M16.92 5.28c.26.08.51.19.74.31-.02.13-.04.26-.07.4-.9 4.63-3.99 6.23-7.93 6.23h-2a.98.98 0 0 0-.97.82l.04-.21 1.14-7.22c.04-.28.22-.52.47-.64a.91.91 0 0 1 .37-.08h5.36c.64 0 1.23.04 1.77.13.15.02.3.05.45.08.15.04.29.07.43.11.06.02.13.04.2.07Z" style="fill:#222d65"/><path id="Path 521" class="shp0" d="m6.73 12.83-1.06 6.73H1.44a.59.59 0 0 1-.58-.68L3.71.83C3.79.35 4.2 0 4.68 0h6.84c2.35 0 4.19.5 5.21 1.66.93 1.05 1.2 2.22.93 3.93-.23-.12-.48-.23-.74-.31-.07-.02-.14-.05-.2-.07-.14-.04-.28-.07-.43-.11-.15-.03-.3-.06-.45-.08-.54-.09-1.13-.13-1.77-.13H8.71a.91.91 0 0 0-.37.08c-.25.12-.43.36-.47.64l-1.14 7.22Z"/></g></g></svg>';
   		$available_gateways['paypal']->description = '<div class="payment-method"><div class="payment-method__wrapper"><div class="payment-method__img-wrapper"><img src="' . get_template_directory_uri() . '/img/paypal.svg"></div><div class="payment-method__description">Complete your transaction via PayPal. <br>PayPal will open in a new tab.</div></div><div class="payment-method__note">PayPal will open in a new tab.</div></div>';

   }

   return $available_gateways;

}

if ( ! function_exists( 'yith_wcwl_fix_flatsome_checkout' ) ) {
	function yith_wcwl_fix_flatsome_checkout() {
		wp_add_inline_script(
			'wc-checkout',
			"
			jQuery( function( $ ) {
				$('form.checkout').on( 'change', '#ship-to-different-address input', function() {
					$( 'select.country_select:visible, select.state_select:visible' ).selectWoo();
				} );
			} );
			"
		);
	}

	add_action( 'wp_enqueue_scripts', 'yith_wcwl_fix_flatsome_checkout' );
}

add_filter( 'woocommerce_variable_price_html', 'zager_variation_price_format_min', 9999, 2 );

function zager_variation_price_format_min( $price, $product ) {
	// if (!is_shop() && !is_product_category() && !is_product()) return $price;
	if ($product->is_type('simple')) return $price;

  $prices = $product->get_variation_prices( true );
  $min_price = current( $prices['price'] );
  $price = sprintf( __( '<span class="ProductCard_pricesLabel">from</span> %1$s', 'woocommerce' ), wc_price( $min_price ) );
  return $price;
}

function get_products_count_by_term($tax_slug, $term_slug, $additional_tax_query) {
	$tax_queries = [
		'tax_query' => [
    	'relation' => 'AND',
			[
				'taxonomy' => $tax_slug,
				'field'    => 'slug',
				'terms'    => $term_slug
			]
		]
	];

	if ($additional_tax_query) {
		$tax_queries['tax_query'][] = $additional_tax_query;
	}

	$query = array_merge(array(
    'post_status' => 'publish',
    'post_type' => 'product',
    'fields' => 'ids',
	), $tax_queries);

	$wpquery = new WP_Query($query);
	return $wpquery->found_posts;
}

function get_min_range_price() {
	$products = wc_get_products(array(
    'status' => 'publish',
    'limit' => -1
	));

	$all_prices = array();

	foreach ($products as $product) {
		if ($product->get_price() == '') continue;

		$all_prices[] = $product->get_price();
	}

	return min($all_prices);
}

function get_max_range_price() {
	$products = wc_get_products(array(
    'status' => 'publish',
    'limit' => -1
	));

	$all_prices = array();

	foreach ($products as $product) {
		if ($product->get_price() == '') continue;

		$all_prices[] = $product->get_price();
	}

	return max($all_prices);
}

add_action( 'wp_ajax_get_filtered_products', 'get_filtered_products' );
add_action( 'wp_ajax_nopriv_get_filtered_products', 'get_filtered_products' );
function get_filtered_products($default_page_type, $ajax_call = true) {
	$min_price = isset($_POST['min_price']) ? (int)$_POST['min_price'] : get_min_range_price();
	$max_price = isset($_POST['max_price']) ? (int)$_POST['max_price'] : get_max_range_price();

	$page = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : 1;

	$page_type = isset($_POST['page_type']) ? $_POST['page_type'] : $default_page_type;
	$default_posts_per_page = $page_type == 'shop' ? 10 : 9;
  $posts_per_page = isset($_POST['posts_per_page']) ? sanitize_text_field($_POST['posts_per_page']) : $default_posts_per_page;

  $loading_mode = isset($_POST['loading_mode']) ? sanitize_text_field($_POST['loading_mode']) : 'rewrite';
  $current_page = $page;
  $page -= 1;

  // Set the number of results to display
  $previous_btn = true;
  $next_btn = true;
  $offset = $page * $posts_per_page;
	$order_settings = !empty($_POST['order_settings']) ? $_POST['order_settings'] : [];
	$product_terms = isset($_POST['product_terms']) ? $_POST['product_terms'] : [];

	if ($page_type == 'shop') {
		$tax_queries = [
			'tax_query' => [
	    	'relation' => 'AND',
	    	[
	    		'taxonomy' => 'product_cat',
	    		'field' => 'slug',
	    		'terms' => 'guitar'
	    	]
			],
		];
	} else {
		$tax_queries = [
			'tax_query' => [
	    	'relation' => 'AND',
	    	[
	    		'taxonomy' => 'product_cat',
	    		'field' => 'slug',
	    		'terms' => 'accessories'
	    	]
			],
		];
	}

	if ($product_terms) {
		foreach ($product_terms as $product_tax_key => $tax_terms) {
			$tax_queries['tax_query'][] = [
				'taxonomy' => $product_tax_key,
				'field' => 'slug',
				'terms' => $tax_terms
			];
		}
	}

	$all_products_query = array_merge(array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => -1,

		'meta_query' => [
    	'relation' => 'AND',
      [
        'key' => '_price',
        'value' => array($min_price, $max_price),
        'compare' => 'BETWEEN',
        'type' => 'NUMERIC'
      ]
    ]
	), $order_settings, $tax_queries);

	$excluded_posts_ids = [];

	$all_products_wp_query = new WP_Query($all_products_query);
	$products_count = 0;

	if ($all_products_wp_query->have_posts()) {
		while ($all_products_wp_query->have_posts()) {
			$all_products_wp_query->the_post();

			if (get_field('display_product_on_shop_pages', get_the_ID()) == 'no') {
				$excluded_posts_ids[] = get_the_ID();
			} else {
				$products_count++;
			}
		}
		wp_reset_postdata();
	}

	$query = array_merge(array(
    'post_status' => 'publish',
    'post_type' => 'product',
    'posts_per_page' => $posts_per_page,
    'offset' => $offset,
    'post__not_in' => $excluded_posts_ids,

    'meta_query' => [
    	'relation' => 'AND',
      [
        'key' => '_price',
        'value' => array($min_price, $max_price),
        'compare' => 'BETWEEN',
        'type' => 'NUMERIC'
      ]
    ]
	), $order_settings, $tax_queries);

	$wpquery = new WP_Query($query);
	?>

	<?php if ($wpquery->have_posts()) : ?>
		<?php if ($page_type == 'shop') : ?>
			<?php if ($loading_mode == 'rewrite'): ?>
				<div class="ProductCardsSwiper Products_cardsSwiper swiper hidden-smPlus">
					<div class="swiper-wrapper">
			<?php else: ?>
				<div class="Products_slides">
			<?php endif ?>

				<?php
				while ($wpquery->have_posts()) {
					$wpquery->the_post();

					wc_get_template_part( 'content', 'product-slider' );
				}
				wp_reset_postdata();
				?>

			<?php if ($loading_mode == 'rewrite'): ?>
					</div>
				</div>
			<?php else: ?>
				</div>
			<?php endif ?>

			<?php if ($loading_mode == 'rewrite'): ?>
				<div class="Products_items hidden-xs">
			<?php endif ?>

				<?php
				while ($wpquery->have_posts()) {
					$wpquery->the_post();

					wc_get_template_part( 'content', 'product-twocol' );
				}
				wp_reset_postdata();
				?>

			<?php if ($loading_mode == 'rewrite'): ?>
				</div>
			<?php endif ?>
		<?php elseif ($page_type == 'accessories'): ?>
			<?php if ($loading_mode == 'rewrite'): ?>
				<div class="AccessoriesCards_items">
			<?php endif ?>

				<?php
				while ($wpquery->have_posts()) {
					$wpquery->the_post();

					wc_get_template_part( 'content', 'accessory-card' );
				}
				?>

			<?php if ($loading_mode == 'rewrite'): ?>
				</div>
			<?php endif ?>
		<?php endif; ?>

		<?php
			$paginations_count = ceil($products_count / $posts_per_page);

			// print '<div class="QueryInfo">';
			// print "<h3>Products count: $products_count</h3>";
   //    print "<h3>Offset: $offset</h3>";
   //    print "<h3>Page: $page</h3>";
   //    print "<h3>Current page: $current_page</h3>";
   //    print "<h3>Founded products: $wpquery->post_count</h3>";
   //    print "<h3>Posts per page: $posts_per_page</h3>";
      // print "<h3>Start loop: $start_loop</h3>";
      // print "<h3>End loop: $end_loop</h3>";
      // echo '</div>';

			if ($paginations_count != 1) {
				if ($current_page >= 7) {
	        $start_loop = $current_page - 3;

	        if ($paginations_count > $current_page + 3) {
	          $end_loop = $current_page + 3;
	        }
	        elseif ($current_page <= $paginations_count && $current_page > $paginations_count - 6) {
	          $start_loop = $paginations_count - 6;
	          $end_loop = $paginations_count;
	        } else {
	          $end_loop = $paginations_count;
	        }
	      } else {
	        $start_loop = 1;

	        if ($paginations_count > 7) {
	          $end_loop = 7;
	        }
	        else {
	          $end_loop = $paginations_count;
	        }
	      }

	      $pagination_container = "<div class=\"Pagination hidden-smMinus\"><ul class=\"Pagination_list\">";

	      if ($previous_btn && $current_page > 1) {
	        $prev = $current_page - 1;
	        $pagination_container .= "<li class=\"Pagination_item Pagination_item-prev\" data-page-index=\"$prev\"><a href=\"#\" class=\"BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft Pagination_link Pagination_link-prev\">Previous</a></li>";
	      } elseif ($previous_btn) {
	        $pagination_container .= "<li class=\"Pagination_item Pagination_item-prev\"><a href=\"#\" class=\"BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft BtnOutline-disabled Pagination_link Pagination_link-prev\">Previous</a></li>";
	      }

	      for ($i = $start_loop; $i <= $end_loop; $i++) {
	      	// if ($i > $start_loop + 2 && $i + 1 <= $end_loop) {
	      	// 	if ($i + 1 == $end_loop) {
	      	// 		$pagination_container .= "<li class=\"Pagination_more\">...</li>";
	      	// 	}
	      	// } else {
	      	// 	if ($current_page == $i) {
		      //     $pagination_container .= "<li data-page-index=\"$i\" class=\"Pagination_item Pagination_item-current\"><a href=\"#\" class=\"Pagination_link\">{$i}</a></li>";
		      //   }
		      //   else {
		      //     $pagination_container .= "<li data-page-index=\"$i\" class=\"Pagination_item\"><a href=\"#\" class=\"Pagination_link\">{$i}</a></li>";
		      //   }
	      	// }

	      	if ($current_page == $i) {
	          $pagination_container .= "<li data-page-index=\"$i\" class=\"Pagination_item Pagination_item-current\"><a href=\"#\" class=\"Pagination_link\">{$i}</a></li>";
	        }
	        else {
	          $pagination_container .= "<li data-page-index=\"$i\" class=\"Pagination_item\"><a href=\"#\" class=\"Pagination_link\">{$i}</a></li>";
	        }
	      }
	     
	      if ($next_btn && $current_page < $paginations_count) {
	        $next = $current_page + 1;
	        $pagination_container .= "<li data-page-index=\"$next\" class=\"Pagination_item Pagination_item-next\"><a href=\"#\" class=\"BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight Pagination_link Pagination_link-next\">Next</a></li>";
	      } elseif ($next_btn) {
	        $pagination_container .= "<li class=\"Pagination_item Pagination_item-next\"><a href=\"#\" class=\"BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight BtnOutline-disabled Pagination_link Pagination_link-next\">Next</a></li>";
	      }

	      $pagination_container = $pagination_container . "</ul></div>";
	     
	      echo '<div class="LoadingPosts LoadingPosts-productsWrapper">' . $pagination_container;

	      if ($paginations_count != $current_page) {
	      	echo '<a class="BtnYellow BtnYellow-loadMore LoadingPosts_btn hidden-smPlus" href="#">Load more</a>';
	      }

	      echo '</div>';
	    }
		?>
	<?php else: ?>
		<h3>Products not found</h3>
	<?php endif;

	if ($ajax_call) {
		wp_die();
	}
}

// add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

// function new_loop_shop_per_page( $cols ) {
//   // $cols contains the current number of products per page based on the value stored on Options –> Reading
//   // Return the number of products you wanna show per page.
//   $cols = 9;
//   return $cols;
// }

function my_wc_hide_in_stock_message( $html, $product ) {
	$availability = $product->get_availability();
	if ( isset( $availability['class'] ) && 'in-stock' === $availability['class'] ) {
		return '';
	}
	return $html;
}
add_filter( 'woocommerce_get_stock_html', 'my_wc_hide_in_stock_message', 10, 3 );


function woocommerce_mobile_variable_add_to_cart() {
	global $product;

	// Enqueue variation scripts.
	wp_enqueue_script( 'wc-add-to-cart-variation' );

	// Get Available variations?
	$get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );

	// Load the template.
	wc_get_template(
		'single-product/add-to-cart/variable-mobile.php',
		array(
			'available_variations' => $get_variations ? $product->get_available_variations() : false,
			'attributes'           => $product->get_variation_attributes(),
			'selected_attributes'  => $product->get_default_attributes(),
		)
	);
}

function woocommerce_single_mobile_variation_add_to_cart_button() {
	wc_get_template( 'single-product/add-to-cart/mobile-variation-add-to-cart-button.php' );
}

function woocommerce_mobile_simple_add_to_cart() {
	wc_get_template( 'single-product/add-to-cart/mobile-simple.php' );
}
