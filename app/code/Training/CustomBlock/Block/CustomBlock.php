<?php 
namespace Training\CustomBlock\Block;

use Magento\Framework\View\Element\AbstractBlock;

class CustomBlock extends AbstractBlock
{
    protected function _toHtml()
    {
        return '<div>Hello from Custom Block!</div>';
    }
}
?>