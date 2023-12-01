<?php
namespace Training\VendorTable\Block\Product;

use Magento\Catalog\Model\Product;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Block\Product\View\AbstractView;
use Training\VendorTable\Model\ProductVendorFactory;
use Training\VendorTable\Model\VendorFactory;
use Psr\Log\LoggerInterface;



class Vendors extends Template
{
    protected $coreRegistry;
    protected $productVendorFactory;
    protected $vendorFactory;
    protected $logger;

    public function __construct(
        Context $context,
        Registry $registry,
        ProductVendorFactory $productVendorFactory,
        VendorFactory $vendorFactory,
        LoggerInterface $logger,
        array $data = []
    ) {
        $this->coreRegistry = $registry;
        parent::__construct($context, $data);
        $this->productVendorFactory = $productVendorFactory;
        $this->vendorFactory = $vendorFactory;
        $this->logger = $logger;
    }

    public function getCurrentProduct()
    {
        return $this->coreRegistry->registry('current_product');
    }

    public function getVendorsForProduct()
    {
        $product = $this->getCurrentProduct();
        $vendorData = [];

        if ($product) {
            $productId = $product->getId();

            // Use the product ID to retrieve vendor information
            $productVendorCollection = $this->productVendorFactory->create()->getCollection();
            $productVendorCollection->addFieldToFilter('product_id', $productId);

            // Join the tables to get vendor information
            $productVendorCollection->getSelect()
                ->join(
                    ['vendor' => $productVendorCollection->getTable('training_vendor')],
                    'main_table.vendor_id = vendor.vendor_id',
                    ['vendor_name' => 'name']
                );

            // Loop through the result to build vendor data array
            foreach ($productVendorCollection as $productVendor) {
                $vendorData[] = [
                    'id' => $productVendor->getVendorId(),
                    'name' => $productVendor->getVendorName(),
                    // Add other vendor details as needed
                ];
            }
        }
        return $vendorData;
    }
}
