import {registerCustomForm} from "../custom-form/registry";
import BootstrapForm from './bootstrap';

registerCustomForm({
    id: 'bootstrap_form',
    content: <BootstrapForm/>,
    breakpoint: 425,
    fields: ['number', 'expirationDate', 'cvv'],
    className: 'bootstrap-md'
})