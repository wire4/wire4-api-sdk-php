# mx\wire4\OperacionesCoDiApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**consultCodiOperations**](OperacionesCoDiApi.md#consultcodioperations) | **POST** /codi/charges | Consulta de operaciones

# **consultCodiOperations**
> \mx\wire4\client\model\PagerResponseDto consultCodiOperations($authorization, $body, $company_id, $page, $sales_point_id, $size)

Consulta de operaciones

Obtiene las operaciones generadas a partir de peticiones de pago CODI® de forma paginada, pudiendo aplicar filtros.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\OperacionesCoDiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$body = new \mx\wire4\client\model\CodiOperationsFiltersRequestDTO(); // \mx\wire4\client\model\CodiOperationsFiltersRequestDTO | Filtros de busqueda
$company_id = "company_id_example"; // string | Es el identificador de empresa CODI®.
$page = "0"; // string | Es el número de pago.
$sales_point_id = "sales_point_id_example"; // string | Es el identificador del punto de venta.
$size = "20"; // string | Es el tamaño de página.

try {
    $result = $apiInstance->consultCodiOperations($authorization, $body, $company_id, $page, $sales_point_id, $size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OperacionesCoDiApi->consultCodiOperations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **body** | [**\mx\wire4\client\model\CodiOperationsFiltersRequestDTO**](../Model/CodiOperationsFiltersRequestDTO.md)| Filtros de busqueda | [optional]
 **company_id** | **string**| Es el identificador de empresa CODI®. | [optional]
 **page** | **string**| Es el número de pago. | [optional] [default to 0]
 **sales_point_id** | **string**| Es el identificador del punto de venta. | [optional]
 **size** | **string**| Es el tamaño de página. | [optional] [default to 20]

### Return type

[**\mx\wire4\client\model\PagerResponseDto**](../Model/PagerResponseDto.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

