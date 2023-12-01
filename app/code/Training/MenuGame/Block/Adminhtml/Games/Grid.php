<?php
namespace Training\MenuGame\Block\Adminhtml\Games;

use Magento\Backend\Block\Widget\Grid\Container;

class Grid extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_games_grid';
        $this->_blockGroup = 'Training_MenuGame';
        $this->_headerText = __('Games Grid');

        parent::_construct();
    }
}
