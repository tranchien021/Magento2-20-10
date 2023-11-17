<?php


namespace Training\FilterProduct\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '2.0.1', '<')) {
            $this->addCustomAttribute($setup);
        }

        $setup->endSetup();
    }

    private function addCustomAttribute(ModuleDataSetupInterface $setup)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            'custom_attribute_code',
            [
                'type' => 'text',
                'label' => 'Custom Attribute',
                'input' => 'text',
                'required' => false,
                'sort_order' => 50,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'used_in_product_listing' => true,
                'visible_on_front' => true,
            ]
        );

        $attributeId = $eavSetup->getAttributeId(Product::ENTITY, 'custom_attribute_code');
        $attributeSetIds = $eavSetup->getAllAttributeSetIds(Product::ENTITY);

        foreach ($attributeSetIds as $attributeSetId) {
            $eavSetup->addAttributeToSet(
                Product::ENTITY,
                $attributeSetId,
                'General',
                $attributeId
            );
        }
    }
}

?>