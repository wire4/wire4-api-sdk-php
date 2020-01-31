# mx\wire4\ComprobanteElectrnicoDePagoCEPApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**obtainTransactionCepUsingPOST**](ComprobanteElectrnicoDePagoCEPApi.md#obtaintransactioncepusingpost) | **POST** /ceps | Consulta de CEP

# **obtainTransactionCepUsingPOST**
> \mx\wire4\client\model\CepResponse obtainTransactionCepUsingPOST($body, $authorization)

Consulta de CEP

Consulta el CEP de un pago realizado a través del SPEI, si es que este se encuentra disponible en BANXICO.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ComprobanteElectrnicoDePagoCEPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\CepSearchBanxico(); // \mx\wire4\client\model\CepSearchBanxico | Información para buscar un CEP
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->obtainTransactionCepUsingPOST($body, $authorization);
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
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\CepResponse**](../Model/CepResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

