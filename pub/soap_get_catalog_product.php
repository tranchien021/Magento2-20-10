<?php
$request = new SoapClient(
    "https://chientran.cmmage.app/index.php/soap/?wsdl&services=integrationAdminTokenServiceV1",
    array("soap_version" => SOAP_1_2)
);
$token = $request->integrationAdminTokenServiceV1CreateAdminAccessToken(
    array("username" => "john.smith", "password" => "password123")
);
$client = new SoapClient(
    "https://chientran.cmmage.app/index.php/soap/?wsdl&services=catalogProductRepositoryV1",
    array(
        "soap_version" => SOAP_1_2,
        'stream_context' => stream_context_create(
            array('http' => array('header' => "Authorization: Bearer " . $token->result))
        )
    )
);

$requestData = [
    'searchCriteria' => [
        'filterGroups' => [
            [
                'filters' => [
                    [
                        'field' => 'sku',
                        'value' => 'MJ08',
                    ],
                ],
            ],
        ],
    ],
];

$response = $client->catalogProductRepositoryV1GetList($requestData);

if ($response->result->items) {
    $productData = $response->result->items;
    echo 'Product data: ';
    print_r($productData);
} else {
    echo 'No product found with the given SKU';
}
?>
