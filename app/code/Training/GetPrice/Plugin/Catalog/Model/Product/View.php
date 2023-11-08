<?php

namespace Training\GetPrice\Plugin\Catalog\Model\Product;

class View
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $getPrice = $result + 100000;
        return $getPrice;
    }
}
