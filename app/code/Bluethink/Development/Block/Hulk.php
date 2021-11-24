<?php 
 namespace Bluethink\Development\Block;
 
 use Magento\Framework\View\Element\Template;
 use Magento\Backend\Block\Template\Context;

class Hulk extends Template
  {

protected $_subscriberFactory;
protected $_customerRepositoryInterface;
protected $messageManager;

public function __construct(
    
    \Magento\Newsletter\Model\SubscriberFactory $subscriberFactory,
    \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
    \Magento\Framework\Message\ManagerInterface $messageManager, Context $context
    
) {
    $this->_subscriberFactory = $subscriberFactory;
    $this->_customerRepositoryInterface = $customerRepositoryInterface;
    $this->messageManager = $messageManager;

    parent::__construct($context); 
}

public function subscribeByCustomerId($customerId)
{
    $customer = $this->_customerRepositoryInterface->getById($customerId);
    $email = $customer->getEmail();

    $subscriber = $this->_subscriberFactory->create()->loadByEmail($email);
    if ($subscriber->getId()
        && $subscriber->getSubscriberStatus() == \Magento\Newsletter\Model\Subscriber::STATUS_SUBSCRIBED
    ) {
        return $this->messageManager->addSuccess(__("This email address is already subscribed."));
    } else {
        $this->_subscriberFactory->create()->subscribe($email);
        return $this->messageManager->addSuccess(__('Thank you for your subscription.'));
    }
}
}