<?php
namespace Training\ComputerGame\Model\ResourceModel\Game;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\ComputerGame\Model\GameModel;
use Training\ComputerGame\Model\ResourceModel\Game as GameResourceModel;

class GameCollection extends AbstractCollection
{
    protected $_idFieldName = 'game_id';

    protected function _construct()
    {
        $this->_init(GameModel::class, GameResourceModel::class);
    }
}
