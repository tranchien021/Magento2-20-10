<?php
namespace Training\AdminProduct\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('computer_games')
        )->addColumn(
            'game_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Game ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Game Name'
        )->addColumn(
            'type',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            ['nullable' => false],
            'Game Type'
        )->addColumn(
            'trial_period',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Trial Period (Days)'
        )->addColumn(
            'release_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            null,
            ['nullable' => true],
            'Release Date'
        )->setComment(
            'Computer Games Table'
        );

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
