<?php

namespace Training\ComputerGame\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Training\ComputerGame\Model\ResourceModel\Game\GameCollectionFactory;

class Delete extends Action
{
    protected $gameCollectionFactory;

    public function __construct(
        Context $context,
        GameCollectionFactory $gameCollectionFactory
    ) {
        parent::__construct($context);
        $this->gameCollectionFactory = $gameCollectionFactory;
    }

    public function execute()
    {
        $ids = $this->getRequest()->getParam('selected');
        if (!empty($ids)) {
            try {
                $gameCollection = $this->gameCollectionFactory->create();
                $gameCollection->addFieldToFilter('game_id', ['in' => $ids]);
                
                foreach ($gameCollection as $gameModel) {
                    $gameModel->delete();
                }

                $this->messageManager->addSuccessMessage(__('Xoá sản phẩm thành công'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        } else {
            $this->messageManager->addErrorMessage(__('Không có sản phẩm để xoá'));
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('computergame/index/index');
    }
}
