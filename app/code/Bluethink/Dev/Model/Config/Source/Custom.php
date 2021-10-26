<?php
namespace Bluethink\Dev\Model\Config\Source;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Shipping\Model\Config;
use Magento\Shipping\Model\Config\Source\Allmethods;
class Custom 
{
 
 protected $scopeConfig;
 protected $shippingmodelconfig; 

 public function __construct(Config $shippingmodelconfig, ScopeConfigInterface $scopeConfig, Allmethods $shippingAllmethods)
   {
        $this->shippingmodelconfig = $shippingmodelconfig;
        $this->scopeConfig = $scopeConfig;
        $this->shippingAllmethods = $shippingAllmethods;
    }




    /**
     * Returns options for form multiselect
     *
     * @return array
     */
   
    public function toOptionArray()
    {
      
      $data = $this->shippingAllmethods->toOptionArray();  
      return $data;
      
    }

}