<?php
namespace Bluethink\Development\Plugin\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor;

class LayoutProcessorPlugin
{
    protected $_logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function afterProcess(LayoutProcessor $subject, array $jsLayout)
    {
       

         $configuration = $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'];

        foreach ($configuration as $paymentGroup => $groupConfig) 
        {

            if (isset($groupConfig['component']) AND $groupConfig['component'] === 'Magento_Checkout/js/view/billing-address')
             {

            $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                ['payment']['children']['payments-list']['children'][$paymentGroup]['children']['form-fields']['children']['custom_attribute_code'] = [
                    'component' => 'Magento_Ui/js/form/element/abstract',
                    'config' => [
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/input',
                        'id' => 'custom_attribute_id',
                    ],
                    'dataScope' => $groupConfig['dataScopePrefix'] . '.custom_attribute_id',
                    'label' => __('Alternative Mobile No.'),
                    'provider' => 'checkoutProvider',
                    'visible' => true,
                    'validation' => [
                        'required-entry' => true,
                        'min_text_length' => 0,
                    ],
                    'sortOrder' => 300,
                    'id' => 'custom_attribute_id'
                ];
            }
            else 
            {
                 $customAttributeCode = 'custom_field';

           $customField = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'tooltip' => [
                    'description' => 'this is custom field',
                ],
            ],

            'dataScope' => 'shippingAddress.custom_attributes' . '.' . $customAttributeCode,
            'label' => __('Alternative Mobile No.'),
            'provider' => 'checkoutProvider',
            'sortOrder' => 250,
            'validation' => [
                'required-entry' => false
            ],
            'options' => [],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
        ];


        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $customField;
            }
        }

             return $jsLayout;

    }
}
