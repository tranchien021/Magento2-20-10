<?php
$request = new SoapClient("https://chientran.cmmage.app/soap/?wsdl&services=integrationAdminTokenServiceV1", array("soap_version" => SOAP_1_2));
// changed your store url.
$token = $request->integrationAdminTokenServiceV1CreateAdminAccessToken(array("username"=>"john.smith", "password"=>"password123"));
 
$request = new SoapClient(
    'https://chientran.cmmage.app/soap/default?wsdl&services=customerCustomerRepositoryV1',
    array(
        'soap_version' => SOAP_1_2,
        'stream_context' => stream_context_create(array(
            'http'=> array('header' => 'Authorization: Bearer '.$token->result)
        ))
    )
);
$cusTomerId = [
    'customerId' => 2,
];
$response = $request->customerCustomerRepositoryV1GetById($cusTomerId);
echo "<pre>";
print_r($response);
echo "</pre>";
?>