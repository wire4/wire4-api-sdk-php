# mx\wire4\DepositantesApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDepositantsUsingGET**](DepositantesApi.md#getdepositantsusingget) | **GET** /subscriptions/{subscription}/depositants | Consulta de cuentas de depositantes
[**registerDepositantsUsingPOST**](DepositantesApi.md#registerdepositantsusingpost) | **POST** /subscriptions/{subscription}/depositants | Registra un nuevo depositante

# **getDepositantsUsingGET**
> \mx\wire4\client\model\GetDepositants getDepositantsUsingGET($authorization, $subscription)

Consulta de cuentas de depositantes

Obtiene una lista de depositantes asociados al contrato relacionado a la subscripción.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\DepositantesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->getDepositantsUsingGET($authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepositantesApi->getDepositantsUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\GetDepositants**](../Model/GetDepositants.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerDepositantsUsingPOST**
> \mx\wire4\client\model\DepositantsResponse registerDepositantsUsingPOST($body, $authorization, $subscription)

Registra un nuevo depositante

Registra un nuevo depositante en el contrato asociado a la subscripción.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\DepositantesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\DepositantsRegister(); // \mx\wire4\client\model\DepositantsRegister | Depositant info
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->registerDepositantsUsingPOST($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepositantesApi->registerDepositantsUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\DepositantsRegister**](../Model/DepositantsRegister.md)| Depositant info |
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\DepositantsResponse**](../Model/DepositantsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

