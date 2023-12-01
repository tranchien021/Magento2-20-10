<?php
namespace Training\VendorTable\Model;

use Magento\Framework\Model\AbstractModel;

class Vendor extends AbstractModel
{
    protected $_idFieldName = 'vendor_id';
    protected $_eventPrefix = 'training_vendor';

    protected function _construct()
    {
        $this->_init('Training\VendorTable\Model\ResourceModel\Vendor');
    }
}
