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
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_more', 10);
function woocommerce_template_loop_product_link_more() {
	echo '<a href="' . get_the_permalink() . '" class="BtnYellow BtnYellow-productCard ProductCard_btn">View options and features</a>';
}

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

function woocommerce_get_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
	global $post, $product;

	$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
	$output = '';

	if ($product) {
		if ( $product->is_on_sale() ) {
			$output = '<div class="ProductCard_imgWrapper">' . $product->get_image( $image_size ) . apply_filters( 'woocommerce_sale_flash', '<div class="ProductCard_tag Tag Tag-stars">' . esc_html__( 'Sale!', 'woocommerce' ) . '</div>', $post, $product ) . '</div>';
		} else {
			$output = '<div class="ProductCard_imgWrapper">' . $product->get_image( $image_size ) . woocommerce_show_product_loop_sale_flash() . '</div>';
		}
	}

	return $output;
}

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

if ( ! function_exists( 'get_product_img_swiper' ) ) {
	function get_product_img_swiper() {
		global $product;

		$attachment_ids = $product->get_gallery_image_ids();

		if ( $attachment_ids && $product->get_image_id() ) {
			echo '<div class="ProductImgSwiper Product_swiperWrapper"><div class="ProductImgSwiper_galleryWrapper"><div class="swiper ProductImgSwiper_gallery"><div class="swiper-wrapper">';

			foreach ( $attachment_ids as $attachment_id ) {
				$original_image_url = wp_get_attachment_url( $attachment_id );

				echo '<div class="swiper-slide ProductImgSwiper_gallerySlide"><a class="ProductImgSwiper_galleryLink" href="' . $original_image_url . '" data-fancybox="gallery">';
				echo wp_get_attachment_image( $attachment_id, 'full' );
				echo '</a></div>';
			}

			echo '</div><button class="SwiperBtn SwiperBtn-prev SwiperBtn-transparentDarkBg ProductImgSwiper_prev hidden-smMinus" type="button"></button><button class="SwiperBtn SwiperBtn-next SwiperBtn-transparentDarkBg ProductImgSwiper_next hidden-smMinus" type="button"></button><a class="BtnBlack BtnBlack-transparent BtnBlack-fullScreen ProductImgSwiper_fullScreenBtn" href="javascript:;" data-fancybox>full screen</a>';

			echo '</div></div><div class="swiper ProductImgSwiper_thumbs hidden-smMinus"><div class="swiper-wrapper">';

			foreach ( $attachment_ids as $attachment_id ) {
				echo '<div class="swiper-slide ProductImgSwiper_thumbsSlide">';
				echo wp_get_attachment_image( $attachment_id, 'full' );
				echo '</div>';
			}

			echo '</div></div></div>';
		}
	}
}


