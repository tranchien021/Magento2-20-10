<?php

try {
    // Magento 2 SOAP API endpoint
    $apiEndpoint = 'https://chientran.cmmage.app/soap/default?wsdl&services=customerCustomerRepositoryV1';

    // Magento 2 API credentials
    $username = 'john.smith';
    $password = 'password123';

    // Create SOAP client for authentication
    $authClient = new SoapClient(
        'https://chientran.cmmage.app/soap/default?wsdl&services=integrationAdminTokenServiceV1',
        ['soap_version' => SOAP_1_2]
    );

    // Authenticate and get admin token
    $token = $authClient->integrationAdminTokenServiceV1CreateAdminAccessToken([
        'username' => $username,
        'password' => $password,
    ]);

    // Create a new SOAP client with the admin token for customer repository
    $customerEndpoint = 'https://chientran.cmmage.app/soap/default?wsdl&services=customerCustomerRepositoryV1';
    $customerClient = new SoapClient(
        $customerEndpoint,
        [
            'soap_version' => SOAP_1_2,
            'stream_context' => stream_context_create([
                'http' => ['header' => 'Authorization: Bearer ' . $token->result]
            ])
        ]
    );

    // Search criteria for customerCustomerRepositoryV1GetList
    $searchCriteria = [
        'searchCriteria' => [
            'filterGroups' => [
                [
                    'filters' => [
                        [
                            'field' => 'email',
                            'value' => 'tranchien021@gmail.com',
                            'condition_type' => 'eq',
                        ],
                    ],
                ],
            ],
        ],
    ];

    // Call the customerCustomerRepositoryV1GetList method with search criteria
    $result = $customerClient->customerCustomerRepositoryV1GetList($searchCriteria);

    // Display the result
    echo "<pre>";
    print_r($result);
    echo "</pre>";

} catch (SoapFault $fault) {
    echo "SOAP Fault: " . $fault->getMessage();
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage();
}
?>
