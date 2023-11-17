<?php
namespace Training\CmsBlock\Block;

use Magento\Framework\View\Element\Template;
class CustomBlock extends Template
{
    public function getCustomData()
    {
        return "Dữ liệu tùy chỉnh từ block";
    }
}
?>