<?php

namespace Training\RouterUrl\Controller\TestfrontName;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use \Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    protected $actionFactory;

    /**
     * @param ActionFactory $actionFactory
     */
    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
        $info = $request->getPathInfo();
        if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $info, $m)) {
            $request->setPathInfo(sprintf("/%s/%s/%s", $m[1], $m[2], $m[3]));

            return $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class);
        }
        return null;
    }
}