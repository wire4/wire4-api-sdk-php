# mx\wire4\LmitesDeMontosApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**obtainConfigurationsLimits**](LmitesDeMontosApi.md#obtainconfigurationslimits) | **GET** /subscriptions/{suscription}/configurations | Consulta las configuraciones para el contrato asocaido al enrolamiento en la aplicación
[**updateConfigurations**](LmitesDeMontosApi.md#updateconfigurations) | **PUT** /subscriptions/{suscription}/configurations | Actualiza las configuraciones por subscripción

# **obtainConfigurationsLimits**
> \mx\wire4\client\model\MessageConfigurationsLimits obtainConfigurationsLimits($authorization, $suscription)

Consulta las configuraciones para el contrato asocaido al enrolamiento en la aplicación

Consulta las configuraciones para el contrato asocaido al enrolamiento en la aplicación.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\LmitesDeMontosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$suscription = "suscription_example"; // string | Identificador de la suscripción a esta API

try {
    $result = $apiInstance->obtainConfigurationsLimits($authorization, $suscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LmitesDeMontosApi->obtainConfigurationsLimits: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **suscription** | **string**| Identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\MessageConfigurationsLimits**](../Model/MessageConfigurationsLimits.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateConfigurations**
> updateConfigurations($body, $authorization, $suscription)

Actualiza las configuraciones por subscripción

Actualiza las configuraciones de un contrato asociado a una subscripción

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\LmitesDeMontosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\UpdateConfigurationsRequestDTO(); // \mx\wire4\client\model\UpdateConfigurationsRequestDTO | updateConfigurationsResquestDTO
$authorization = "authorization_example"; // string | Header para token
$suscription = "suscription_example"; // string | suscription

try {
    $apiInstance->updateConfigurations($body, $authorization, $suscription);
} catch (Exception $e) {
    echo 'Exception when calling LmitesDeMontosApi->updateConfigurations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\UpdateConfigurationsRequestDTO**](../Model/UpdateConfigurationsRequestDTO.md)| updateConfigurationsResquestDTO |
 **authorization** | **string**| Header para token |
 **suscription** | **string**| suscription |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

