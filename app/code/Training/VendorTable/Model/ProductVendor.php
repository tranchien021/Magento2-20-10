<?php
namespace Training\VendorTable\Model;

use Magento\Framework\Model\AbstractModel;

class ProductVendor extends AbstractModel
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'training_product_vendor';

    protected function _construct()
    {
        $this->_init('Training\VendorTable\Model\ResourceModel\ProductVendor');
    }
}
