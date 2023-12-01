<?php
namespace Training\ComputerGame\Model;
class GameModel extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Training\ComputerGame\Model\ResourceModel\Game::class);
    }
}