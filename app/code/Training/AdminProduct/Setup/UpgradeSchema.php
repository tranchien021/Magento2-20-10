<?php
namespace Training\AdminProduct\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        
        $orderTable = $setup->getTable('sales_order');
        
        // Thêm cột require_verification vào bảng sales_order
        $setup->getConnection()
            ->addColumn(
                $orderTable,
                'require_verification',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    'nullable' => false,
                    'default' => 1,
                    'comment' => 'Require Verification'
                ]
            );

        $setup->endSetup();
    }
}