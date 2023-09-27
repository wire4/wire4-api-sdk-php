# mx\wire4\SolicitudDePagosApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**registerPaymentRequestUsingPOST**](SolicitudDePagosApi.md#registerpaymentrequestusingpost) | **POST** /payment-request | Registro de solicitud de pagos

# **registerPaymentRequestUsingPOST**
> \mx\wire4\client\model\PaymentRequestResponse registerPaymentRequestUsingPOST($body, $authorization)

Registro de solicitud de pagos

Se registra una solicitud de pagos. En la respuesta se proporcionará una dirección URL que lo llevará al sitio donde se le solicitará ingresar los datos de tarjeta a la que se aplicarán los cargos.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\SolicitudDePagosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\PaymentRequestReq(); // \mx\wire4\client\model\PaymentRequestReq | Información de la solicitud de pagos
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->registerPaymentRequestUsingPOST($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SolicitudDePagosApi->registerPaymentRequestUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\PaymentRequestReq**](../Model/PaymentRequestReq.md)| Información de la solicitud de pagos |
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\PaymentRequestResponse**](../Model/PaymentRequestResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

