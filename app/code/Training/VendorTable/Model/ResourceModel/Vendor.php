<?php
namespace Training\VendorTable\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Vendor extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('training_vendor', 'vendor_id');
    }
}
