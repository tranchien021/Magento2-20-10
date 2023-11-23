<?php

namespace Training\CustomEntity\Model;

use Training\CustomEntity\Api\CustomEntityRepositoryInterface;
use Training\CustomEntity\Api\Data\CustomEntityInterface;
use Training\CustomEntity\Model\ResourceModel\CustomEntity\CollectionFactory;

class CustomEntityRepository implements CustomEntityRepositoryInterface
{
    protected $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}

?>