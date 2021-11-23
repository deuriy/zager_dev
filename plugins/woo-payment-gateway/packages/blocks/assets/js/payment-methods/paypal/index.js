import {useState, useEffect, useRef} from '@wordpress/element';
import {registerExpressPaymentMethod} from '@woocommerce/blocks-registry';
import {create as createPayPalCheckout} from '@braintree/paypal-checkout';
import {getClientToken, getSettings, getMerchantAccount, cartContainsSubscription} from "../utils";
import {Notice, PaymentMethod} from "../../components";
import {usePaymentMethodDataContext} from "../context";
import {useLoadPayPal, usePayPalOptions} from "./hooks";
import {useExpressBreakpointWidth} from "../hooks";

const getData = getSettings('braintree_paypal');

const PayPalContainer = ({billing, shippingData, eventRegistration, emitResponse, onClick, onClose}) => {
    const {currency} = billing;
    const {notice} = usePaymentMethodDataContext();
    const {addNotice} = notice;
    const [paypalCheckoutInstance, setPayPalCheckoutInstance] = useState(null);
    const [isPayPalButton, setIsPayPalButton] = useState(false);
    const paypalButton = useRef();
    useExpressBreakpointWidth({breakpoint: 375});
    const paypal = useLoadPayPal({
        paypalCheckoutInstance,
        currency: currency.code,
        clientToken: getClientToken(),
        addNotice,
        intent: getData('intent'),
        flow: cartContainsSubscription() ? 'vault' : 'checkout',
        partnerCode: getData('partnerCode')
    });
    const options = usePayPalOptions({
        getData,
        addNotice,
        paypal,
        paypalCheckoutInstance,
        billing,
        shippingData,
        eventRegistration,
        emitResponse,
        onClick,
        onClose
    })
    useState(() => {
        createPayPalCheckout({
            authorization: getClientToken(),
            merchantAccountId: getMerchantAccount(currency.code)
        }).then(instance => {
            setPayPalCheckoutInstance(instance)
        }).catch(error => {
            addNotice(error)
        });
    }, []);

    useEffect(() => {
        if (paypal) {
            paypal.Buttons.driver("react", {React, ReactDOM});
            paypalButton.current = paypal.Buttons.driver("react", {React, ReactDOM});
            setIsPayPalButton(true);
        }
    }, [paypal]);
    const PayPalButton = paypalButton.current;
    const BUTTON = isPayPalButton && options ? options.map(option => {
        return <PayPalButton key={option.fundingSource} {...option}/>
    }) : null;
    return (
        <>
            {notice?.notice && <Notice notice={notice.notice} onRemove={notice.removeNotice}/>}
            {BUTTON}
        </>
    )
}

registerExpressPaymentMethod({
    name: getData('name'),
    canMakePayment: () => {
        return true;
    },
    content: <PaymentMethod content={PayPalContainer}
                            title={getData('title')}
                            description={getData('description')}
                            name={getData('name')}
                            icon={getData('icon')}
                            getData={getData}
                            isExpress={true}
                            advancedFraudOptions={{paypal: true}}/>,
    edit: <PaymentMethod content={PayPalContainer} getData={getData}/>,
    supports: {
        showSavedCards: getData('features').includes('tokenization'),
        showSaveOption: true,
        features: getData('features')
    }
});