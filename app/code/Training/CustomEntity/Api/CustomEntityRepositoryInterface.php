<?php

namespace Training\CustomEntity\Api;

use Training\CustomEntity\Api\Data\CustomEntityInterface;

interface CustomEntityRepositoryInterface
{
    /**
     * Retrieve list of custom entities
     *
     * @return \Training\CustomEntity\Api\Data\CustomEntityInterface[]
     */
    public function getList();
}


?>