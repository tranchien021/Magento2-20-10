<?php
namespace Training\VendorTable\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Training\VendorTable\Model\ProductVendorFactory;

class InstallData implements InstallDataInterface
{
    private $productVendorFactory;

    public function __construct(ProductVendorFactory $productVendorFactory)
    {
        $this->productVendorFactory = $productVendorFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // Add your data here
        $data = [
            ['product_id' => 1, 'vendor_id' => 1],
            ['product_id' => 2, 'vendor_id' => 2],
            ['product_id' => 3, 'vendor_id' => 1],
            ['product_id' => 4, 'vendor_id' => 3],
            ['product_id' => 5, 'vendor_id' => 2],
            ['product_id' => 6, 'vendor_id' => 1],
            ['product_id' => 7, 'vendor_id' => 3],
            ['product_id' => 8, 'vendor_id' => 2],
            ['product_id' => 9, 'vendor_id' => 1],
            ['product_id' => 10, 'vendor_id' => 3],
            // Add more data as needed
        ];

        foreach ($data as $item) {
            $productVendor = $this->productVendorFactory->create();
            $productVendor->addData($item)->save();
        }

        $setup->endSetup();
    }
}
