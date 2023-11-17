<?php

namespace Training\CustomerAttribute\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $customerSetupFactory;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '2.0.0', '<')) {
            $this->addPriorityAttribute($setup);
        }

        $setup->endSetup();
    }

    private function addPriorityAttribute(ModuleDataSetupInterface $setup)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->addAttribute(
            'customer',
            'priority',
            [
                'type' => 'int',
                'label' => 'Priority',
                'input' => 'select',
                'source' => 'Training\CustomerAttribute\Model\Customer\Attribute\Source\PriorityOptions',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'position' => 100,
                'system' => 0,
                'backend' => ''
            ]
        );

        $attributeSetId = $customerSetup->getDefaultAttributeSetId('customer');
        $attributeGroupId = $customerSetup->getDefaultAttributeGroupId('customer', $attributeSetId);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'priority');
        $attribute->addData([
            'attribute_set_id' => $attributeSetId,
            'attribute_group_id' => $attributeGroupId,
        ]);

        $attribute->save();
    }
}
