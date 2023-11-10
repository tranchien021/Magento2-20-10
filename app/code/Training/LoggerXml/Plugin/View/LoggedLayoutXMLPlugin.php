<?php

namespace Training\LoggerXml\Plugin\View;

use Magento\Framework\View\LayoutInterface;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class LoggedLayoutXMLPlugin
{
   
    protected $_logger;
    public function __construct()
    {
        $this->_logger = new Logger('custom_logger');
        $this->_logger->pushHandler(new StreamHandler(BP . '/var/log/custom_log.log'));
    }
    public function afterGenerateXml(LayoutInterface $subject, $result)
    {
        $update = $subject->getUpdate();
        $xml = $update->asSimplexml();
        $xmlCount = $xml->count();
        $this->_logger->debug('Number of XML nodes: ' . $xmlCount);
        $this->_logger->debug('Layout XML: ' . $xml->asXML());

        return $result;
    }
}