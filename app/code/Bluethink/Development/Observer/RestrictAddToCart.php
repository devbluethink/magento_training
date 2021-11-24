<?php

namespace Bluethink\Development\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Checkout\Model\Cart;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Catalog\Model\Product;
use Magento\Framework\App\Http\Context as customerSession;
use Magento\Framework\App\Config\ScopeConfigInterface;

class RestrictAddToCart implements ObserverInterface
{
    protected $cart;
    protected $messageManager;
    protected $redirect;
    protected $request;
    protected $product;
    protected $customerSession;
    protected $scopeConfig;

    public function __construct(RedirectInterface $redirect, Cart $cart, ManagerInterface $messageManager,  RequestInterface $request, Product $product, customerSession $session, ScopeConfigInterface $scopeConfig){
        $this->redirect = $redirect;
        $this->cart = $cart;
        $this->messageManager = $messageManager;
        $this->request = $request;
        $this->product = $product;
        $this->customerSession = $session;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
            $postValues = $this->request->getPostValue();
            
            $cartSubtotal = $this->cart->getQuote()->getGrandTotal();

            $cartItemsCount = $this->cart->getQuote()->getItemsCount();

            $rangeTotal = $this->scopeConfig->getValue('bluethink/demo/add_to_cart', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);


        
            if ($cartSubtotal >= $rangeTotal) 
            {
                $observer->getRequest()->setParam('product', false);

                 $this->messageManager->addErrorMessage(__('Sorry we are able to add product range of maximum '.$rangeTotal));

                 return $this;
            
            }

            return;
            
    }
}