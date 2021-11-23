import {CardNumber, CardExpirationDate, CardCVV} from "../../hosted-fields";
import './style.scss';

export const BootstrapForm = (props) => {
    return (
        <div className='wc-braintree-blocks-bootstrap__form'>
            <div className='row'>
                <div className='col-md-6'>
                    <div className={'form-group cardnumber-form-group'}>
                        <label>{'Card Number'}</label>
                        <CardNumber className={'bootstrap-input'} {...props}/>
                    </div>
                </div>
                <div className='col-md-3'>
                    <div className={'form-group'}>
                        <label>{'Exp Date'}</label>
                        <CardExpirationDate className={'bootstrap-input'} {...props}/>
                    </div>
                </div>
                <div className='col-md-3'>
                    <div className={'form-group'}>
                        <label>{'CVV'}</label>
                        <CardCVV className={'bootstrap-input'} {...props}/>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default BootstrapForm;