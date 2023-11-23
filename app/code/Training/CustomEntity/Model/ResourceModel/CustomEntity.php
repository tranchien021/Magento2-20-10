<?php
namespace Training\CustomEntity\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomEntity extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('custom_entity', 'entity_id');
    }
}

?>

