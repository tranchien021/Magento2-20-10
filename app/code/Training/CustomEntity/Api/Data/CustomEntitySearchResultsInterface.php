<?php

namespace Training\CustomEntity\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CustomEntitySearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Vendor\Module\Api\Data\CustomEntityInterface[]
     */
    public function getItems();

    /**
     * @param \Vendor\Module\Api\Data\CustomEntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
