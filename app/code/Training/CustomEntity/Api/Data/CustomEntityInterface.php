<?php
namespace Training\CustomEntity\Api\Data;

interface CustomEntityInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    
    public function getEntityId();
    public function setEntityId($entityId);

    public function getName();
    public function setName($name);
}
