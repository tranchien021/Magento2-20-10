<?php

namespace Training\AttributeModule\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\Customer;


class UpgradeData implements UpgradeDataInterface
{
    private $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '2.0.1', '<')) {
            $this->createMultiSelectAttribute();
        }

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->addPriorityAttribute($setup);
        }
        $setup->endSetup();
    }
    private function addPriorityAttribute($installer)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $installer]);
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'priority',
            [
                'type'         => 'int',
                'label'        => 'Priority',
                'input'        => 'select',
                'source'       => 'Training\AttributeModule\Model\Customer\Attribute\Source\PriorityOptions',
                'required'     => false,
                'visible'      => true,
                'position'     => 100,
                'system'       => 0,
                'user_defined' => true,
                'position'     => 100,
                'sort_order'   => 100,
            ]
        );
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'priority');
        $attribute->setData('used_in_forms', ['adminhtml_customer']);
        $attribute->save();
    }

    private function createMultiSelectAttribute()
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'multi_select_attribute',
            [
                'type' => 'text',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'frontend' => '',
                'label' => 'Multi-Select Attribute',
                'input' => 'multiselect',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => '',
                'option' => [
                    'values' => [
                        'Option 1',
                        'Option 2',
                        'Option 3',
                    ],
                ],
            ]
        );
    }
}
