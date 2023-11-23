<?php
namespace Training\CustomApi\Api;

interface DataApiInterface
{
    /**
     * @param string $data
     * @return string
     */
    public function addData($data);

    /**
     * @return array
     */
    public function getData();
}
