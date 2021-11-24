<?php
namespace Bluethink\Development\Controller\Index;
use Magento\Framework\Message\ManagerInterface;

class Result extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;
    
    protected $_context;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request, ManagerInterface $massageInterface)
    {
        $this->_pageFactory = $pageFactory;
       
        $this->request = $request;

        $this->messageManager = $massageInterface;

        return parent::__construct($context);
    }

    public function execute()
    {
        $email = $this->request->getPost('email');
       
        $condition = is_string($email);
        
        if($condition)
        {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
        $subscriber = $objectManager->create('Magento\Newsletter\Model\SubscriberFactory'); 
        $subscribe=$subscriber->create()->subscribe($email);
        $subscribe->save();

        return $this->messageManager->addSuccess(__("This email address has been subscribed."));
         }
         else
         {
        return $this->messageManager->Notice(__("Please enter valid email"));
         }    
   
        $this->_pageFactory->create();

    }

}







