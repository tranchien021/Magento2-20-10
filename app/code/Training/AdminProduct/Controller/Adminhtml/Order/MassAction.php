<?php
namespace Training\AdminProduct\Controller\Adminhtml\Order;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;
use Psr\Log\LoggerInterface;

class MassAction extends \Magento\Backend\App\Action
{
    protected $filter;
    protected $collectionFactory;
    protected $logger;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->logger = $logger;
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $count = 0;
    
        // Lấy danh sách ID của các đơn hàng
        $orderIds = $collection->getAllIds();
    
        // Nếu có ít nhất một đơn hàng
        if (!empty($orderIds)) {
            try {
                // Tạo đối tượng đơn hàng và cập nhật trường 'require_verification' thành 0
                $order = $this->_objectManager->create(\Magento\Sales\Model\Order::class);
    
                foreach ($orderIds as $orderId) {
                    $order->load($orderId); // Load đơn hàng
                    $order->setData('require_verification', 0); // Đặt giá trị mới cho trường 'require_verification'
                    $order->save(); // Lưu lại
                    $count++;
                }
    
                // Hiển thị thông báo thành công
                $this->messageManager->addSuccessMessage(__('A total of %1 order(s) have been updated.', $count));
            } catch (\Exception $e) {
                // Hiển thị thông báo lỗi nếu có vấn đề xảy ra
                $this->messageManager->addErrorMessage(__('An error occurred while updating orders.'));
                $this->_objectManager->get(\Psr\Log\LoggerInterface::class)->critical($e);
            }
        }
    
        $this->logger->info('Kiểm tra MassAction trong Admin');
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('sales/order/index');
    }
}
