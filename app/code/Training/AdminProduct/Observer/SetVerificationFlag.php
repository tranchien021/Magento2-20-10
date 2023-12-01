<?php
namespace Training\AdminProduct\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order;
use Magento\Checkout\Model\Session;
use Psr\Log\LoggerInterface;

class SetVerificationFlag implements ObserverInterface
{
    protected $checkoutSession;
    protected $logger;

    public function __construct(
        Session $checkoutSession,
        LoggerInterface $logger
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->logger = $logger;
    }
    public function execute(Observer $observer)
    {
        $this->logger->info('Kiểm tra observer');
        $order = $observer->getEvent()->getOrder();
        $isAdminOrder = $this->isOrderPlacedFromAdmin($order);
        $this->logger->info('isAdminOrder: ' . ($isAdminOrder ? 'true' : 'false'));
        $order->setData('require_verification', $isAdminOrder ? 0 : 1)->save();
        return $this;
    }

    private function isOrderPlacedFromAdmin(Order $order)
    {
        $this->logger->info('Checking if order is placed from Admin.');
        $customerId = $order->getOrigData('customer_id');
        return empty($customerId);
    }
}


?>