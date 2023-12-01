<?php
namespace Training\ComputerGame\Model;

use Training\ComputerGame\Model\ResourceModel\Game\GameCollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Training\ComputerGame\Model\GameModelFactory;

class DataProvider extends AbstractDataProvider
{
    protected $gameFactory;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        GameCollectionFactory $collectionFactory,
        GameModelFactory $gameFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->gameFactory = $gameFactory;
    }

    public function getData()
    {
        return [];
    }

}
