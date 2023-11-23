<?php
   
namespace Training\CustomEntity\Api\Data;

interface CustomEntityInterfaceFactory
{
    /**
     * @param array $data
     * @return \Training\CustomEntity\Api\Data\CustomEntityInterface
     */
    public function create(array $data = []);
}


?>