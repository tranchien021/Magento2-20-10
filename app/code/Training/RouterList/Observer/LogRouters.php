<?php 
namespace Training\RouterList\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\RouterList;

    class LogRouters implements ObserverInterface
    {
        protected $logger;
        protected $routerList;

        public function __construct(LoggerInterface $logger, RouterList $routerList)
        {
            $this->logger = $logger;
            $this->routerList = $routerList;
        }
        public function execute(Observer $observer)
        {
            $routes = [];
            foreach ($this->routerList as $router) {
                $routes[] = get_class($router);
            }
            $logFile = BP . '/var/log/router_list.log';
            file_put_contents($logFile, implode("\n", $routes));
        }
    }
?>