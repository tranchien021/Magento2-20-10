<?php
namespace Training\HelloWorld\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\CatalogUrlRewrite\Model\CategoryUrlPathGenerator;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $resultRedirectFactory;
    protected $categoryUrlPathGenerator;
	

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
        CategoryUrlPathGenerator $categoryUrlPathGenerator
		
		)
	{
		return parent::__construct($context);
		$this->_pageFactory = $pageFactory;
		$this->resultRedirectFactory = $resultRedirectFactory;
        $this->categoryUrlPathGenerator = $categoryUrlPathGenerator;
	}

	public function execute()
	{
        $categoryId = '3';
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('catalog/category/view', ['id' => $categoryId]);
        return $resultRedirect;
	}
}