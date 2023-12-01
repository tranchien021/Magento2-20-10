<?php
namespace Training\ComputerGame\Block\Game;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class BackButton
 */
class BackButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * BackButton constructor.
     *
     * @param Context $context
     * @param array $data
     */
    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Quay lại'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10,
        ];
    }

    /**
     * Get URL for back button
     *
     * @return string
     */
    public function getBackUrl()
    {
        try {
            return $this->getUrl('*/*/');
        } catch (NoSuchEntityException $e) {
            // Handle the exception if needed
            return '/';
        }
    }
}
