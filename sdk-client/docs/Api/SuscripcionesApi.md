# mx\wire4\SuscripcionesApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**preEnrollmentMonexUserUsingPOST**](SuscripcionesApi.md#preenrollmentmonexuserusingpost) | **POST** /subscriptions/pre-subscription | registra una pre-suscripción
[**removeEnrollmentUserUsingDELETE**](SuscripcionesApi.md#removeenrollmentuserusingdelete) | **DELETE** /subscriptions/{subscription} | Elimna una suscripción por id
[**removeSubscriptionPendingStatusUsingDELETE**](SuscripcionesApi.md#removesubscriptionpendingstatususingdelete) | **DELETE** /subscriptions/pre-subscription/{subscription} | Elimna una pre-suscripción

# **preEnrollmentMonexUserUsingPOST**
> \mx\wire4\client\model\PreEnrollmentResponse preEnrollmentMonexUserUsingPOST($body, $authorization)

registra una pre-suscripción

Pre-registra una suscripción para operar un contrato a través de un aplicación socio de la plataforma, proporcionando una URL donde el cliente Monex debe autorizar el acceso a los datos de su cuenta a el socio.<br/>Una vez que el cuentahabiente autorice el acceso, se envia un webhook con el evento ENROLLMENT.CREATED, el cual contiene los datos de acceso.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SuscripcionesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\PreEnrollmentData(); // \mx\wire4\client\model\PreEnrollmentData | Información para el enrolamiento
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
 **body** | [**\mx\wire4\client\model\PreEnrollmentData**](../Model/PreEnrollmentData.md)| Información para el enrolamiento |
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

Elimna una suscripción por id

Elimina una suscripción, una ves eliminada la suscripcion ya no se podran realizar operacions en el API uilizando esta suscripción

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
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

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
 **subscription** | **string**| El identificador de la suscripción a esta API |

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

Elimna una pre-suscripción

Se elimina una pre-suscripción, sólo se elimina en caso de que cliente monex no haya concedio su autorización de acceso, es decir que la pre-suscripcion este pendiente.

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
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

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
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

