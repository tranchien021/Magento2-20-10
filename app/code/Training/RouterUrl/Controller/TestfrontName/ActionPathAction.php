<?php

namespace Training\RouterUrl\Controller\TestfrontName;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class ActionPathAction extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        echo "This is the ActionPathAction controller.";
        exit;
    }
}
