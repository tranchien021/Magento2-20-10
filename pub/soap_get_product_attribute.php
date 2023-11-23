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

$newAttributeCode = 'don_gi_n';
$newAttributeValue = 'good';

$requestData = [
    'searchCriteria' => [
        'filterGroups' => [
            [
                'filters' => [
                    [
                        'field' => 'status',
                        'value' => '1',
                        'condition_type' => 'eq'
                    ],
                    [
                        'field' => $newAttributeCode,
                        'value' => $newAttributeValue,
                        'condition_type' => 'eq'
                    ]
                ]
            ]
        ],
        'pageSize' => 3,
        'currentPage' => 1
    ]
];

$response = $client->catalogProductRepositoryV1GetList($requestData);

if ($response->result->items) {
    $productData = $response->result->items;
    print_r($productData);
} else {
    echo 'No product found with the given SKU';
}
?>
