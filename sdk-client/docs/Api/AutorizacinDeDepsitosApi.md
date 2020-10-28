# mx\wire4\AutorizacinDeDepsitosApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDepositAuthConfigurations**](AutorizacinDeDepsitosApi.md#getdepositauthconfigurations) | **GET** /subscriptions/{subscription}/configurations/deposit-authorization | Consulta autorización de depósitos
[**putDepositAuthConfigurations**](AutorizacinDeDepsitosApi.md#putdepositauthconfigurations) | **PUT** /subscriptions/{subscription}/configurations/deposit-authorization | Des/Habilitar autorización de depósitos

# **getDepositAuthConfigurations**
> \mx\wire4\client\model\DepositsAuthorizationResponse getDepositAuthConfigurations($authorization, $subscription)

Consulta autorización de depósitos

Obtiene la información de la autorización de depósitos del contrato relacionado a la subscripción.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\AutorizacinDeDepsitosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->getDepositAuthConfigurations($authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutorizacinDeDepsitosApi->getDepositAuthConfigurations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\DepositsAuthorizationResponse**](../Model/DepositsAuthorizationResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **putDepositAuthConfigurations**
> \mx\wire4\client\model\DepositsAuthorizationResponse putDepositAuthConfigurations($body, $authorization, $subscription)

Des/Habilitar autorización de depósitos

Des/Habilitar autorización de depósitos, devuelve la información final de la autorización de depósitos del contrato relacionado a la subscripción al terminar.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\AutorizacinDeDepsitosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\DepositAuthorizationRequest(); // \mx\wire4\client\model\DepositAuthorizationRequest | Deposit Authorization info
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->putDepositAuthConfigurations($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutorizacinDeDepsitosApi->putDepositAuthConfigurations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\DepositAuthorizationRequest**](../Model/DepositAuthorizationRequest.md)| Deposit Authorization info |
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\DepositsAuthorizationResponse**](../Model/DepositsAuthorizationResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

