<?php
namespace Magento\Catalog\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Catalog\Api\Data\CategoryInterface
 */
interface CategoryExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return string|null
     */
    public function getCountries();

    /**
     * @param string $countries
     * @return $this
     */
    public function setCountries($countries);
}
