<?php
namespace Training\CustomEntity\Model\ResourceModel\CustomEntity;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\CustomEntity\Model\CustomEntity as CustomEntityModel;
use Training\CustomEntity\Model\ResourceModel\CustomEntity as CustomEntityResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'custom_entity_collection';

    protected function _construct()
    {
        $this->_init(CustomEntityModel::class, CustomEntityResourceModel::class);
    }
}
