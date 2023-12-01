<?php
namespace Training\AclAdmin\Controller\Adminhtml\HelloWorld;

use Magento\Backend\App\Action;

class Index extends Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
