<?php
namespace Training\ComputerGame\Setup;

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
            $installer->getTable('computer_games')
        )->addColumn(
            'game_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Game ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Name'
        )->addColumn(
            'type',
            Table::TYPE_TEXT,
            50,
            ['nullable' => false],
            'Type'
        )->addColumn(
            'RPG',
            Table::TYPE_BOOLEAN,
            null,
            ['nullable' => false],
            'RPG'
        )->addColumn(
            'RTS',
            Table::TYPE_BOOLEAN,
            null,
            ['nullable' => false],
            'RTS'
        )->addColumn(
            'MMO',
            Table::TYPE_BOOLEAN,
            null,
            ['nullable' => false],
            'MMO'
        )->addColumn(
            'Simulator',
            Table::TYPE_BOOLEAN,
            null,
            ['nullable' => false],
            'Simulator'
        )->addColumn(
            'Shooter',
            Table::TYPE_BOOLEAN,
            null,
            ['nullable' => false],
            'Shooter'
        )->addColumn(
            'trial_period',
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Trial Period'
        )->addColumn(
            'release_date',
            Table::TYPE_DATE,
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

?>