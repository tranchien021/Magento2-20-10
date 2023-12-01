<?php
    
namespace Training\VendorTable\Model\ResourceModel\ProductVendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\VendorTable\Model\ProductVendor as ProductVendorModel;
use Training\VendorTable\Model\ResourceModel\ProductVendor as ProductVendorResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(ProductVendorModel::class, ProductVendorResourceModel::class);
    }
}

?>