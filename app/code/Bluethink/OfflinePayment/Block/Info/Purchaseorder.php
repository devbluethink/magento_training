<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethink\OfflinePayment\Block\Info;

class Purchaseorder extends \Magento\Payment\Block\Info
{
    /**
     * @var string
     */
    protected $_template = 'Bluethink_OfflinePayment::info/purchaseorder.phtml';

    /**
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('Bluethink_OfflinePayment::info/pdf/purchaseorder.phtml');
        return $this->toHtml();
    }
}
