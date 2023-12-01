<?php
namespace Training\VendorTable\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('training_product_vendor'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'product_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Product ID'
            )
            ->addColumn('vendor_id', Table::TYPE_INTEGER, null, ['nullable' => false], 'Vendor ID')
            ->addForeignKey(
                $installer->getFkName('training_product_vendor', 'product_id', 'catalog_product_entity', 'entity_id'),
                'product_id',
                $installer->getTable('catalog_product_entity'),
                'entity_id',
                Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $installer->getFkName('training_product_vendor', 'vendor_id', 'training_vendor', 'vendor_id'),
                'vendor_id',
                $installer->getTable('training_vendor'),
                'vendor_id',
                Table::ACTION_CASCADE
            )
            ->setComment('Product Vendor Link Table');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
