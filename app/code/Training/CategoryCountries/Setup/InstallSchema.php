<?php
namespace Training\CategoryCountries\Setup;

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

        $table = $installer->getConnection()->newTable(
            $installer->getTable('category_countries')
        )->addColumn(
            'category_country_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Category Country ID'
        )->addColumn(
            'category_id',
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Category ID'
        )->addColumn(
            'country_id',
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Country ID'
        )->addIndex(
            $installer->getIdxName('category_countries', ['category_id']),
            ['category_id']
        )->addIndex(
            $installer->getIdxName('category_countries', ['country_id']),
            ['country_id']
        )->setComment(
            'Category Countries Table'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}


?>