jQuery(document).ready(
    function($) {

        function updateApiKeyLinks() {
            // If the sandbox checkbox checked?
            if (0 < $('input#woocommerce_affirm_testmode:checked').length) {
                $('.woocommerce_affirm_merchant_dashboard_link').attr('href', affirmAdminData.sandboxedApiKeysURI);
            } else {
                $('.woocommerce_affirm_merchant_dashboard_link').attr('href', affirmAdminData.apiKeysURI);
            }
        }

        updateApiKeyLinks();

        $('input#woocommerce_affirm_testmode').click(
            function(event) {
                updateApiKeyLinks();
                event.preventDefault;
            }
        );

        // Minimize fields if public API key is filled
        var affirm_public_key = $('#woocommerce_affirm_public_key').val();
        if (affirm_public_key == '') {
            $('#woocommerce_affirm_account_settings').val('expand').change()
            $('#woocommerce_affirm_ala_settings').val('expand').change()
        } else {
            $('#woocommerce_affirm_account_settings').val('minimize').change()
            $('#woocommerce_affirm_ala_settings').val('minimize').change()
            $('#woocommerce_affirm_advance_settings').val('minimize').change()
        }

        // Toggle Advance settings in Payment settings
        if ($('#woocommerce_affirm_advance_settings').val() === 'minimize') {
            $('[for=woocommerce_affirm_debug]').parent().parent().hide()
            $('[for=woocommerce_affirm_enhanced_analytics]').parent().parent().hide()
            $('[for=woocommerce_affirm_show_fee]').parent().parent().hide()
            $('[for=woocommerce_affirm_max]').parent().parent().hide()
            $('[for=woocommerce_affirm_min]').parent().parent().hide()
        }

        $('#woocommerce_affirm_advance_settings').change(function() {
            $('[for=woocommerce_affirm_debug]').parent().parent().toggle()
            $('[for=woocommerce_affirm_enhanced_analytics]').parent().parent().toggle()
            $('[for=woocommerce_affirm_show_fee]').parent().parent().toggle()
            $('[for=woocommerce_affirm_max]').parent().parent().toggle()
            $('[for=woocommerce_affirm_min]').parent().parent().toggle()
        })

        // Toggle ALA settings in Payment settings
        if ($('#woocommerce_affirm_ala_settings').val() === 'minimize') {
            $('[for=woocommerce_affirm_categoryALA]').parent().parent().hide()
            $('[for=woocommerce_affirm_productALA]').parent().parent().hide()
            $('#woocommerce_affirm_productALA_options').parent().parent().hide()
            $('[for=woocommerce_affirm_cartALA]').parent().parent().hide()
            $('[for=woocommerce_affirm_show_learnmore]').parent().parent().hide()
            $('[for=woocommerce_affirm_promo_id]').parent().parent().hide()
            $('[for=woocommerce_affirm_affirm_color]').parent().parent().hide()
        }

        $('#woocommerce_affirm_ala_settings').change(function() {
            $('[for=woocommerce_affirm_categoryALA]').parent().parent().toggle()
            $('[for=woocommerce_affirm_productALA]').parent().parent().toggle()
            $('#woocommerce_affirm_productALA_options').parent().parent().toggle()
            $('[for=woocommerce_affirm_cartALA]').parent().parent().toggle()
            $('[for=woocommerce_affirm_show_learnmore]').parent().parent().toggle()
            $('[for=woocommerce_affirm_promo_id]').parent().parent().toggle()
            $('[for=woocommerce_affirm_affirm_color]').parent().parent().toggle()
        })

        // Toggle Account settings in Payment settings
        if ($('#woocommerce_affirm_account_settings').val() === 'minimize') {
            $('[for=woocommerce_affirm_public_key]').parent().parent().hide()
            $('[for=woocommerce_affirm_private_key]').parent().parent().hide()
            $('[for=woocommerce_affirm_transaction_mode]').parent().parent().hide()
            $('[for=woocommerce_affirm_checkout_mode]').parent().parent().hide()
            $('[for=woocommerce_affirm_cancel_url]').parent().parent().hide()
            $('[for=woocommerce_affirm_testmode]').parent().parent().hide()
            $('[for=woocommerce_affirm_custom_cancel_url]').parent().parent().hide()
            $('[for=woocommerce_affirm_custom_cancel_url]').parent().parent().hide()
            $('[for=woocommerce_affirm_inline_messaging]').parent().parent().hide()
        }

        $('#woocommerce_affirm_account_settings').change(function() {
            $('[for=woocommerce_affirm_testmode]').parent().parent().toggle()
            $('[for=woocommerce_affirm_public_key]').parent().parent().toggle()
            $('[for=woocommerce_affirm_private_key]').parent().parent().toggle()
            $('[for=woocommerce_affirm_transaction_mode]').parent().parent().toggle()
            $('[for=woocommerce_affirm_checkout_mode]').parent().parent().toggle()
            $('[for=woocommerce_affirm_cancel_url]').parent().parent().toggle()
            $('[for=woocommerce_affirm_custom_cancel_url]').parent().parent().toggle()
            $('[for=woocommerce_affirm_inline_messaging]').parent().parent().toggle()

            if ($('#woocommerce_affirm_cancel_url').val() === 'cancel_to_custom') {
                $('[for=woocommerce_affirm_custom_cancel_url]').parent().parent().toggle()
            }
        })

        $('#woocommerce_affirm_cancel_url').change(function() {
            if ($('#woocommerce_affirm_cancel_url').val() === 'cancel_to_custom') {
                $('[for=woocommerce_affirm_custom_cancel_url]').parent().parent().show()
            }
        })
    }
);