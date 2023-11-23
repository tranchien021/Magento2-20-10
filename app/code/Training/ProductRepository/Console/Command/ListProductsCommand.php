<?php

namespace Training\ProductRepository\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SortOrderBuilder;

class ListProductsCommand extends Command
{
    protected $productRepository;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;
    protected $sortOrderBuilder;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        SortOrderBuilder $sortOrderBuilder,
        string $name = null
    ) {
        parent::__construct($name);
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    protected function configure()
    {
        $this->setName('productlist:list')
            ->setDescription('List products using Product Repository');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();

        // Add a filter to the search criteria
        $this->searchCriteriaBuilder->addFilter('status', 1, 'eq');

        // Add another filter with a logical AND condition.
        $this->searchCriteriaBuilder->addFilter('price', 50, 'lt');

        // Add a sort order instruction.
        $this->sortOrderBuilder->setField('name')->setDirection('ASC');

       // Giới hạn số lượng sản phẩm
        $searchCriteria->setPageSize(6);

        // Lấy danh sách sản phẩm với các điều kiện mới
        $productList = $this->productRepository->getList($searchCriteria);

        foreach ($productList->getItems() as $product) {
            $output->writeln("ID: " . $product->getId() . ", Name: " . $product->getName());
        }
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
