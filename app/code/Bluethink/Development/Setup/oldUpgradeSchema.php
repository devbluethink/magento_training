<?php

namespace Bluethink\Development\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {            
        // Version of module in setup table is less then the give value.
        if (version_compare($context->getVersion(), '0.1.4', '<'))

        {

    

         $setup->getConnection()->dropColumn($setup->getTable('sales_order_grid'), 'delivery_date');

       
         $setup->getConnection()->dropColumn($setup->getTable('quote'), 'delivery_date');

         $setup->getConnection()->dropColumn($setup->getTable('sales_order'), 'delivery_date');

            
        }

    }
}






       