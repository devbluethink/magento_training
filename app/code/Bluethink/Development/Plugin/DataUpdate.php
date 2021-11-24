<?php
 
namespace Bluethink\Development\Plugin;
 
use Magento\Checkout\Controller\Sidebar\UpdateItemQty as coreUpdateItemQty;
use Magento\Framework\Json\Helper\Data as coreData;
use Magento\Checkout\Model\Sidebar;
use Magento\Catalog\Model\ProductFactory;
use Magento\Checkout\Model\Cart;
use Magento\Framework\Serialize\SerializerInterface;

class DataUpdate
{
    protected $jsonHelper;
    protected $sidebar;
    protected $quoteItemFactory;
    protected $productFactory;
    protected $cart;
    protected $serializer;
 
 
    public function __construct(
       
        coreData $jsonHelper,
        Sidebar $sidebar,
        Cart $cart,
        SerializerInterface $serializer,
        ProductFactory $productFactory
    )
    {
        
        $this->jsonHelper = $jsonHelper;
        $this->sidebar = $sidebar;
        $this->productFactory = $productFactory;
        $this->serializer = $serializer;
        $this->cart = $cart;
    }
 
    public function aroundExecute(coreUpdateItemQty $subject, \Closure $proceed)
    {

 
 $conditon =true;
        try 
        {
 
            if($conditon)
            {
                $errorMsg = 'Sorry we are able to add product range of maximum ';

                return $subject->getResponse()->representJson(
                    $this->jsonHelper->jsonEncode($this->sidebar->getResponseData($errorMsg))
                );
            }
        } 
        
        catch (\Exception $e)
         {
            return $subject->getResponse()->representJson(
                $this->jsonHelper->jsonEncode($this->sidebar->getResponseData($e->getMessage()))
            );
        }
        return $proceed();
 
    }
}







