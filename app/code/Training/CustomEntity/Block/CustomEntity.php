<?php 

namespace Training\CustomEntity\Block;

use Magento\Framework\View\Element\Template;
use Training\CustomEntity\Api\CustomEntityRepositoryInterface;

class CustomEntity extends Template
{
    protected $customEntityRepository;

    public function __construct(
        Template\Context $context,
        CustomEntityRepositoryInterface $customEntityRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customEntityRepository = $customEntityRepository;
    }

    public function getCustomEntities()
    {
        return $this->customEntityRepository->getList();
    }
}



?>