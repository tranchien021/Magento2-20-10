<?php
namespace Training\AdminProduct\Ui\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;

class ComputerGamesDataProvider extends AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        return [];
    }
}

?>