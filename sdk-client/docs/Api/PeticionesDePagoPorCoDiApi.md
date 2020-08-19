# mx\wire4\PeticionesDePagoPorCoDiApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**consultCodiRequestByOrderId**](PeticionesDePagoPorCoDiApi.md#consultcodirequestbyorderid) | **GET** /codi/sales-point/{sales_point_id}/charges/{order_id} | Obtiene la información de una petición de pago CODI® por orderId para un punto de venta
[**generateCodiCodeQR**](PeticionesDePagoPorCoDiApi.md#generatecodicodeqr) | **POST** /codi/sales-point/{salesPointId}/charges | Genera un código QR para un pago mediante CODI®

# **consultCodiRequestByOrderId**
> \mx\wire4\client\model\PaymentRequestCodiResponseDTO consultCodiRequestByOrderId($authorization, $order_id, $sales_point_id)

Obtiene la información de una petición de pago CODI® por orderId para un punto de venta

Obtiene la información de una petición de pago CODI® por orderId para un punto de venta

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\PeticionesDePagoPorCoDiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$order_id = "order_id_example"; // string | OrderId
$sales_point_id = "sales_point_id_example"; // string | Identificador del punto de venta

try {
    $result = $apiInstance->consultCodiRequestByOrderId($authorization, $order_id, $sales_point_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PeticionesDePagoPorCoDiApi->consultCodiRequestByOrderId: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **order_id** | **string**| OrderId |
 **sales_point_id** | **string**| Identificador del punto de venta |

### Return type

[**\mx\wire4\client\model\PaymentRequestCodiResponseDTO**](../Model/PaymentRequestCodiResponseDTO.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **generateCodiCodeQR**
> \mx\wire4\client\model\CodiCodeQrResponseDTO generateCodiCodeQR($body, $authorization, $sales_point_id)

Genera un código QR para un pago mediante CODI®

Genera un código QR solicitado por un punto de venta para un pago mediante CODI®

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\PeticionesDePagoPorCoDiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\CodiCodeRequestDTO(); // \mx\wire4\client\model\CodiCodeRequestDTO | Información del pago CODI®
$authorization = "authorization_example"; // string | Header para token
$sales_point_id = "sales_point_id_example"; // string | Identificador del punto de venta

try {
    $result = $apiInstance->generateCodiCodeQR($body, $authorization, $sales_point_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PeticionesDePagoPorCoDiApi->generateCodiCodeQR: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\CodiCodeRequestDTO**](../Model/CodiCodeRequestDTO.md)| Información del pago CODI® |
 **authorization** | **string**| Header para token |
 **sales_point_id** | **string**| Identificador del punto de venta |

### Return type

[**\mx\wire4\client\model\CodiCodeQrResponseDTO**](../Model/CodiCodeQrResponseDTO.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

