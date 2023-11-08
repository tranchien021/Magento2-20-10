<?php
namespace Training\RedirectHome\Plugin;

class CustomNotFoundRedirect
{
    protected $resultRedirectFactory;

    public function __construct(
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
    ) {
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    public function aroundExecute(
        \Magento\Cms\Controller\Noroute\Index $subject,
        \Closure $proceed
    ) {
        // Chuyển hướng đến trang chủ
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('/');
        return $resultRedirect;
    }
}
