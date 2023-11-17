<?php
namespace Training\CustomizeRefer\Controller\Product;
class View extends \Magento\Catalog\Controller\Product\View
{
    public function beforeExecute(\Magento\Catalog\Controller\Product\View $subject)
    {
        $message = "This is a custom message.";
        echo $message;
    }
}
?>