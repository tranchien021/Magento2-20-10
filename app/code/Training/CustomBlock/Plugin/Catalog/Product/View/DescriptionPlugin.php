<?php 
namespace Training\CustomBlock\Plugin\Catalog\Product\View;
use Magento\Catalog\Block\Product\View\Description as DescriptionBlock;
class DescriptionPlugin
{
    public function beforeToHtml(DescriptionBlock $descriptionBlock)
    {
        $product = $descriptionBlock->getProduct();
        $customDescription = "This is a custom description for the product.";
        $product->setDescription($customDescription);
    }
}
?>