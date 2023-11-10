<?php 

namespace Training\CustomBlock\Controller\Layout;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class OnePage extends Action
{
    private $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $customBlock = $this->_view->getLayout()->createBlock(\Training\CustomBlock\Block\CustomBlock::class);
        echo $customBlock->toHtml();
        return $this->pageFactory->create();
    }
}

?>