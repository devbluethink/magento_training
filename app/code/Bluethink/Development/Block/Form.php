<?php

namespace Bluethink\Development\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Customer\Model\Session;
use Magento\Newsletter\Model\ResourceModel\Subscriber\CollectionFactory;
use Magento\Newsletter\Model\SubscriberFactory;



class Form extends Template
{
    protected $_session;

    protected $_context;

    protected $_subscriberCollection;


    
    public function __construct(SubscriberFactory $subscriberFactory, CollectionFactory $subscriberCollection, Session $session, Context $context, array $data = [])
    {
           $this->_session = $session;

           $this->_subscriberCollection = $subscriberCollection;

          $this->subscriberFactory = $subscriberFactory;
           
           parent::__construct($context, $data);    
    }
   
   public function getCustomerEmail()
   {

    $om = \Magento\Framework\App\ObjectManager::getInstance();
    $customerSession = $om->create('Magento\Customer\Model\Session');
    if($customerSession->isLoggedIn()) {
    $email = $customerSession->getCustomer()->getEmail();
        // $email = $customerSession->getEmail();
    return $email; 
    }
    }

   // public function getSubscriberCollection() 
   // {
   //  $Collection = $this->_subscriberCollection->create();
   //  return $Collection;
   //  }

      public function checkSubscriber($email)
      {
            
          $status = $this->subscriberFactory->create()->loadByEmail($email)->isSubscribed();

           return $status;
    
       }


}















