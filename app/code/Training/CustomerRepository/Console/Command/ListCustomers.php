<?php

namespace Training\CustomerRepository\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;

class ListCustomers extends Command
{
    protected $customerRepository;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        string $name = null
    ) {
        parent::__construct($name);
        $this->customerRepository = $customerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
    }

    protected function configure()
    {
        $this->setName('customerlist:list')
            ->setDescription('List customers using Customer Repository');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {


        // Output the object type
        $output->writeln("Object Type: " . get_class($this->customerRepository));

      
        // $emailFilter = $this->filterBuilder->setField('email')
        //     ->setValue('tranchien021@gmail.com') 
        //     ->setConditionType('eq')
        //     ->create();
        // $this->searchCriteriaBuilder->addFilters([$emailFilter]);

        // Add another filter with a logical OR condition
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('gender', 2)
            ->addFilter('entity_id', ['gteq' => 1], 'or')
            ->create();

        // $searchCriteria = $this->searchCriteriaBuilder->create();

        // Print a list of customers
        $customerList = $this->customerRepository->getList($searchCriteria);

        foreach ($customerList->getItems() as $customer) {
            $output->writeln("Customer ID: " . $customer->getId() . ", Name: " . $customer->getFirstname() . " " . $customer->getLastname());
        }
        return \Magento\Framework\Console\Cli::RETURN_SUCCESS;
    }
}
