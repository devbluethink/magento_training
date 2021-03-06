<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethink\OfflinePayment\Block\Form;

/**
 * Block for Cash On Delivery payment method form
 */
class Cashondelivery extends \Magento\OfflinePayments\Block\Form\AbstractInstruction
{
    /**
     * Cash on delivery template
     *
     * @var string
     */
    protected $_template = 'Bluethink_OfflinePayment::form/cashondelivery.phtml';
}
