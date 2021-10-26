<?php
namespace Bluethink\Dev\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
       $this->_pageFactory = $pageFactory;
        $this->_scopeConfig = $scopeConfig;
    }

    public function execute()
    {

          $myconfig = $this->_scopeConfig->getValue('bluethink/demo/customer_edit_page',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          echo $myconfig;

        return $this->_pageFactory->create();
    }
}










