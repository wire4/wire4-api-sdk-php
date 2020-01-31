# mx\wire4\FacturasApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**billingsReportByIdUsingGET**](FacturasApi.md#billingsreportbyidusingget) | **GET** /billings/{id} | Consulta de facturas por identificador
[**billingsReportUsingGET**](FacturasApi.md#billingsreportusingget) | **GET** /billings | Consulta de facturas

# **billingsReportByIdUsingGET**
> \mx\wire4\client\model\Billing billingsReportByIdUsingGET($authorization, $id)

Consulta de facturas por identificador

Consulta las facturas emitidas por conceptos de uso de la plataforma y operaciones realizadas tanto de entrada como de salida. Se debe especificar el identificador de la factura

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\FacturasApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$id = "id_example"; // string | Identificador de la factura

try {
    $result = $apiInstance->billingsReportByIdUsingGET($authorization, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FacturasApi->billingsReportByIdUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **id** | **string**| Identificador de la factura |

### Return type

[**\mx\wire4\client\model\Billing**](../Model/Billing.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **billingsReportUsingGET**
> \mx\wire4\client\model\Billing[] billingsReportUsingGET($authorization, $period)

Consulta de facturas

Consulta las facturas emitidas por conceptos de uso de la plataforma y operaciones realizadas tanto de entrada como de salida. Es posible filtrar por periodo de fecha yyyy-MM, por ejemplo 2019-11

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\FacturasApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$period = "period_example"; // string | Filtro de fecha yyyy-MM

try {
    $result = $apiInstance->billingsReportUsingGET($authorization, $period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FacturasApi->billingsReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **period** | **string**| Filtro de fecha yyyy-MM | [optional]

### Return type

[**\mx\wire4\client\model\Billing[]**](../Model/Billing.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

