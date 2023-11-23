<?php

namespace Training\CustomEntity\Model;

use Magento\Framework\Model\AbstractModel;

class CustomEntity extends AbstractModel
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('Training\CustomEntity\Model\ResourceModel\CustomEntity');
    }
}
