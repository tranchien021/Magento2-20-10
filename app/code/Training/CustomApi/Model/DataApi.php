<?php
namespace Training\CustomApi\Model;

use Training\CustomApi\Api\DataApiInterface;
use Psr\Log\LoggerInterface;

class DataApi implements DataApiInterface
{
    protected $data = ['Magento'];
    protected $logger;
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function addData($data)
    {
        $this->data[] = $data;
        $this->logger->info('Data added: ' . $data);
        return 'Data added successfully';
    }

    public function getData()
    {
        $this->logger->info('Get data: ' . json_encode($this->data));
        return $this->data;
    }
}
