<?php
namespace Training\Flushing\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CaptureOutput implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        $content = $response->getBody();
        $logPath = '/var/log/page_output.log';
        file_put_contents(BP . $logPath, $content, FILE_APPEND);
    }
}
