# mx\wire4\ComprobanteElectrnicoDePagoCEPApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**obtainTransactionCepUsingPOST**](ComprobanteElectrnicoDePagoCEPApi.md#obtaintransactioncepusingpost) | **POST** /ceps | Consulta de CEP

# **obtainTransactionCepUsingPOST**
> \mx\wire4\client\model\CepResponse obtainTransactionCepUsingPOST($body)

Consulta de CEP

Consulta el CEP de un pago realizado a través del SPEI, si es que este se encuentra disponible en BANXICO.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WIT YOUR CONSUMER_KEY
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WIT YOUR CONSUMER_SECRET
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "general"
        $accessToken= $oauth->obtainAccessTokenApp("general");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);


    $apiInstance = new \mx\wire4\client\api\ComprobanteElectrnicoDePagoCEPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );

    $cepData = new \mx\wire4\client\model\CepSearchBanxico(); // \mx\wire4\client\model\CepSearchBanxico | Información para buscar un CEP
    $cepData->setAmount(8963.25);
    $cepData->setBeneficiaryAccount("072680004657656853");
    $cepData->setBeneficiaryBankKey("40072");
    $cepData->setClaveRastreo("58735618");
    $cepData->setOperationDate("05-12-2018");
    $cepData->setReference("1122334");
    $cepData->setSenderAccount("112680000156896531");
    $cepData->setSenderBankKey("40112");

    try {
        $result = $apiInstance->obtainTransactionCepUsingPOST($cepData);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling ComprobanteElectrnicoDePagoCEPApi->obtainTransactionCepUsingPOST: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\CepSearchBanxico**](../Model/CepSearchBanxico.md)| Información para buscar un CEP |

### Return type

[**\mx\wire4\client\model\CepResponse**](../Model/CepResponse.md)

### Authorization

[wire4_aut_app](../../README.md#wire4_aut_app)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

