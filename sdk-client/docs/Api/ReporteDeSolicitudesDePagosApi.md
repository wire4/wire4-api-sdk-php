# mx\wire4\ReporteDeSolicitudesDePagosApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**paymentRequestIdReportByOrderIdUsingGET**](ReporteDeSolicitudesDePagosApi.md#paymentrequestidreportbyorderidusingget) | **GET** /payment-request | Consulta de solicitudes de pago por numero de orden.
[**paymentRequestIdReportUsingGET**](ReporteDeSolicitudesDePagosApi.md#paymentrequestidreportusingget) | **GET** /payment-request/{requestId} | Consulta de solicitudes de pago por identificador de petición

# **paymentRequestIdReportByOrderIdUsingGET**
> \mx\wire4\client\model\PaymentRequestReportDTO paymentRequestIdReportByOrderIdUsingGET($authorization, $order_id)

Consulta de solicitudes de pago por numero de orden.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ReporteDeSolicitudesDePagosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$order_id = "order_id_example"; // string | Es el identificador de la orden a buscar.

try {
    $result = $apiInstance->paymentRequestIdReportByOrderIdUsingGET($authorization, $order_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReporteDeSolicitudesDePagosApi->paymentRequestIdReportByOrderIdUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **order_id** | **string**| Es el identificador de la orden a buscar. | [optional]

### Return type

[**\mx\wire4\client\model\PaymentRequestReportDTO**](../Model/PaymentRequestReportDTO.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **paymentRequestIdReportUsingGET**
> \mx\wire4\client\model\PaymentRequestReportDTO paymentRequestIdReportUsingGET($authorization, $request_id)

Consulta de solicitudes de pago por identificador de petición

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ReporteDeSolicitudesDePagosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$request_id = "request_id_example"; // string | Identificador de la petición a buscar.

try {
    $result = $apiInstance->paymentRequestIdReportUsingGET($authorization, $request_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReporteDeSolicitudesDePagosApi->paymentRequestIdReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **request_id** | **string**| Identificador de la petición a buscar. |

### Return type

[**\mx\wire4\client\model\PaymentRequestReportDTO**](../Model/PaymentRequestReportDTO.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

