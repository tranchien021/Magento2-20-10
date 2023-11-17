<?php

namespace Training\DatabaseCustom\Controller\Store;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Store\Model\ResourceModel\Store\CollectionFactory as StoreCollectionFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Magento\Store\Model\ResourceModel\Store\Collection as StoreCollection;


class Index extends Action
{
    private $storeCollection;
    private $categoryCollectionFactory;
    private $jsonFactory;

    public function __construct(
        Context $context,
        StoreCollectionFactory $storeCollectionFactory,
        CategoryCollectionFactory $categoryCollectionFactory,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->storeCollection = $storeCollectionFactory->create();
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        $stores = [];
       // Get root category IDs (replace these with your actual root category IDs)
        $rootCategoryIds = [1, 2, 3];
        foreach ($this->storeCollection as $store) {
            $cats = [];

            $categoryCollection = $this->categoryCollectionFactory->create();
            $categoryCollection->addAttributeToSelect('name');
            $categoryCollection->addFilter('entity_id', $store->getRootCategoryId());

            foreach ($categoryCollection as $category) {
                $cats[] = [
                    'name' => $category->getName(),
                    'id'   => $category->getId(),
                ];
            }

            $stores[] = [
                'store_id'          => $store->getId(),
                'name'              => $store->getName(),
                'root_category_id'  => $store->getRootCategoryId(),
                'category'          => $cats,
            ];
        }

        $result = $this->jsonFactory->create();
        $result->setData(['stores' => $stores]);

        return $result;
    }
}
