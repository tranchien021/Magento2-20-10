<?php

namespace Training\GetAdmin\Controller\Adminhtml\Create;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Menu Admin News')));
        return $resultPage;
    }

    public function _isAllowed()
    {
        $secret = $this->getRequest()->getParam('secret');
        return !empty($secret);
    }
   
}
