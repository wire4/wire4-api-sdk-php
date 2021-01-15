# mx\wire4\SuscripcionesApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**changeSubscriptionStatusUsingPUT**](SuscripcionesApi.md#changesubscriptionstatususingput) | **PUT** /subscriptions/{subscription}/status | Cambia el estatus de la suscripción
[**changeSubscriptionUseUsingPATCH**](SuscripcionesApi.md#changesubscriptionuseusingpatch) | **PATCH** /subscriptions/{subscription} | Cambia el uso de la suscripción
[**preEnrollmentMonexUserUsingPOST**](SuscripcionesApi.md#preenrollmentmonexuserusingpost) | **POST** /subscriptions/pre-subscription | Pre-registro de una suscripción
[**removeEnrollmentUserUsingDELETE**](SuscripcionesApi.md#removeenrollmentuserusingdelete) | **DELETE** /subscriptions/{subscription} | Elimina suscripción por su identificador.
[**removeSubscriptionPendingStatusUsingDELETE**](SuscripcionesApi.md#removesubscriptionpendingstatususingdelete) | **DELETE** /subscriptions/pre-subscription/{subscription} | Elimina pre-registro de suscripción

# **changeSubscriptionStatusUsingPUT**
> changeSubscriptionStatusUsingPUT($body, $authorization, $subscription)

Cambia el estatus de la suscripción

Se cambia el estado o estatus de la suscripción a los posibles valores que son: ACTIVE o INACTIVE

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SuscripcionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\SubscriptionChangeStatusRequest(); // \mx\wire4\client\model\SubscriptionChangeStatusRequest | request
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | subscription

try {
    $apiInstance->changeSubscriptionStatusUsingPUT($body, $authorization, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling SuscripcionesApi->changeSubscriptionStatusUsingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\SubscriptionChangeStatusRequest**](../Model/SubscriptionChangeStatusRequest.md)| request |
 **authorization** | **string**| Header para token |
 **subscription** | **string**| subscription |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **changeSubscriptionUseUsingPATCH**
> \mx\wire4\client\model\ServiceBanking changeSubscriptionUseUsingPATCH($body, $authorization, $subscription)

Cambia el uso de la suscripción

Se asigna o cambia el uso y el estatus que se le dará a la subscripción para los servicios SPEI y SPID en el manejo de Cobros y Pagos El status puede tener los posibles valores: ACTIVE o INACTIVE. El uso puede tener los posibles valores: WITHDRAWAL_DEPOSIT o WITHDRAWAL o DEPOSIT

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SuscripcionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\ServiceBanking(); // \mx\wire4\client\model\ServiceBanking | request
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | subscription

try {
    $result = $apiInstance->changeSubscriptionUseUsingPATCH($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuscripcionesApi->changeSubscriptionUseUsingPATCH: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\ServiceBanking**](../Model/ServiceBanking.md)| request |
 **authorization** | **string**| Header para token |
 **subscription** | **string**| subscription |

### Return type

[**\mx\wire4\client\model\ServiceBanking**](../Model/ServiceBanking.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **preEnrollmentMonexUserUsingPOST**
> \mx\wire4\client\model\PreEnrollmentResponse preEnrollmentMonexUserUsingPOST($body, $authorization)

Pre-registro de una suscripción

Pre-registra una suscripción para operar un contrato a través de un aplicación socio de la plataforma. Se retorna una dirección URL hacia el centro de autorización donde el cliente  Monex debe autorizar el acceso a los datos de su cuenta a el socio.<br/><br/>Una vez que el cuentahabiente autorice el acceso, se envía una notificación (webhook configurado) con el evento 'ENROLLMENT.CREATED', el cuál contiene los datos de acceso a esta API.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SuscripcionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\PreEnrollmentData(); // \mx\wire4\client\model\PreEnrollmentData | Información para la pre-suscripción
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->preEnrollmentMonexUserUsingPOST($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuscripcionesApi->preEnrollmentMonexUserUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\PreEnrollmentData**](../Model/PreEnrollmentData.md)| Información para la pre-suscripción |
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\PreEnrollmentResponse**](../Model/PreEnrollmentResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeEnrollmentUserUsingDELETE**
> removeEnrollmentUserUsingDELETE($authorization, $subscription)

Elimina suscripción por su identificador.

Elimina una suscripción mediante su identificador. Una vez eliminada dicha suscripción, ya no se podrán realizar operaciones en el API utilizando sus credenciales

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SuscripcionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a ésta API

try {
    $apiInstance->removeEnrollmentUserUsingDELETE($authorization, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling SuscripcionesApi->removeEnrollmentUserUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a ésta API |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **removeSubscriptionPendingStatusUsingDELETE**
> removeSubscriptionPendingStatusUsingDELETE($authorization, $subscription)

Elimina pre-registro de suscripción

Se elimina el pre-registro de suscripción. Sólo se elimina en caso de que el cliente Monex no haya concedido su autorización de acceso (token), es decir que la suscripcion esté pendiente.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SuscripcionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $apiInstance->removeSubscriptionPendingStatusUsingDELETE($authorization, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling SuscripcionesApi->removeSubscriptionPendingStatusUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

