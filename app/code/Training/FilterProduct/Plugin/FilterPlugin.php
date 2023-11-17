<?php
namespace Training\FilterProduct\Plugin;
use Magento\Catalog\Model\ResourceModel\Product\Collection as ProductCollection;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\Http;
class FilterPlugin
{
    protected $request;
    protected $httpRequest;
    public function __construct(
        RequestInterface $request,
        Http $httpRequest
    ) {
        $this->request = $request;
        $this->httpRequest = $httpRequest;
    }
     public function beforeLoad(ProductCollection $subject, $printQuery = false, $logQuery = false)
    {
        $filter = $this->request->getParam('filter');
        if ($filter == 'Xiaomi') {
            $subject->addAttributeToFilter('name', ['like' => '%Xiaomi%']);
        } elseif ($filter == 'iPhone') {
            $subject->addAttributeToFilter('name', ['like' => '%iPhone%']);
        }
        $subject->addAttributeToSort('price', 'DESC');
    }
}