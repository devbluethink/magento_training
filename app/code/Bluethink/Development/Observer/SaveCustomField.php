<?php 

namespace Bluethink\Development\Observer;

class SaveCustomField implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
     {
        $order = $observer->getEvent()->getOrder();
        
        $quote = $observer->getEvent()->getQuote();

        $order->setData('custom_field', $quote->getCustomField());


        
        if ($quote->getBillingAddress()) 
        {

            $order->getBillingAddress()->setCustomAttributeId($quote->getBillingAddress()->getExtensionAttributes()->getCustomAttributeId());
        }
        
        if (!$quote->isVirtual())
         {            
            $order->getShippingAddress()->setCustomAttributeId($quote->getShippingAddress()->getCustomAttributeId());
         }
        
        return $this;
    }
}
