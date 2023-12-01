<?php
namespace Training\ComputerGame\Block\Game;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ButtonSave extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Thêm sản phẩm'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
