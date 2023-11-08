<?php
namespace Training\CustomizeCateLog\Plugin\Catalog\Controller\Product;
class View
{
    public function beforeExecute(\Magento\Catalog\Controller\Product\View $subject)
    {
        $message = "This is a custom message.";
        echo $message;
    }

    public function afterExecute(\Magento\Catalog\Controller\Product\View $subject, $result)
    {
        $result->getConfig()->getTitle()->set("Custom Product Page Title");
        return $result;
    }
}
