<?php
namespace Training\ComputerGame\Model;

use Magento\Framework\Option\ArrayInterface;

class TypeOption implements ArrayInterface
{
    public function toOptionArray()
    {
        // Danh sách tùy chọn cứng
        $options = [
            ['value' => 'RPG', 'label' => __('RPG')],
            ['value' => 'RTS', 'label' => __('RTS')],
            ['value' => 'MMO', 'label' => __('MMO')],
            ['value' => 'Simulator', 'label' => __('Simulator')],
            ['value' => 'Shooter', 'label' => __('Shooter')],
        ];
        return $options;
    }
}
