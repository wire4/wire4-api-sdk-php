# mx\wire4\SaldoApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getBalanceUsingGET**](SaldoApi.md#getbalanceusingget) | **GET** /subscriptions/{subscription}/balance | Consulta los saldo de una cuenta

# **getBalanceUsingGET**
> \mx\wire4\client\model\BalanceListResponse getBalanceUsingGET($authorization, $subscription)

Consulta los saldo de una cuenta

Obtiene el de las divisas que se manejen en el contrato.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SaldoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->getBalanceUsingGET($authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaldoApi->getBalanceUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\BalanceListResponse**](../Model/BalanceListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

