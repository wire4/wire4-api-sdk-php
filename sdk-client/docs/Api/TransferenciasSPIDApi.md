# mx\wire4\TransferenciasSPIDApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSpidClassificationsUsingGET**](TransferenciasSPIDApi.md#getspidclassificationsusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spid/classifications | Consulta las clasificaciones para operaciones con SPID
[**registerOutgoingSpidTransactionUsingPOST**](TransferenciasSPIDApi.md#registeroutgoingspidtransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spid | Registro de transferencias SPID

# **getSpidClassificationsUsingGET**
> \mx\wire4\client\model\SpidClassificationsResponseDTO getSpidClassificationsUsingGET($authorization, $subscription)

Consulta las clasificaciones para operaciones con SPID

Obtiene las clasificaciones para operaciones con dólares (SPID) de Monex.<br/>Este recurso se debe invocar previo al realizar una operación SPID.<br/>Se requiere que el token de autenticación se genere con scope spid_admin.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPIDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->getSpidClassificationsUsingGET($authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPIDApi->getSpidClassificationsUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\SpidClassificationsResponseDTO**](../Model/SpidClassificationsResponseDTO.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerOutgoingSpidTransactionUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse registerOutgoingSpidTransactionUsingPOST($body, $authorization, $subscription)

Registro de transferencias SPID

Registra un conjunto de transferencias a realizar en la cuenta del cliente Monex relacionada a la suscripción, las transferencias deben ser confirmadas por el cliente para que se efectuen.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPIDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\TransactionOutgoingSpid(); // \mx\wire4\client\model\TransactionOutgoingSpid | Información de las transferencias SPID de salida
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->registerOutgoingSpidTransactionUsingPOST($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPIDApi->registerOutgoingSpidTransactionUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\TransactionOutgoingSpid**](../Model/TransactionOutgoingSpid.md)| Información de las transferencias SPID de salida |
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

