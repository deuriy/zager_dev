import {useState, useEffect, useCallback} from '@wordpress/element';
import {create} from '@braintree/three-d-secure';
import {removeNumberPrecision} from "../utils";
import {usePaymentMethodDataContext} from "../context";

export const useThreeDSecure = (vaulted = false) => {
    const {client, notice, onPaymentDataFilter, threeDSecureEnabled} = usePaymentMethodDataContext();
    const {addNotice} = notice;
    const [instance, setInstance] = useState(null);
    useEffect(() => {
        if ((threeDSecureEnabled || vaulted) && client && !instance) {
            try {
                create({
                    version: 2,
                    client
                }, (error, instance) => {
                    if (!error) {
                        setInstance(instance);
                    } else {
                        addNotice(error);
                    }
                });
            } catch (error) {

            }
        }
    }, [
        threeDSecureEnabled,
        vaulted,
        client,
        addNotice
    ]);

    useEffect(() => {
        if (instance) {
            const unsubscribe = onPaymentDataFilter((data, {result, name, shippingData, billing}) => {
                return new Promise((resolve, reject) => {
                    const {needsShipping, shippingAddress} = shippingData;
                    const {billingData, cartTotal, currency} = billing;
                    instance.verifyCard({
                        amount: removeNumberPrecision(cartTotal.value, currency.minorUnit),
                        nonce: result.nonce,
                        bin: result?.details?.bin,
                        email: billingData.email || '',
                        billingAddress: {
                            givenName: billingData.first_name,
                            surname: billingData.last_name,
                            phoneNumber: billingData.phone,
                            streetAddress: billingData.address_1,
                            extendedAddress: billingData.address_2,
                            locality: billingData.city,
                            region: billingData.state,
                            postalCode: billingData.postcode,
                            countryCodeAlpha2: billingData.country
                        },
                        additionalInformation: needsShipping ? {
                            shippingGivenName: shippingAddress.first_name,
                            shippingSurname: shippingAddress.last_name,
                            shippingAddress: {
                                streetAddress: shippingAddress.address_1,
                                extendedAddress: shippingAddress.address_2,
                                locality: shippingAddress.city,
                                region: shippingAddress.state,
                                postalCode: shippingAddress.postcode,
                                countryCodeAlpha2: shippingAddress.country
                            }
                        } : {},
                        onLookupComplete: (data, next) => next()
                    }, (error, payload) => {
                        if (error) {
                            reject(error);
                        } else {
                            data.meta.paymentMethodData[`${name}_nonce_key`] = payload.nonce;
                            resolve(data);
                        }
                    });
                })
            }, 20);
            return () => unsubscribe();
        }
    }, [instance]);

    return instance;
}

export default useThreeDSecure;