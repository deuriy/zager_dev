!function(){var e={713:function(e){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}},318:function(e){e.exports=function(e){return e&&e.__esModule?e:{default:e}}},609:function(e){"use strict";e.exports=window.jQuery},227:function(e){"use strict";e.exports=window.braintree.dataCollector},185:function(e){"use strict";e.exports=window.braintree.threeDSecure},606:function(e){"use strict";e.exports=window.wp.apiFetch}},t={};function n(o){var r=t[o];if(void 0!==r)return r.exports;var i=t[o]={exports:{}};return e[o](i,i.exports,n),i.exports}!function(){var e=n(318),t=e(n(713)),o=e(n(185)),r=e(n(227)),i=e(n(609)),c=e(n(606));function u(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}var a=null,l=null,d=function(e){var t,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return(null===(t=l)||void 0===t?void 0:t[e])||n},f=function(e,t){l[e]=t},s=function(){(0,i.default)(document).on("wfocu_external",v)},v=function(e,n){if(0<n.getTotal()&&!d("threeDSecureComplete",!1)){var o=d("vaultedNonce");n.inOfferTransaction=!0;var r=function(e){for(var n=1;n<arguments.length;n++){var o=null!=arguments[n]?arguments[n]:{};n%2?u(Object(o),!0).forEach((function(n){(0,t.default)(e,n,o[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):u(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}({amount:n.formatPrice(n.getTotal(),2,"","."),nonce:null==o?void 0:o.nonce,bin:null==o?void 0:o.details.bin,onLookupComplete:function(e,t){t()}},d("threeDSecureData"));a.verifyCard(r).then((function(e){var t,o;!e.liabilityShifted&&!e.liabilityShiftPossible||e.liabilityShifted?(wfocuCommons.addFilter("wfocu_front_charge_data",(function(t){var n;return t._wc_braintree_woofunnels_3ds_nonce=e.nonce,d("dataCollector")&&(t["".concat(d("paymentMethod"),"_device_data")]=null===(n=d("dataCollector"))||void 0===n?void 0:n.deviceData),f("threeDSecureComplete",!0),t})),n.sendBucket()):(null===(t=d("bucket"))||void 0===t||null===(o=t.swal)||void 0===o||o.hide(),b(),h())})).catch((function(e){var t,n,o,r,i;if(console.log(e),null==e||null===(t=e.details)||void 0===t||null===(n=t.originalError)||void 0===n||null===(o=n.details)||void 0===o||null===(r=o.originalError)||void 0===r||null===(i=r.error)||void 0===i?void 0:i.message){var c=e.details.originalError.details.originalError.error.message;p(c,"warning")}w(e)}))}else b()},w=function(e){wfocuCommons.addFilter("wfocu_front_charge_data",(function(t){return t._client_error=null==e?void 0:e.message,t})),b()},b=function(){d("bucket").inOfferTransaction=!1,d("bucket").EnableButtonState(),d("bucket").HasEventRunning=!1},p=function(e,t){var n,o;null===(n=d("bucket"))||void 0===n||null===(o=n.swal)||void 0===o||o.show({text:e,type:t}),setTimeout((function(){var e,t;null===(e=d("bucket"))||void 0===e||null===(t=e.swal)||void 0===t||t.hide()}),3e3)},h=function(){(0,c.default)({path:"/wc-braintree/v1/3ds/vaulted_nonce",method:"POST",data:{token:d("paymentMethodToken")}}).then((function(e){f("vaultedNonce",e.data)})).catch((function(e){return console.log(e)}))};(0,i.default)(document).on("wfocuBucketCreated",(function(e,t){var n,i;(l=null===(n=window)||void 0===n||null===(i=n.wfocu_vars)||void 0===i?void 0:i.wcBraintree).bucket=t,o.default.create({authorization:d("clientToken"),version:2}).then((function(e){!function(e){a=e}(e),s()})).catch((function(e){console.log(e),w(e)})),r.default.create({authorization:d("clientToken"),kount:!0}).then((function(e){return f("dataCollector",e)})).catch((function(e){console.log(e)}))}))}(),(window.wcBraintree=window.wcBraintree||{})["wc-braintree-woofunnels"]={}}();
//# sourceMappingURL=wc-braintree-woofunnels.js.map