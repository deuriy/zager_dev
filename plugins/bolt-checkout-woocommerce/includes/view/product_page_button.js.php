var $quantity_input = jQuery('form.cart').find('[name=quantity]');
var $cart_form = jQuery('form.cart');
var wc_bolt_checkout;
var add_to_cart_button_selector = '.add_to_cart_button, .single_add_to_cart_button';
<?php if ($product->is_type( 'simple' )) : ?>
var wc_bolt_max_qty = $quantity_input[0].max;
<?php else: ?>
var wc_bolt_max_qty = "";
<?php endif ?>
var wc_product_is_purchasable = <?= $wc_product_is_purchasable; ?>;
var wc_bolt_items = [{
    reference: '<?= $reference; ?>',
    price: <?= $price ?: "''"; ?>,
    name: '<?= addcslashes( $name, "'" ); ?>',
    quantity: Number($quantity_input.val()),
    properties: [{
        name: "form_post",
        value: $cart_form.serialize()
    }]
}];

function setupProductPage() {
    if (wc_bolt_checkout == null) {
        wc_bolt_checkout = new Bolt_Review();
        wc_bolt_checkout.init('form.cart');
        jQuery('form.cart input[name="quantity"]').on('change',
            function () {
                wc_bolt_items[0].quantity = Number($quantity_input.val());
                setupProductPage();
            }
        );
    }
	<?php
	if ( $is_enable_ppc ){
	?>
    setupBoltPPC();
	<?php
	}
	?>
	<?php
	if ( $is_enable_subscription ){
	?>
    setupBoltSubscription();
	<?php
	}
	?>
}

jQuery(document).ready(function () {
    setupProductPage();
});

//variation
var $variation_form = jQuery('form.variations_form.cart');
$variation_form.find('.single_variation').on("show_variation", function (event, variation, purchasable) {
    if (purchasable) {
        wc_product_is_purchasable = true;
        var name = '<?= addcslashes( isset( $parent_name ) ? $parent_name : $name, "'" ); ?>' + ' -';
        var firstAttribute = true;
        jQuery.each(variation.attributes, function (index, value) {
            if (!firstAttribute) {
                name = name + ","
            }
            name = name + ' ' + value;
            firstAttribute = false;
        });
        var quantity = Number($quantity_input.val());
        wc_bolt_max_qty = variation.max_qty;
		<?php
		// support the addon `WooCommerce TM Extra Product Options`
		if ( defined( 'TM_EPO_PLUGIN_SECURITY' ) ){
		?>
        collectTMCPFieldsData();
		<?php
		}
		?>
        wc_bolt_items = [{
            reference: String(variation.variation_id),
            price: variation.display_price,
            name: name,
            quantity: quantity,
            properties: [{
                name: "form_post",
                value: $cart_form.serialize()
            }]
        }];
    } else {
        wc_product_is_purchasable = false;
        //set wc_bolt_max_qty for show right error alert
        if (!variation.is_in_stock) {
            wc_bolt_max_qty = 0;
        } else {
            wc_bolt_max_qty = undefined;
        }
    }
    setupProductPage();
}).on("hide_variation", function (event) {
    wc_product_is_purchasable = false;
    setupProductPage();
});

<?php
// support the addon `WooCommerce TM Extra Product Options`
if ( defined( 'TM_EPO_PLUGIN_SECURITY' ) ){
?>
jQuery(window).on("epo_options_visible", function () {
    collectTMCPFieldsData();
});
$cart_form.find(".tmcp-field,.tmcp-sub-fee-field,.tmcp-fee-field,.tm-quantity").on("tc_element_epo_rules change", function (a) {
    collectTMCPFieldsData();
});
function collectTMCPFieldsData() {
    // To collect the updated tmcp field.
    setTimeout(function () {
        var tmcp_price_element = jQuery("#tm-epo-totals .tm-final-totals .price.amount.final");
        if (tmcp_price_element.length > 0) {
            var current_total = tmcp_price_element.html();
            wc_bolt_items[0]["price"] = Math.round((Number(current_total.replace(/[^0-9.-]+/g, "")) / wc_bolt_items[0]["quantity"]) * <?= $currency_divider; ?> ) / <?= $currency_divider; ?>;
        }
        wc_bolt_items[0]["properties"] = [{
            name: "form_post",
            value: $cart_form.serialize()
        }];
        setupProductPage();
    }, 200);
}
<?php
}
?>
<?= $additional_javascript; ?>