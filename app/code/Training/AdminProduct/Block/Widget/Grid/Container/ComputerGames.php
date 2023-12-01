<?php
namespace Training\AdminProduct\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class ComputerGames extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_computerGames';
        $this->_blockGroup = 'training_adminproduct';
        $this->_headerText = __('Computer Games');
        $this->_addButtonLabel = __('Add New Game');
        parent::_construct();
    }
}
