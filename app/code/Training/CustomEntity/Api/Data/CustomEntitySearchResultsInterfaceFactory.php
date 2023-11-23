<?php

namespace Training\CustomEntity\Api\Data;

use Magento\Framework\Api\SearchResultsInterfaceFactory;

interface CustomEntitySearchResultsInterfaceFactory extends SearchResultsInterfaceFactory
{
    /**
     * @return \Training\CustomEntity\Api\Data\CustomEntitySearchResultsInterface
     */
    public function create();
}
