import {useState, useEffect, useRef} from '@wordpress/element';
import {__} from '@wordpress/i18n';
import google from '@googlepay';
import {isEqual} from 'lodash';
import {usePaymentEventsHandler} from "../../hooks";
import {removeNumberPrecision, extractSelectedShippingOption} from "../../utils";
import {getDisplayItems, getSelectedShippingOptionId, getShippingOptions} from "../helpers";

export const useCreatePaymentsClient = ({getData, shippingData, billing, eventRegistration}) => {
    const {needsShipping} = shippingData;
    const [paymentsClient, setPaymentsClient] = useState(null);
    const {addShippingHandler} = usePaymentEventsHandler({billing, shippingData, eventRegistration});
    const currentData = useRef({billing, shippingData});
    useEffect(() => {
        currentData.current = {billing, shippingData};
    }, [billing, shippingData]);
    useEffect(() => {
        const args = {
            environment: getData('googleEnvironment'),
            merchantInfo: {
                merchantName: getData('merchantName'),
                merchantId: getData('googleMerchantId')
            },
            paymentDataCallbacks: {
                onPaymentAuthorized: () => Promise.resolve({
                    transactionState: "SUCCESS"
                })
            }
        }
        if (needsShipping) {
            args.paymentDataCallbacks.onPaymentDataChanged = (data) => {
                return new Promise((resolve, reject) => {
                    const {shippingAddress, shippingOptionData} = data;
                    const {shippingData} = currentData.current;
                    const shippingOptionId = getSelectedShippingOptionId(shippingData.shippingRates);
                    const shippingOptionsEqual = shippingOptionId === shippingOptionData?.id;
                    const newAddress = {
                        city: shippingAddress.locality,
                        state: shippingAddress.administrativeArea,
                        postcode: shippingAddress.postalCode,
                        country: shippingAddress.countryCode
                    };
                    const shippingAddressEqual = isEqual({
                        city: shippingData.shippingAddress.city,
                        state: shippingData.shippingAddress.state,
                        postcode: shippingData.shippingAddress.postcode,
                        country: shippingData.shippingAddress.country
                    }, newAddress);
                    addShippingHandler((success, {billing, shippingData}) => {
                        const {currency, cartTotal, cartTotalItems} = billing;
                        const {shippingRates} = shippingData;
                        if (success) {
                            resolve({
                                newTransactionInfo: {
                                    countryCode: getData('countryCode'),
                                    currencyCode: currency.code,
                                    totalPriceStatus: 'FINAL',
                                    totalPrice: removeNumberPrecision(cartTotal.value, currency.minorUnit).toString(),
                                    totalPriceLabel: getData('totalPriceLabel'),
                                    displayItems: getDisplayItems(cartTotalItems, currency.minorUnit)
                                },
                                newShippingOptionParameters: {
                                    shippingOptions: getShippingOptions(shippingRates),
                                    defaultSelectedOptionId: getSelectedShippingOptionId(shippingRates)
                                }
                            });
                        } else {
                            resolve({
                                error: {
                                    reason: 'SHIPPING_ADDRESS_UNSERVICEABLE',
                                    message: __('Your shipping address is not serviceable.', 'woo-payment-gateway'),
                                    intent: 'SHIPPING_ADDRESS'
                                }
                            });
                        }
                    }, shippingAddressEqual && shippingOptionsEqual);
                    shippingData.setShippingAddress({...shippingData.shippingAddress, ...newAddress});
                    if (shippingOptionData?.id !== 'shipping_option_unselected') {
                        shippingData.setSelectedRates(...extractSelectedShippingOption(shippingOptionData.id));
                    }
                });
            }
        }
        setPaymentsClient(new google.payments.api.PaymentsClient(args));
    }, [
        needsShipping,
        addShippingHandler
    ]);
    return paymentsClient;
}