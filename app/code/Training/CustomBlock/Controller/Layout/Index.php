<?php 
namespace Training\CustomBlock\Controller\Layout;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Element\Text;

class Index extends Action
{
    private $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $textBlock = $this->_view->getLayout()->createBlock(Text::class);
        $textBlock->setText('Xin chào từ Text Block!');
        echo $textBlock->toHtml();
        return $this->pageFactory->create();
    }
}



?>