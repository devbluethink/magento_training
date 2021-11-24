/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/* @api */
define([
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
], function (Component, rendererList) {
    'use strict';

    rendererList.push(
        {
            type: 'checkmo',
            component: 'Bluethink_OfflinePayment/js/view/payment/method-renderer/checkmo-method'
        },
        {
            type: 'banktransfer',
            component: 'Bluethink_OfflinePayment/js/view/payment/method-renderer/banktransfer-method'
        },
        {
            type: 'cashondelivery',
            component: 'Bluethink_OfflinePayment/js/view/payment/method-renderer/cashondelivery-method'
        },
        {
            type: 'purchaseorder',
            component: 'Bluethink_OfflinePayment/js/view/payment/method-renderer/purchaseorder-method'
        }
    );

    /** Add view logic here if needed */
    return Component.extend({});
});
