# mx\wire4\CargosRecurrentesApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**registerRecurringChargeUsingPOST**](CargosRecurrentesApi.md#registerrecurringchargeusingpost) | **POST** /recurring-charge | Registro de cargos recurrentes

# **registerRecurringChargeUsingPOST**
> \mx\wire4\client\model\ConfirmRecurringCharge registerRecurringChargeUsingPOST($body, $authorization)

Registro de cargos recurrentes

Se registra una solicitud para generar un plan de cargos recurrentes. En la respuesta se proporcionará una dirección URL que lo llevará al sitio donde se le solicitará ingresar los datos de tarjeta a la que se aplicarán los cargos de acuerdo al plan seleccionado.<br> Nota: Debe considerar que para hacer uso de esta funcionalidad debe contar con un scope  especial

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CargosRecurrentesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\RecurringChargeRequest(); // \mx\wire4\client\model\RecurringChargeRequest | Información de la solicitud para aplicar cargos recurrentes
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->registerRecurringChargeUsingPOST($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CargosRecurrentesApi->registerRecurringChargeUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\RecurringChargeRequest**](../Model/RecurringChargeRequest.md)| Información de la solicitud para aplicar cargos recurrentes |
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\ConfirmRecurringCharge**](../Model/ConfirmRecurringCharge.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

