<?php

namespace Training\VendorTable\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\VendorTable\Model\Vendor as VendorModel;
use Training\VendorTable\Model\ResourceModel\Vendor as VendorResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'vendor_id';

    protected function _construct()
    {
        $this->_init(VendorModel::class, VendorResourceModel::class);
    }
}

?>