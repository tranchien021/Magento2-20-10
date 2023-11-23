<?php
namespace Training\CategoryCountries\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class InstallData implements InstallDataInterface
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $data = [
            ['category_id' => 1, 'country_id' => 1],
            ['category_id' => 1, 'country_id' => 2],
        ];

        $setup->getConnection()->insertMultiple($setup->getTable('category_countries'), $data);
        $setup->endSetup();
    }
}


?>