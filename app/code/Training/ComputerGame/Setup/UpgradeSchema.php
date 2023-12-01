<?php

namespace Training\ComputerGame\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->insertData($setup);
        }

        $setup->endSetup();
    }

    private function insertData(ModuleDataSetupInterface $setup)
    {
        $connection = $setup->getConnection();

        $data = [
            [
                'name' => 'Game 1',
                'type' => 'RPG',
                'RPG' => 1,
                'RTS' => 0,
                'MMO' => 0,
                'Simulator' => 0,
                'Shooter' => 1,
                'trial_period' => 30,
                'release_date' => '2023-01-01',
            ],
        ];

        $table = $setup->getTable('computer_games');
        $connection->insertMultiple($table, $data);
    }
}

?>